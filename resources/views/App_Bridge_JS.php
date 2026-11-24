<!-- App Bridge must be loaded first before any other scripts -->
<meta name="shopify-api-key" content="<?= config("constants.app_client_id") ?>" />
<script src="https://cdn.shopify.com/shopifycloud/app-bridge.js"></script>

<script>
    function waitForAppBridge() {
        return new Promise((resolve, reject) => {
            let attempts = 0;
            const maxAttempts = 100;

            const checkAppBridge = () => {
                attempts++;
                if (typeof window.shopify !== 'undefined' && window.shopify) {
                    resolve(window.shopify);
                } else if (attempts >= maxAttempts) {
                    reject(new Error('App Bridge failed to load after 10 seconds'));
                } else {
                    setTimeout(checkAppBridge, 100);
                }
            };

            checkAppBridge();
        });
    }

    async function initializeAppBridge() {
        try {
            const shopify = await waitForAppBridge();

            // Store the shopify object globally as per documentation
            window.shopify = shopify;

            // API functions following the documentation pattern
            window.showSaveBar = function() {
                if (window.shopify && window.shopify.saveBar) {
                    window.shopify.saveBar.show('app-save-bar');
                }
            };

            window.hideSaveBar = function() {
                if (window.shopify && window.shopify.saveBar) {
                    window.shopify.saveBar.hide('app-save-bar');
                }
            };

            // Set up save bar button event listeners
            let saveBarListenersSetup = false;
            
            function setupSaveBarListeners() {
                // Prevent multiple setups
                if (saveBarListenersSetup) {
                    return;
                }
                
                saveBarListenersSetup = true;
                
                // Set up save button click handler
                document.addEventListener('click', function(event) {
                    if (event.target.id === 'save-bar-save-btn') {
                        
                        // Check if save button is already disabled (for free plan users)
                        if (event.target.disabled) {
                            return; // Prevent multiple submissions
                        }

                        <?php if(session('plan_id') != 1){ ?>

                            // Disable the button to prevent multiple clicks
                            event.target.disabled = true;

                            // Trigger the save button click with proper token handling
                            window.flashNotice("Saving... Please wait...");
                        <?php } ?>

                        var saveButton = document.querySelector('#save-label-btn');

                        // Additional check: if the actual save button is disabled, don't proceed
                        if (saveButton && saveButton.disabled) {
                            return; // Prevent form submission if save button is disabled
                        }

                        if (saveButton) {
                            // Simply trigger the save button click - the existing form submission should work
                            // The turbolinks:request-start event will add the proper headers
                            saveButton.click();
                        } else {
                            // Fallback: submit the form directly
                            var form = document.querySelector('form[method="POST"]');
                            if (form) {
                                form.submit();
                            }
                        }
                        window.hideSaveBar();
                    }
                    
                    if (event.target.id === 'save-bar-discard-btn') {
                        
                        // Prevent multiple clicks
                        if (event.target.disabled) {
                            return;
                        }
                        
                        // Disable the button to prevent multiple clicks
                        event.target.disabled = true;
                        
                        Turbolinks.visit("<?= url('/labels') ?>");

                        window.hideSaveBar();
                    }
                });
            }

            // Set up listeners when DOM is ready
            document.addEventListener('DOMContentLoaded', setupSaveBarListeners);

            // Also set up listeners when Turbolinks loads (for SPA navigation)
            document.addEventListener('turbolinks:load', function() {
                // Reset the flag when Turbolinks loads a new page
                saveBarListenersSetup = false;
                setupSaveBarListeners();
            });

            // Global XMLHttpRequest interceptor to ensure ALL requests get headers
            (function() {
                const originalXHROpen = XMLHttpRequest.prototype.open;
                const originalXHRSend = XMLHttpRequest.prototype.send;

                XMLHttpRequest.prototype.open = function(method, url, async, user, password) {
                    this._url = url;
                    this._headersAdded = false; // Reset flag for new requests
                    this._method = method; // Store method for debugging
                    return originalXHROpen.apply(this, arguments);
                };

                XMLHttpRequest.prototype.send = function(data) {
                    const xhr = this;

                    // Only process if headers haven't been added yet
                    if (!xhr._headersAdded) {
                        // Ensure token is available and add headers
                        ensureTokenAndAddHeaders(xhr).then(() => {
                            originalXHRSend.call(xhr, data);
                        }).catch(() => {
                            originalXHRSend.call(xhr, data);
                        });
                    } else {
                        // Headers already added, just send
                        originalXHRSend.call(xhr, data);
                    }
                };
            })();

            async function retrieveToken() {
                // Use the App Bridge API as per documentation
                if (window.shopify && window.shopify.idToken) {
                    try {
                        const token = await window.shopify.idToken();
                        if (token) {
                            window.sessionToken = token;
                            return token;
                        }
                    } catch (error) {
                        console.warn('Failed to retrieve session token:', error);
                    }
                }

                if (!window.sessionToken) {
                    const urlParams = new URLSearchParams(window.location.search);
                    const idToken = urlParams.get('id_token');
                    if (idToken) {
                        window.sessionToken = idToken;
                        return idToken;
                    }
                }

                return window.sessionToken;
            }

            async function ensureTokenAndAddHeaders(xhr) {
                try {
                    const url = xhr._url || '';
                    if (url && !url.includes(window.location.hostname) && !url.includes('localhost')) {
                        return;
                    }

                    window.sessionToken = await window.shopify.idToken();

                    if (window.sessionToken) {
                        if (!xhr._headersAdded) {
                            xhr.setRequestHeader("Authorization", "Bearer " + window.sessionToken);
                            xhr._headersAdded = true;
                        }
                    }
                } catch (error) {
                    console.warn('Error adding authorization header:', error);
                }
            }

            document.addEventListener("DOMContentLoaded", async () => {
                Turbolinks.clearCache();
                var isInitialRedirect = true;

                await retrieveToken();

                redirectThroughTurbolinks(isInitialRedirect);

                document.addEventListener("turbolinks:load", async function(event) {
                    await retrieveToken();
                    redirectThroughTurbolinks();
                });

                async function redirectThroughTurbolinks(isInitialRedirect = false) {
                    var data = document.getElementById("shopify-app-init").dataset;
                    var validLoadPath = data && data.loadPath;
                    var shouldRedirect = false;

                    await retrieveToken();

                    switch (isInitialRedirect) {
                        case true:
                            shouldRedirect = validLoadPath;
                            break;
                        case false:
                            shouldRedirect = validLoadPath && data.loadPath !== "<?= url("/dashboard") ?>";
                            break;
                    }

                    if (shouldRedirect) Turbolinks.visit(data.loadPath);
                }

                function keepRetrievingToken() {
                    setInterval(async () => {
                        await retrieveToken();
                    }, 2000);
                }

                keepRetrievingToken();
            });

            // Toast functions following the documentation pattern
            window.flashNotice = function(message) { 
                if (window.shopify && window.shopify.toast) {
                    window.shopify.toast.show(message);
                }
            };
            window.flashError = function(message) { 
                if (window.shopify && window.shopify.toast) {
                    window.shopify.toast.show('Error: ' + message, {isError: true});
                }
            };
        } catch (error) {
            console.error('Failed to initialize App Bridge:', error);
            if (window.flashError) {
                window.flashError('Failed to initialize App Bridge');
            }
        }
    }

    initializeAppBridge();
</script>