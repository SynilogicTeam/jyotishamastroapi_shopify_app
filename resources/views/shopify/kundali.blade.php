<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/kundali_style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="kundali_wrapper" style="padding-top: 20px; padding-bottom: 20px;">
    {{-- Kundali Generate --}}
    <div class="kundali-cont" id="kundali_gen">
        <div class="kundali-head">
            <h1>Generate Kundali</h1>
        </div>

        <div class="kundali-form-container">
            <form id="kundaliForm">
                <div class="kundali-form-grid">
                    <div class="kundali-form-group">
                        <label for="name">Full Name</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-user kundali-input-icon"></i>
                            <input type="text" id="name" name="name" class="kundali-form-control"
                                placeholder="Enter your full name" required>
                        </div>
                    </div>

                    <div class="kundali-form-group">
                        <label for="birthDate">Date of Birth</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-calendar-alt kundali-input-icon"></i>
                            <input type="date" id="birthDate" name="birthdate" class="kundali-form-control" required>
                        </div>
                    </div>

                    <div class="kundali-form-group">
                        <label for="birthTime">Time of Birth</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-clock kundali-input-icon"></i>
                            <input type="time" id="birthTime" name="birthtime" class="kundali-form-control" required>
                        </div>
                    </div>

                    <div class="kundali-form-group">
                        <label for="birthPlace">Place of Birth</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-map-marker-alt kundali-input-icon"></i>
                            <input type="text" id="birthPlace" class="autocomplete kundali-form-control"
                                placeholder="City, State, Country" required>
                            <input type="hidden" name="latitude" id="free_kundli_latitude" value="">
                            <input type="hidden" name="longitude" id="free_kundli_longitude" value="">
                            <input type="hidden" name="city" id="city" value="">
                            <input type="hidden" name="state" id="state" value="">
                            <input type="hidden" name="country" id="country" value="">
                            <input type="hidden" name="tz" id="tz" value="">
                        </div>
                    </div>

                    <div class="kundali-form-group">
                        <label for="style">Kundali Style</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-star kundali-input-icon"></i>
                            <select id="style" name="style" class="kundali-form-control" required>
                                <option value="south">South</option>
                                <option value="north">North</option>
                                <option value="east">East</option>

                            </select>
                        </div>
                    </div>

                    <div class="kundali-form-group">
                        <label for="lang">Language</label>
                        <div class="kundali-input-wrapper">
                            <i class="fas fa-language kundali-input-icon"></i>
                            <select id="lang" name="language" class="kundali-form-control" required>
                                <option value="en" selected>English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="kundali-button-group">
                    <button type="submit" class="kundali-btn kundali-btn-primary">
                        <i class="fas fa-chart-pie"></i>
                        View Kundali
                    </button>
                    <button type="button" onclick="openPricingModal();" class="kundali-btn kundali-btn-success">
                        <i class="fas fa-credit-card"></i>
                        Download PDF
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Kundali Result --}}
    <div class="margin_tabs hidden" id="kundalihide">
        <div class="tabs padding-right" id="tabButtons">
            <button class="tab-button active" id="basic-tab" data-tab="basic">Basic</button>
            <button class="tab-button" id="chart-tab" data-tab="chart">Chart</button>
            <button class="tab-button" id="planetary-tab" data-tab="planetary">Planetary</button>
            <button class="tab-button" id="dashas-tab" data-tab="dashas">Dashas</button>
            <button class="tab-button" id="ashtakvarga-tab" data-tab="ashtakvarga">Ashtakvarga</button>
            <button class="tab-button" id="ascendant-tab" data-tab="ascendant">Ascendant Sign</button>
            <button class="tab-button" id="kp-tab" data-tab="kp">KP</button>
            <button class="tab-button" id="dosh-tab" data-tab="dosh">Dosh</button>
            <button class="tab-button" id="rudraksh-tab" data-tab="rudraksh">Rudraksh Suggestion</button>
            <button class="tab-button" id="gem-tab" data-tab="gem">Gem Suggestion / Dashas</button>
            <div class="right-exit-btn">
                <button type="button" id="go_back_btn" class="exit-btn response_content"> <i class="fas fa-times"></i></button> 
            </div>
        </div>

        
        <div id="tabContents">
            
            {{-- Basic --}}
            <div class="tab-content active" id="basic"></div>

            {{-- Charts --}}
            <div class="tab-content" id="chart">
                <div class="containerForALL">
                    <h1 class="main-title">Charts</h1>
                    <div class="charts-container">
                        <div id="chartData" class="chartSingle">
                            
                        </div>
                    </div>
                </div>
            </div>

            {{-- Planetary --}}
            <div class="tab-content" id="planetary">
                <div class="containerForALL">
                    <h1 class="main-title">Planetary</h1>
                    <div id="planetaryData" class="container-planetary">
                        
                    </div>
                </div>
            </div>

            {{-- Dasha --}}
            <div class="tab-content" id="dashas"></div>

            <div class="tab-content" id="ashtakvarga"></div>

            <div class="tab-content" id="ascendant"></div>

            <div class="tab-content" id="kp">
                <div class="containerForALL">
                    <h1 class="main-title">Bhav Chalit Chart</h1>
                    <div id="chart_bhav" class="kp-content">
                        
                    </div>

                    <div class="chart-scroll ">
                        <table class="kp-table">
                            <thead>
                                <tr class="hover-none">
                                    <th>Rasi No.</th>
                                    <th>Zodiac</th>
                                    <th>Name</th>
                                    <th>House</th>
                                    <th>Global D.</th>
                                    <th>Local D.</th>
                                    <th>Pseudo Rasi No.</th>
                                    <th>Pseudo Rasi</th>
                                    <th>Pseudo Rasi Load</th>
                                    <th>Pseudo Rasi Nakshatra</th>
                                    <th>Pseudo Rasi Nakshatra No</th>
                                    <th>Pseudo Rasi Nakshatra Pada</th>
                                    <th>Pseudo Rasi Nakshatra Load</th>
                                    <th>Sub Load</th>
                                    <th>Sub Sub Load</th>
                                    <th>Full Name</th>
                                </tr>
                            </thead>
                            <tbody id="planetTableBody">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Dosh --}}
            <div class="tab-content" id="dosh">
                <div class="tab-content" id="dosh">
                    <div class="containerForALL">

                        <!-- Tabs for KP Section -->
                        <div class="sub-tabs" id="kpTabButtons">
                            <button class="kundali-sub-tab-button active" data-tab="kalsarp">Kalsarp Dosh</button>
                            <button class="kundali-sub-tab-button" data-tab="manglik">Manglik Dosh</button>
                            <button class="kundali-sub-tab-button" data-tab="pitra">Pitra Dosh</button>
                            <button class="kundali-sub-tab-button" data-tab="mangal">Mangal Dosh</button>
                        </div>

                        <!-- Tab Content for KP Section -->
                        <div id="kpTabContents">
                            <!-- Kalsarp Dosh -->
                            <div class="kundali-sub-tab-content active" id="kalsarp"></div>

                            <!-- Manglik Dosh -->
                            <div class="kundali-sub-tab-content" id="manglik"></div>

                            <!-- Pitra Dosh -->
                            <div class="kundali-sub-tab-content" id="pitra"></div>

                            <!-- Mangal Dosh -->
                            <div class="kundali-sub-tab-content" id="mangal"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Rudraksh --}}
            <div class="tab-content" id="rudraksh"></div>
            
            {{-- Gem --}}
            <div class="tab-content" id="gem"></div>

            @include('partials.preloader')

            <div class="kundali-button-group">
                <button type="button" onclick="openPricingModal();" class="kundali-btn response_content">
                    <i class="fas fa-credit-card"></i>
                    Download PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Nakshatra Selection -->
    <div id="KundaliPriceModal" class="modal-kundli pricing-kun-modal hidden">
        <div class="modal-content-kundli">
            <span class="close-button-kundli" onclick="closePricingModal()">&times;</span><br>
          	<h4 class="payment-text">The Kundali report will be delivered to your registered email address once the payment has been successfully completed.</h4>
            <div class="kundali-modal">
                <div class="kundali-card">
                    <h3>Basic Plan</h3>
                    <div class="kundali-price">@php echo html_entity_decode($small_kundali_price); @endphp</div>
                    <div class="kundali-description">Small Size Kundali</div>
                    <a href="{{ url('generate/checkout-url/1') }}" class="purchase_btn kundali-btn-popup">Purchase Now <i class="fa fa-refresh spin_btn hidden" aria-hidden="true"></i></a>
                </div>
                <div class="kundali-card">
                    <h3>Premium Plan</h3>
                    <div class="kundali-price">@php echo html_entity_decode($medium_kundali_price); @endphp</div>
                    <div class="kundali-description">Medium Size Kundali</div>
                    <a href="{{ url('generate/checkout-url/2') }}" class="purchase_btn kundali-btn-popup">Purchase Now <i class="fa fa-refresh spin_btn hidden" aria-hidden="true"></i></a>
                </div>
                <div class="kundali-card">
                    <h3>Advanced Plan</h3>
                    <div class="kundali-price">@php echo html_entity_decode($large_kundali_price); @endphp</div>
                    <div class="kundali-description">Large Size Kundali</div>
                    <a href="{{ url('generate/checkout-url/3') }}" class="purchase_btn kundali-btn-popup">Purchase Now <i class="fa fa-refresh spin_btn hidden" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Login Modal --}}
    <div id="login_modal_kundali" class="login_modal_kundali modal">
        <div class="login-modal-content-kundli">
            <span class="login-modal-kundali-close-btn" onclick="">&times;</span>
            <div class="login-modal-kundali">
                <div class="kundali-description-kund">Authentication Needed!</div>
                <div class="kundali-description-kund">Redirecting to login... Please wait...</div>
            </div>
        </div>
    </div>

    <script>

        function checkAndDeductCredits(credits)
        {
            return axios.post("{{ url('check-credits') }}", {
              	credits: credits,
                shop_id: "{{ session('shop_id') }}",
                _token: "{{ csrf_token() }}"
            })
            .then(response => {
                if(response.data.is_available)
                {
                    return 1;
                }
                else
                {
                    console.log("Note: You don`t have enough credits to generate kundali.");
                    return 0;
                }
            });
        }

        function checkRemainingCredits()
        {
            axios.post("{{ url("check-remaining-credits") }}", {
                shop_id: "{{ session('shop_id') }}",
                _token: "{{ csrf_token() }}"
            })
            .then(response => {

                if (response.data.is_enable_kundali == 0) {
                    var kundaliGen = document.getElementById('kundalihide');
                    if (kundaliGen) {
                        kundaliGen.style.display = 'none';
                    }
                    
                    document.querySelectorAll('.kundali-btn').forEach(function(btn) {
                        btn.classList.add('disabled');
                        btn.setAttribute('disabled', 'disabled');
                        btn.style.pointerEvents = 'none';
                        /* btn.innerHTML = 'Insufficient Credits'; */
                    });
                }
            });
        }

        checkRemainingCredits();

        /* Go Back */

        var go_back_btn = document.querySelector('#go_back_btn');

        if(go_back_btn)
        {
            go_back_btn.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector("#kundalihide").style.display = "none";
                document.querySelector("#kundali_gen").style.display = "block";
            });
        }

        /* Set saved data in Kundali Form */
        if (__st.cid != undefined && __st.cid != null && __st.cid != 0) {
            axios.get("{{ url('get-user-details') }}", {
                params: {
                    shop_id: "{{ session('shop_id') }}",
                    customer_id: __st.cid
                }
            })
            .then(response => {

                document.getElementById('name').value = response.data.name || '';
                document.getElementById('birthDate').value = response.data.birth_date || '';
                document.getElementById('birthTime').value = response.data.birth_time || '';
                document.getElementById('birthPlace').value = response.data.birth_place || '';
                document.getElementById('free_kundli_latitude').value = response.data.latitude || '';
                document.getElementById('free_kundli_longitude').value = response.data.longitude || '';
                document.getElementById('city').value = response.data.city || '';
                document.getElementById('state').value = response.data.state || '';
                document.getElementById('country').value = response.data.country || '';
                document.getElementById('tz').value = response.data.tz || '';
                document.getElementById('style').value = response.data.style || 'south';
                document.getElementById('lang').value = response.data.language || 'en';
            });
        }

        /* Open Checkout Page */
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.purchase_btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var clicked_spinner = this.querySelector('.spin_btn');
                    clicked_spinner.classList.remove('hidden');

                    fetch(this.getAttribute('href'))
                        .then(response => response.json())
                        .then(data => {

                            /*console.log("data01");
                            console.log(this.getAttribute('href'));*/
                        	console.log("data02");
                        	console.log(data);

                            if (data.url) {
                                clicked_spinner.classList.add('hidden');
                                window.open(data.url, '_blank');
                              console.log(data.url);
                              console.log("data.url");
                            } else {
                                setTimeout(() => {
                                    if (data.url) {
                                        clicked_spinner.classList.add('hidden');
                                        window.open(data.url, '_blank');
  
                                    } else {
                                        alert("Please wait for a moment and try again.");
                                        clicked_spinner.classList.add('hidden');
                                    }	
                                }, 1000);
                            }
                        }).catch(err => {
                            /* console.error("Error:", err);
                            alert("Something went wrong."); */
                        });
                });
            });
        });

        function openPricingModal() {
            /* Check Customer is Logged in or not */
            if (__st.cid == undefined || __st.cid == null || __st.cid == 0) {
                
                document.body.classList.add('login_modal_kundali_show');
                document.getElementById('login_modal_kundali').classList.remove('hidden');
                document.getElementById('login_modal_kundali').classList.add('show');

                /* Ensure modal is visible in viewport */
                setTimeout(() => {
                    const modal = document.getElementById('login_modal_kundali');
                    if (modal.classList.contains('show')) {
                        modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 100);

                setTimeout(function(){
                    window.location.href = "https://{{ session('shop_name') }}.myshopify.com/account/login";
                }, 2500);

                return;
            }

            /* Save User Details in the Table */

            var userDetails = {
                shop_id: "{{ session('shop_id') }}",
                customer_id: __st.cid,
                name: document.getElementById('name').value,
                birth_date: document.getElementById('birthDate').value,
                birth_time: document.getElementById('birthTime').value,
                birth_place: document.getElementById('birthPlace').value,
                latitude: document.getElementById('free_kundli_latitude').value,
                longitude: document.getElementById('free_kundli_longitude').value,
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                country: document.getElementById('country').value,
                tz: document.getElementById('tz').value,
                style: document.getElementById('style').value,
                lang: document.getElementById('lang').value
            };

            if (userDetails.name == "" || userDetails.birth_date == "" || userDetails.birth_time == "" || userDetails.birth_place == "" || userDetails.latitude == "" || userDetails.longitude == "")
            {
                alert("Please fill all fields...");
                return;
            }

            setTimeout(() => {
                                
                var kundali_id = 0;
                axios.post("{{ url('kundali/save-user-details') }}", userDetails).then(response => {

                    /* Add customer ID & Kundali ID in URL */

                    var anchors = document.querySelectorAll('.purchase_btn');

                    if (anchors) {
                        anchors.forEach(anchor => {
                            var url = new URL(anchor.href);
                            url.searchParams.set('customerId', __st.cid);
                            url.searchParams.set('kundali_id', response.data.kundali_id || 0);
                            url.searchParams.set('kundali_type', "kundali");
                            url.searchParams.set('shop_id', "{{ session('shop_id') }}");
                            anchor.href = url.toString();
                        });
                    }
                })
                .catch(error => {
                    /* console.error("Error saving user details:", error); */
                });
                
            }, 300);

            /* Open Modal */
            
            document.body.classList.add('login_modal_kundali_show');
            const modal = document.getElementById("KundaliPriceModal");
            modal.classList.remove('hidden');
            modal.classList.add("show");
            
            /* Ensure modal is visible and centered */
            setTimeout(() => {
                if (modal.classList.contains('show')) {
                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }, 100);
        }

        function closePricingModal() {
            document.body.classList.remove('login_modal_kundali_show');
            const modal = document.getElementById("KundaliPriceModal");
            modal.classList.remove("show");
        }

        window.addEventListener("click", function(event) {
            const modal = document.getElementById("KundaliPriceModal");
            if (event.target === modal) {
                closePricingModal();
            }
        });

        window.addEventListener("keydown", function(event) {
            if (event.key === "Escape") {
                closePricingModal();
            }
        });

        var kundaliTabButtons = document.querySelectorAll(".tab-button");
        var kundaliTabContents = document.querySelectorAll(".tab-content");
        kundaliTabButtons.forEach(button => {
            button.addEventListener("click", () => {
                var target = button.getAttribute("data-tab");
                kundaliTabButtons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                kundaliTabContents.forEach(content => {
                    content.classList.remove("active");
                    if (content.id === target) content.classList.add("active");
                });
            });
        });
    </script>

    <script>
        async function getTimezone(lat, log) {
            var timestamp = Math.floor(Date.now() / 1000);
            var googleKey = "{{ env('Google_Map_API_Key') }}";
            /* if (!googleKey) {
                console.error("Google Maps API Key is required.  Please set it in the googleKey varant.");
                return null;
            } */
            var url =
                `https://maps.googleapis.com/maps/api/timezone/json?location=${lat},${log}&timestamp=${timestamp}&key=${googleKey}`;

            try {
                var response = await axios.get(url);
                var data = response.data;

                if (data.status !== 'OK') {
                    /* console.error(`Google Time Zone API error: ${data.status}`); */
                    return null;
                } else {

                    let tz = (response.data.dstOffset + response.data.dstOffset) / 3600;
                    document.getElementById('tz').value = tz;
                }
            } catch (error) {
                /* console.error("Error fetching timezone:", error); */
                return null;
            }
        }
    </script>

    <script>
        function basicTab(name, date, time, latitude, longitude, tz, lang, style)
        {
            var url = `https://api.jyotishamastroapi.com/api/extended_horoscope/extended_kundali?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&style=${style}&lang=${lang}&colored_planets=true&color=%23657798`;

            axios.get(url, {
                headers: {
                    key: "{{ $jyotisham_astro_api }}"
                }
            })
            .then(response => {
                var r = response.data.response;
                document.querySelector(".main_preloader").style.display = "none";
                document.querySelector('#basic').innerHTML = `
                <div class="containerForALL">
                    <h1 class="main-title">Basic Details</h1>
                    <div class="subtitle">Name: <b>${name}</b> &nbsp; | &nbsp; D.O.B: ${date} &nbsp; | &nbsp; T.O.B: ${time} &nbsp; | &nbsp; P.O.B: ${city},${state},${country}</div>

                    <div class="section-basic">
                        <div class="section-title-basic">Astrological Essentials</div>
                        <div class="info-list">
                            <div class="info-item"><span class="info-label">Ascendant Sign:</span> ${r.ascendant_sign}</div>
                            <div class="info-item"><span class="info-label">Ascendant Nakshatra:</span> ${r.ascendant_nakshatra}</div>
                            <div class="info-item"><span class="info-label">Rasi (Moon Sign):</span> ${r.rasi}</div>
                            <div class="info-item"><span class="info-label">Rasi Lord:</span> ${r.rasi_lord}</div>
                            <div class="info-item"><span class="info-label">Nakshatra:</span> ${r.nakshatra} (Pada ${r.nakshatra_pada})</div>
                            <div class="info-item"><span class="info-label">Nakshatra Lord:</span> ${r.nakshatra_lord}</div>
                            <div class="info-item"><span class="info-label">Sun Sign:</span> ${r.sun_sign}</div>
                            <div class="info-item"><span class="info-label">Tithi:</span> ${r.tithi}</div>
                            <div class="info-item"><span class="info-label">Karana:</span> ${r.karana}</div>
                            <div class="info-item"><span class="info-label">Yoga:</span> ${r.yoga}</div>
                            <div class="info-item"><span class="info-label">Name Letters:</span> <span class="name-letters">${r.name_start}</span></div>
                        </div>
                    </div>
                    
                    <div class="section-basic">
                        <div class="section-title-basic">Recommended Gemstones</div>
                        <div class="gemstones">
                            <div class="gemstone-card">
                            <div class="gemstone-title">Life Stone</div>
                            <div class="gemstone-name">${r.life_stone}</div>
                            </div>
                            <div class="gemstone-card">
                            <div class="gemstone-title">Lucky Stone</div>
                            <div class="gemstone-name">${r.lucky_stone}</div>
                            </div>
                            <div class="gemstone-card">
                            <div class="gemstone-title">Fortune Stone</div>
                            <div class="gemstone-name">${r.fortune_stone}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-basic">
                        <div class="section-title-basic">Other Attributes</div>
                        <table class="attributes-table">
                            <tr>
                                <th>Attribute</th>
                                <th>Value</th>
                            </tr>
                            <tr>
                                <td>Gana</td>
                                <td>${r.gana}</td>
                            </tr>
                            <tr>
                                <td>Yoni</td>
                                <td>${r.yoni}</td>
                            </tr>
                            <tr>
                                <td>Vasya</td>
                                <td>${r.vasya}</td>
                            </tr>
                            <tr>
                                <td>Nadi</td>
                                <td>${r.nadi}</td>
                            </tr>
                            <tr>
                                <td>Varna</td>
                                <td>${r.varna}</td>
                            </tr>
                            <tr>
                                <td>Paya</td>
                                <td>${r.paya}</td>
                            </tr>
                            <tr>
                                <td>Tatva</td>
                                <td>${r.tatva}</td>
                            </tr>
                        </table>
                    </div>
                </div>`;
            })
            .catch(error => {
                /* if (error.response) {
                    console.error("Server responded with error:", error.response.data);
                } else if (error.request) {
                    console.error("No response received:", error.request);
                } else {
                    console.error("Error setting up request:", error.message);
                } */
            });
        }
    </script>

    <script>
        function chartTab(date, time, latitude, longitude, tz, lang, style, division)
        {
            let url, currentTime, currnetDate;
            if (division === "transit_chart")
            {
                currnetDate = "17/03/2025";
                currentTime = "11:56";
                url = `https://api.jyotishamastroapi.com/api/dosha/${dosh}?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}&transit_date=${currnetDate}&transit_time=${currentTime}`;
            }
            else
            {
                url = `https://api.jyotishamastroapi.com/api/chart_image/${division}?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&style=${style}&lang=${lang}&colored_planets=true&color=%23657798`;

            }

            axios.get(url, {
                headers: {
                    key: "{{ $jyotisham_astro_api }}"
                }
            })
            .then(response => {

                document.querySelector(".main_preloader").style.display = "none";

                document.getElementById('chartData').innerHTML += `
                    <div>
                        <h4>${division.toUpperCase()}</h4>
                        ${response.data}
                    </div>`;
            })
            .catch(error => {
                /* console.error(`Error loading ${division} chart:`, error); */
            });
        }
    </script>

    <script>
        function doshTab(date, time, latitude, longitude, tz, lang, dosh)
        {
            var url = `https://api.jyotishamastroapi.com/api/dosha/${dosh}?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;
            axios.get(url, {
                headers: {
                    key: "{{ $jyotisham_astro_api }}"
                }
            })
            .then(response => {
                var res = response.data.response;

                document.querySelector(".main_preloader").style.display = "none";

                var container = document.createElement('div');
                container.classList.add(dosh);

                if (dosh === "mangal_dosh")
                {
                    document.querySelector('#mangal').innerHTML = `
                    <div class="report-container">
                        <div class="report-title">${dosh.toUpperCase()}</div>
                        <div class="bot-response">${res.bot_response}</div>
                        <div class="score-bar-container">
                            <span class="score-label">Dosha Score: ${res.score}%</span>

                        </div>
                        <table class="dosha-table">
                            <tr>
                                <th>Dosha from Lagna</th>
                                <td>${(res.is_dosha_present_mars_from_lagna) ? "Yes" : "No"}</td>
                            </tr>
                            <tr>
                                <th>Dosha from Moon</th>
                                <td>${(res.is_dosha_present_mars_from_moon) ? "Yes" : "No"}</td>
                            </tr>
                            <tr>
                                <th>Anshik Dosha</th>
                                <td>${(res.is_anshik) ? "Yes" : "No"}</td>
                            </tr>
                        </table>
                
                        <div class="section-title-basic dosh-margin">Factors:</div>
                        <div class="factors-list">
                            ${res.factors && res.factors.mars ? res.factors.mars : 'N/A'}
                        </div>
                    </div>`;

                }
                else if (dosh === "kaalsarp-dosh")
                {
                    document.querySelector('#kalsarp').innerHTML = `
                    <div class="report-container">
                        <div class="report-title">${dosh.toUpperCase()} Report</div>
                        <div class="bot-response">${res.bot_response}</div>
                        <table class="dosha-table">
                            <tr>
                                <th>Is Dosha Present</th>
                                <td>${(res.is_dosha_present) ? "Yes" : "No" }</td>
                            </tr>
                        </table>
                    </div>`;
                }
                else if (dosh === "manglik-dosh")
                {
                    document.querySelector('#manglik').innerHTML = `
                    <div class="report-container">
                        <div class="report-title">${dosh.toUpperCase()} Report</div>
                        <div class="bot-response">
                        ${res.bot_response}
                    </div>
                    <div class="score-bar-container">
                        <span class="score-label">${res.score}%</span>
                    </div>

                    <table class="dosha-table">
                        <tr>
                            <th>Manglik by Mars</th>
                            <td>${res.manglik_by_mars ? "Yes" : "No"}</td>
                        </tr>
                        <tr>
                            <th>Manglik by Saturn</th>
                            <td>${res.manglik_by_saturn ? "Yes" : "No"}</td>
                        </tr>
                        <tr>
                            <th>Manglik by Rahu/Ketu</th>
                            <td>${res.manglik_by_rahuketu ? "Yes" : "No"}</td>
                        </tr>
                        </table>
                        <div class="section-title-basic dosh-margin">Factors:</div>
                        <div class="factors-list">
                            ${res.factors.map(f => `<li>${f}</li>`).join('')}
                        </div>
                        <div class="section-title-basic dosh-margin">Aspects:</div>
                        <div class="factors-list">
                        <ul>
                            ${res.aspects.map(a => `<li>${a}</li>`).join('')}
                        </ul>
                        </div>
                    </div>`;

                }
                else if (dosh === "pitra-dosh")
                {
                    document.querySelector('#pitra').innerHTML = `
                    <div class="report-container">
                        <div class="report-title">${dosh.toUpperCase()} Report</div>
                        <div class="bot-response">${res.bot_response}</div>
                        <table class="dosha-table">
                            <tr>
                                <th>Is Dosha Present</th>
                                <td>${res.is_dosha_present ? 'Yes' : 'No'}</td>
                            </tr>
                        </table>
                        <div class="section-title-basic dosh-margin">Effects:</div>
                        <div class="factors-list">
                            <ul>
                                ${res.effects.map(effect => `<li>${effect}</li>`).join('')}
                            </ul>
                        </div>
                        <div class="section-title-basic dosh-margin">Remedies:</div>
                        <div class="factors-list">
                            <ul>
                                ${res.remedies.map(remedy => `<li>${remedy}</li>`).join('')}
                            </ul>
                        </div>
                    </div>`;
                }
            })
            .catch(error => {
                /* console.error(`Error loading ${dosh} dosha analysis:`, error); */
            });
        }
    </script>

    <script>
        function initialize() {
            var autocomplete = [];
            var input = document.getElementsByClassName('autocomplete');
            if (input.length > 0) {
                for (var i = 0; i < input.length; i++) {
                    autocomplete[input[i].id] = new google.maps.places.Autocomplete(input[i]);
                }
                document.addEventListener('focus', function(event) {
                    if (event.target.classList.contains('autocomplete')) {
                        var id = event.target.id;

                        var autocompleteInput = autocomplete[id];

                        if (autocompleteInput) {
                            var matching_latitude = 'boy_lat';
                            var matching_longitude = 'boy_lon';

                            if (id == 'girlPob') {
                                matching_latitude = 'girl_lat';
                                matching_longitude = 'girl_lon';
                            }

                            autocompleteInput.addListener('place_changed', function() {

                                var place = this.getPlace();

                                var placeval = place.geometry.location.lat() + ',' + place.geometry.location.lng();

                                /* Kundali */
                                var latKundli = document.getElementById('free_kundli_latitude');
                                var lngKundli = document.getElementById('free_kundli_longitude');
                                
                                if (latKundli && lngKundli) {
                                    latKundli.value = place.geometry.location.lat();
                                    lngKundli.value = place.geometry.location.lng();
                                }

                                getTimezone(place.geometry.location.lat(), place.geometry.location.lng());

                                /* Kundali Matching */
                                var latInput = document.getElementById(matching_latitude);

                                if (latInput) {
                                    latInput.value = place.geometry.location.lat();
                                }

                                var lngInput = document.getElementById(matching_longitude);

                                if (lngInput) {
                                    lngInput.value = place.geometry.location.lng();
                                }
                                getTimezonematching(place.geometry.location.lat(), place.geometry.location.lng(), id);
                            });
                        }
                    }
                }, true);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var kundaliElement = document.querySelector("#kundalihide");

            if (kundaliElement)
            {
                kundaliElement.style.display = "none";
                kundaliElement.classList.remove("hidden");
            }

            var date, time, name, latitude, longitude, tz, lang, style, division, dosh;

            var kundaliForm = document.getElementById('kundaliForm');

            if (kundaliForm)
            {
                kundaliForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    division = [
                        "d1", "d9"
                    ];
                    /* division = [
                    "d1", "d2", "d3", "d4", "d6", "d7", "d8", "d9", "d10", "d12", "d16", "d20",
                    "d24", "d27", "d30", "d40", "d45", "d60", "bhav_chalit_chart", "sun", "moon", "transit_chart"
                    ]; */
                    dosh = [
                        "mangal_dosh", "kaalsarp-dosh", "manglik-dosh", "pitra-dosh"
                    ];
                    date = document.getElementById('birthDate').value;
                    name = document.getElementById('name').value;
                    latitude = document.getElementById('free_kundli_latitude').value;
                    longitude = document.getElementById('free_kundli_longitude').value;
                    tz = document.getElementById('tz').value;
                    lang = document.getElementById('lang').value;
                    city = document.getElementById('city').value;
                    state = document.getElementById('state').value;
                    country = document.getElementById('country').value;
                    style = document.getElementById('style').value;
                    time = document.getElementById('birthTime').value;
                    document.querySelector("#kundalihide").style.display = "block";
                    document.querySelector("#kundali_gen").style.display = "none";

                    var dd = checkAndDeductCredits("{{ config("constants.basic_kundali_credits") }}");

                    console.log(dd);

                    if(dd)
                    {
                        basicTab(name, date, time, latitude, longitude, tz, lang, style);
                    }
                });
            }

            /* basic tab */

            var basicTabEle = document.getElementById('basic-tab');

            if (basicTabEle)
            {
                basicTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.basic_kundali_credits") }}'))
                    {
                        basicTab(name, date, time, latitude, longitude, tz, lang, style);
                    }
                });
            }

            /* chart */
            var ChartTabEle = document.getElementById('chart-tab');

            if (ChartTabEle)
            {
                ChartTabEle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector('#chartData').innerHTML = '';

                    document.querySelector(".main_preloader").style.display = "block";

                    division.forEach(div => {

                        if(checkAndDeductCredits('{{ config("constants.chart_api_charge") }}'))
                        {
                            chartTab(date, time, latitude, longitude, tz, lang, style, div);
                        }
                    });
                });
            }

            /* planetary */

            var PlanetaryTabEle = document.getElementById('planetary-tab');

            if (PlanetaryTabEle)
            {
                PlanetaryTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.planet_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/horoscope/planet-details?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;

                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var res = response.data.response;

                            document.querySelector(".main_preloader").style.display = "none";

                            document.querySelector('#planetaryData').innerHTML = '';

                            let planetsHTML =
                            `<section class="card-planetary">
                                <div style="overflow-x: auto;">
                                    <table class="planetary-table">
                                        <thead>
                                            <tr class="hover-none">
                                                <th>Planet</th>
                                                <th>Zodiac</th>
                                                <th>Global D.</th>
                                                <th>Local D.</th>
                                                <th>Nakshatra</th>
                                                <th>Sign Lord</th>
                                                <th>Nakshatra Lord</th>
                                                <th>House</th>
                                                <th>Avastha</th>
                                                <th>Lord Status</th>
                                                <th>Combust</th>
                                            </tr>
                                        </thead>
                                    <tbody>`;

                                    for (let key in res) {
                                        if (!isNaN(key)) {
                                            var planet = res[key];
                                            planetsHTML += `
                                            <tr>
                                                <td>${planet.full_name}</td>
                                                <td>${planet.zodiac}</td>
                                                <td>${planet.global_degree ? Math.round(planet.global_degree) : ''}</td>
                                                <td>${planet.local_degree ? Math.round(planet.local_degree) : ''}</td>
                                                <td>${planet.nakshatra}</td>
                                                <td>${planet.zodiac_lord}</td>
                                                <td>${planet.nakshatra_lord}</td>
                                                <td>${planet.house}</td>
                                                <td>${planet.basic_avastha}</td>
                                                <td>${planet.lord_status}</td>
                                                <td>${planet.is_combust ? 'Yes' : 'No'}</td>
                                            </tr>
                                        `;
                                        }
                                    }

                            planetsHTML += `</tbody>
                                    </table>
                                </div>
                            </section>`;

                            /* Lucky Info */
                            var luckyHTML = `
                            <section class="card-planetary">
                                <div class="section-title-basic">Lucky Details</div>
                                    <div class="lucky-details">
                                    <div class="lucky-item">
                                        <h3>Lucky Gem</h3>
                                        <p>${res.lucky_gem.join(', ')}</p>
                                    </div>
                                    <div class="lucky-item">
                                        <h3>Lucky Number</h3>
                                        <p>${res.lucky_num.join(', ')}</p>
                                    </div>
                                    <div class="lucky-item">
                                        <h3>Lucky Colors</h3>
                                        <p>${res.lucky_colors.join(', ')}</p>
                                    </div>
                                    <div class="lucky-item">
                                        <h3>Lucky Letters</h3>
                                        <p>${res.lucky_letters.join(', ')}</p>
                                    </div>
                                    <div class="lucky-item">
                                        <h3>Name Starts</h3>
                                        <p>${res.lucky_name_start.join(', ')}</p>
                                    </div>
                                </div>
                            </section>`;

                            /* Panchang */
                            var panchang = res.panchang;
                            var panchangHTML = `
                            <section class="card-planetary">
                                <div class="section-title-basic">Panchang at Birth</div>
                                <div style="overflow-x: auto;">
                                    <table class="planetary-table">
                                        <thead>
                                            <tr class="hover-none">
                                                <th>Detail</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Day</td>
                                                <td>${panchang.day_of_birth} (${panchang.day_lord})</td>
                                            </tr>
                                            <tr>
                                                <td>Hora Lord</td>
                                                <td>${panchang.hora_lord}</td>
                                            </tr>
                                            <tr>
                                                <td>Sunrise</td>
                                                <td>${panchang.sunrise_at_birth}</td>
                                            </tr>
                                            <tr>
                                                <td>Sunset</td>
                                                <td>${panchang.sunset_at_birth}</td>
                                            </tr>
                                            <tr>
                                                <td>Karana</td>
                                                <td>${panchang.karana}</td>
                                            </tr>
                                            <tr>
                                                <td>Yoga</td>
                                                <td>${panchang.yoga}</td>
                                            </tr>
                                            <tr>
                                                <td>Tithi</td>
                                                <td>${panchang.tithi}</td>
                                            </tr>
                                            <tr>
                                                <td>Ayanamsa</td>
                                                <td>${panchang.ayanamsa} (${panchang.ayanamsa_name})</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>`;

                            /* Dasa Info html */
                            var dasaHTML = `
                            <section class="card-planetary">
                                <div class="section-title-basic">Dasa Details</div>
                                <div style="overflow-x: auto;">
                                    <table class="planetary-table">
                                        <thead>
                                            <tr class="hover-none">
                                                <th>Detail</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Birth Dasa</td>
                                                <td>${res.birth_dasa} (from ${res.birth_dasa_time})</td>
                                            </tr>
                                            <tr>
                                                <td>Current Dasa</td>
                                                <td>${res.current_dasa} (from ${res.current_dasa_time.trim()})</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>`;

                            document.querySelector('#planetaryData').innerHTML = planetsHTML + luckyHTML + panchangHTML + dasaHTML;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* dashas */
            var DashasTabEle = document.getElementById('dashas-tab');

            if (DashasTabEle)
            {
                DashasTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.dasha_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/dasha/current-mahadasha?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;
                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var data = response.data.response;

                            document.querySelector(".main_preloader").style.display = "none";

                            document.querySelector('#dashas').innerHTML = `
                            <div class="containerForALL">
                                <h1 class="main-title">Planetary Periods (Dasha)</h1>
                                <div class="dasha-cards">
                                    <div class="dasha-period mahadasha">
                                        <span class="period-icon">☾</span>
                                        <span class="planet-name">Mahadasha: ${data.mahadasha.name}</span>
                                        <span class="date-range">${data.mahadasha.start} - ${data.mahadasha.end}</span>
                                    </div>

                                    <div class="dasha-period antardasha">
                                        <span class="period-icon">♀</span>
                                        <span class="planet-name">Antardasha: ${data.antardasha.name}</span>
                                        <span class="date-range">${data.antardasha.start} - ${data.antardasha.end}</span>
                                    </div>

                                    <div class="dasha-period paryantardasha">
                                        <span class="period-icon">♃</span>
                                        <span class="planet-name">Paryantardasha: ${data.paryantardasha.name}</span>
                                        <span class="date-range">${data.paryantardasha.start} - ${data.paryantardasha.end}</span>
                                    </div>

                                    <div class="dasha-period shookshamadasha">
                                        <span class="period-icon">☿</span>
                                        <span class="planet-name">Shookshamadasha: ${data.Shookshamadasha.name}</span>
                                        <span class="date-range">${data.Shookshamadasha.start} - ${data.Shookshamadasha.end}</span>
                                    </div>

                                    <div class="dasha-period pranadasha">
                                        <span class="period-icon">☊</span>
                                        <span class="planet-name">Pranadasha: ${data.Pranadasha.name}</span>
                                        <span class="date-range">${data.Pranadasha.start} - ${data.Pranadasha.end}</span>
                                    </div>
                                </div>
                            </div>`;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* ashtakvarga */
            var AshtakvargaTabEle = document.getElementById('ashtakvarga-tab');

            if (AshtakvargaTabEle)
            {
                AshtakvargaTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.ashtakvarga_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/horoscope/ashtakvarga?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;
                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var data = response.data.response;

                            document.querySelector(".main_preloader").style.display = "none";

                            let planet_lang;
                            if (lang == 'en') {
                                planet_lang = 'Planet';
                            } else {
                                planet_lang = 'ग्रह';
                            }
                            var rashiNames = {
                                en: [
                                    'Mesha (Aries)', 'Vrishabha (Taurus)', 'Mithuna (Gemini)',
                                    'Karka (Cancer)',
                                    'Simha (Leo)', 'Kanya (Virgo)', 'Tula (Libra)',
                                    'Vrischika (Scorpio)',
                                    'Dhanu (Sagittarius)', 'Makara (Capricorn)',
                                    'Kumbha (Aquarius)', 'Meena (Pisces)'
                                ],
                                hi: [
                                    'मेष', 'वृषभ', 'मिथुन', 'कर्क', 'सिंह', 'कन्या', 'तुला',
                                    'वृश्चिक',
                                    'धनु', 'मकर', 'कुंभ', 'मीन'
                                ]
                            };
                            var rashis = rashiNames[lang] || rashiNames['en'];

                            let ashtakHTML = `
                            <div class="containerForALL">
                                <h1 class="main-title">Ashtakvarga Chart</h1>
                                <div class="chart-scroll">
                                    <table class="ashtakvarga-table2" border="1" cellpadding="5" cellspacing="0">
                                        <thead>
                                            <tr class="hover-none">
                                                <th class="planet-header">${planet_lang}</th>
                                                ${data.ashtakvarga_points[0].map((_, i) => `<th>${rashis[i]}</th>`).join('')}
                                            </tr>
                                        </thead>
                                        <tbody>`;

                                        data.ashtakvarga_order.forEach((planet, index) => {
                                            ashtakHTML += `
                                            <tr>
                                                <td class="planet-header">${planet}</td>
                                                ${data.ashtakvarga_points[index].map(point => `<td>${point}</td>`).join('')}
                                            </tr>`;
                                        });

                                ashtakHTML += `
                                    </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                ${data.ashtakvarga_total.map(val => `<th>${val}</th>`).join('')}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>`;

                            document.querySelector('#ashtakvarga').innerHTML = ashtakHTML;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* ascendant_sign */
            var AscendantTabEle = document.getElementById('ascendant-tab');

            if (AscendantTabEle)
            {
                AscendantTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.ascendant_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/horoscope/ascendant-report?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;

                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var data = response.data.response[0];

                            document.querySelector(".main_preloader").style.display = "none";

                            document.querySelector('#ascendant').innerHTML = `
                            <div class="containerForALL ascendant-content">
                                <h1 class="main-title">Ascendant Report: ${data.ascendant}</h1>
                                <div class="container-ascendant">
                                    <div class="grid">
                                        <div class="card-ascendant">
                                            <span class="key">Ascendant Lord:</span> ${data.ascendant_lord}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Lord Location:</span> ${data.ascendant_lord_location}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Lord House:</span> ${data.ascendant_lord_house_location}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Verbal Location:</span> ${data.verbal_location}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Lord Strength:</span> ${data.ascendant_lord_strength}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Symbol:</span> ${data.symbol}
                                        </div>
                                        <div class="card-ascendant">
                                            <span class="key">Zodiac Characteristics:</span> ${data.zodiac_characteristics}
                                        </div>
                                    </div>

                                    <div class="section-ascendant color-ascendant">
                                        <div class="section-title-basic">General Prediction:</div>
                                        <p>${data.general_prediction}</p>
                                    </div>

                                    <div class="section-ascendant color-ascendant">
                                        <div class="section-title-basic">Personalized Prediction</div>
                                        <p>${data.personalised_prediction}</p>
                                    </div>

                                    <div class="section-ascendant">
                                        <div class="section-title-basic">Qualities</div>
                                        <div class="grid">
                                            <div class="card-ascendant">
                                                <span class="key">Flagship Traits:</span><br>
                                                ${data.flagship_qualities}
                                            </div>
                                            <div class="card-ascendant">
                                                <span class="key">Good Qualities:</span>
                                                <ul class="ascendant-ul">
                                                    ${data.good_qualities.split(',').map(item => `<li>${item.trim()}</li>`).join('')}
                                                </ul>
                                            </div>
                                            <div class="card-ascendant">
                                                <span class="key">Bad Qualities:</span>
                                                <ul class="ascendant-ul">
                                                    ${data.bad_qualities.split(',').map(item => `<li>${item.trim()}</li>`).join('')}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-ascendant">
                                        <div class="section-title-basic">Spiritual & Lucky Elements</div>
                                        <div class="grid">
                                            <div class="card-ascendant">
                                                <span class="key">Lucky Gem:</span> ${data.lucky_gem}
                                            </div>
                                            <div class="card-ascendant">
                                                <span class="key">Fasting Day:</span> ${data.day_for_fasting}
                                            </div>
                                            <div class="card-ascendant">
                                                <span class="key">Gayatri Mantra:</span>
                                                <div class="mantra-ascendant">
                                                    ${data.gayatri_mantra}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* Dosh */
            var DoshTabEle = document.getElementById('dosh-tab');

            if (DoshTabEle)
            {
                DoshTabEle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.dosh_api_charge") }}'))
                    {
                        doshTab(date, time, latitude, longitude, tz, lang, "mangal_dosh");
                    }

                    if(checkAndDeductCredits('{{ config("constants.dosh_api_charge") }}'))
                    {
                        doshTab(date, time, latitude, longitude, tz, lang, "manglik-dosh");
                    }

                    if(checkAndDeductCredits('{{ config("constants.dosh_api_charge") }}'))
                    {
                        doshTab(date, time, latitude, longitude, tz, lang, "pitra-dosh");
                    }

                    if(checkAndDeductCredits('{{ config("constants.dosh_api_charge") }}'))
                    {
                        doshTab(date, time, latitude, longitude, tz, lang, "kaalsarp-dosh");
                    }
                });
            }

            /* rudraksh_suggestion */
            var RudrakshTabEle = document.getElementById('rudraksh-tab');

            if (RudrakshTabEle)
            {
                RudrakshTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.rudraksh_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/extended_horoscope/rudraksh_suggestion?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;
                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var data = response.data.response;

                            document.querySelector(".main_preloader").style.display = "none";

                            let rudrakshaHTML = `<div class="containerForALL"><h1 class="main-title">Rudraksha Suggestion</h1><div class="rudraksha-section">`;

                            data.rudraksh.forEach((item, index) => {
                                rudrakshaHTML += `
                                <div class="rudraksha-card">
                                    <div class="rudraksha-title">${item}:</div>
                                    <div class="rudraksha-name">${data.name[index]}</div>
                                    <div class="qualities"><strong>Qualities:</strong> ${data.qualities[index]}</div>
                                    <div class="mantra">Mantra: ${data.mantra[index]}</div>
                                </div>`;
                            });

                            rudrakshaHTML += `</div>`;
                            rudrakshaHTML += `
                            <div class="how-to-section">
                                <div class="how-to-title">How to Wear</div>
                                <ul class="how-to-list">${data.how_to_wear}</ul>

                                <div class="how-to-title">Time to Wear</div>
                                <ul class="how-to-list">${data.time_to_wear}</ul>

                                <div class="purification">
                                    <strong>Purification Process:</strong><br>
                                    ${data.purification}
                                </div>
                            </div>

                            <div class="suggestion-section">
                                <span>✨ <strong>Personalized Suggestion:</strong> ${data.personalized_response}</span>
                            </div> </div>`;

                            document.querySelector('#rudraksh').innerHTML = rudrakshaHTML;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* gem_suggestion */
            var GemTabEle = document.getElementById('gem-tab');

            if (GemTabEle)
            {
                GemTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.gem_api_charge") }}'))
                    {
                        var url = `https://api.jyotishamastroapi.com/api/extended_horoscope/gem_suggestion?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;

                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var data = response.data.response;

                            document.querySelector(".main_preloader").style.display = "none";

                            document.querySelector('#gem').innerHTML = `
                            <div class="containerForALL">
                                <h1 class="main-title">Gemstone Recommendation: ${data.name} (${data.other_name})</h1>
                                <div class="gem-attr-list">
                                    <div class="gem-attr">Color: ${data.color}</div>
                                    <div class="gem-attr">Planet: ${data.planet}</div>
                                </div>
                                <div class="desc-gem">
                                    <strong>Description:</strong> ${data.description}
                                </div>
                                <div class="section-title-gem">Good Results</div>
                                <div class="pill-list-gem">${data.good_results.map(item => `<span class="pill">${item.trim()}</span>`).join('')}</div>
                                <div class="section-title-gem">Cures Diseases</div>
                                <div class="pill-list-gem">${data.diseases_cure.map(item => `<span class="pill">${item.trim()}</span>`).join('')}</div>
                                <div class="section-title-gem">How to Wear</div>
                                <table class="info-table-gem">
                                    <tr>
                                        <th>Recommended Finger</th>
                                        <td>${data.finger}</td>
                                    </tr>
                                    <tr>
                                        <th>Recommended Weight</th>
                                        <td>${data.weight}</td>
                                    </tr>
                                    <tr>
                                        <th>Day to Wear</th>
                                        <td>${data.day}</td>
                                    </tr>
                                    <tr>
                                        <th>Preferred Metal</th>
                                        <td>${data.metal}</td>
                                    </tr>
                                    <tr>
                                        <th>Time to Wear</th>
                                        <td>${data.time_to_wear_short}</td>
                                    </tr>
                                </table>
                                <div class="guide-gem">
                                    <strong>Full Wearing Guide:</strong><br>
                                    ${data.time_to_wear}
                                </div>
                                <div class="purification-gem">
                                    <strong>Purification Methods:</strong><br>
                                    ${data.methods}
                                </div>
                                <div class="mantra-gem">
                                    Mantra: ${data.mantra}
                                </div>
                                <div class="section-title-gem">Substitutes</div>
                                <div class="pill-list-gem">${data.substitute.map(item => `<span class="pill">${item.trim()}</span>`).join('')}</div>
                                <div class="section-title-gem">Do Not Wear With</div>
                                <div class="pill-list-gem">${data.not_to_wear_with.map(item => `<span class="pill">${item.trim()}</span>`).join('')}</div>
                                <div class="section-title-gem">Flawed Ruby Effects</div>
                                <div class="flaws-gem">
                                    <ul>${data.flaw_results.map(flaw => `<li><strong>${flaw.flaw_type}:</strong> ${flaw.flaw_effects}</li>`).join('')}</ul>
                                </div>
                                <div class="section-title-gem">Other Stones</div>
                                <div class="other-stones-gem">
                                    <span>Life Stone: ${data.life_stone}</span>
                                    <span>Lucky Stone: ${data.lucky_stone} Sapphire</span>
                                    <span>Fortune Stone: ${data.fortune_stone}</span>
                                </div>
                            </div>`;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }

            /* Planets_kp */
            var KpTabEle = document.getElementById('kp-tab');

            if (KpTabEle)
            {
                KpTabEle.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.bhav_chalit_chart_api_charge") }}'))
                    {
                        /* chart bhav bhav_chalit_chart */
                        var url = `https://api.jyotishamastroapi.com/api/chart_image/bhav_chalit_chart?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&style=${style}&lang=${lang}&colored_planets=true&color=%23657798`;
                
                        axios.get(url, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {
                            var imageUrl = response.data;

                            document.querySelector(".main_preloader").style.display = "none";
                            
                            document.getElementById('chart_bhav').innerHTML = `${imageUrl}`;
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                    /* kp details */

                    document.querySelector(".main_preloader").style.display = "block";

                    if(checkAndDeductCredits('{{ config("constants.kp_detail_api_charge") }}'))
                    {
                        var url_kp = `https://api.jyotishamastroapi.com/api/extended_horoscope/planets_kp?date=${date}&time=${time}&latitude=${latitude}&longitude=${longitude}&tz=${tz}&lang=${lang}`;

                        axios.get(url_kp, {
                            headers: {
                                key: "{{ $jyotisham_astro_api }}"
                            }
                        })
                        .then(response => {

                            items = Object.values(response.data.response);
                            
                            document.getElementById('planetTableBody').innerHTML = ``;
                            var tbody = document.getElementById('planetTableBody');

                            document.querySelector(".main_preloader").style.display = "none";

                            items.forEach((item) => {
                                var row = `
                                <tr>
                                    <td>${item.rasi_no ?? ''}</td>
                                    <td>${item.zodiac ?? ''}</td>
                                    <td>${item.name ?? ''}</td>
                                    <td>${item.house ?? ''}</td>
                                    <td>${item.global_degree ? Math.round(item.global_degree) : ''}</td>
                                    <td>${item.local_degree ? Math.round(item.local_degree) : ''}</td>
                                    <td>${item.pseudo_rasi_no ?? ''}</td>
                                    <td>${item.pseudo_rasi ?? ''}</td>
                                    <td>${item.pseudo_rasi_lord ?? ''}</td>
                                    <td>${item.pseudo_nakshatra ?? ''}</td>
                                    <td>${item.pseudo_nakshatra_no ?? ''}</td>
                                    <td>${item.pseudo_nakshatra_pada ?? ''}</td>
                                    <td>${item.pseudo_nakshatra_lord ?? ''}</td>
                                    <td>${item.sub_lord ?? ''}</td>
                                    <td>${item.sub_sub_lord ?? ''}</td>
                                    <td>${item.full_name ?? ''}</td>
                                </tr>
                                `;
                                tbody.insertAdjacentHTML('beforeend', row);
                            });
                        })
                        .catch(error => {
                            /* if (error.response) {
                                console.error("Server responded with error:", error.response.data);
                            } else if (error.request) {
                                console.error("No response received:", error.request);
                            } else {
                                console.error("Error setting up request:", error.message);
                            } */
                        });
                    }
                });
            }
        });

        function loadGoogleMaps(apiKey, callback) {
            const scriptId = 'google-maps-script';
            const scriptUrl = `https://maps.google.com/maps/api/js?key=${apiKey}&libraries=places`;

            /* If already loaded */
            if (window.google && window.google.maps) {
                callback();
                return;
            }

            /* If already loading, attach to existing onload */
            const existingScript = document.getElementById(scriptId);
            if (existingScript) {
                existingScript.addEventListener('load', callback);
                return;
            }

            /* Create new script */
            const script = document.createElement('script');
            script.id = scriptId;
            script.src = scriptUrl;
            script.async = true;
            script.defer = true;

            script.onload = callback;
            script.onerror = () => console.error('Failed to load Google Maps script');

            document.head.appendChild(script);
        }

        loadGoogleMaps("{{ env('Google_Map_API_Key') }}", () => {
            initialize();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabButtons = document.querySelectorAll(".kundali-sub-tab-button");
            const tabContents = document.querySelectorAll(".kundali-sub-tab-content");

            tabButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const targetTab = button.getAttribute("data-tab");

                    tabButtons.forEach((btn) => btn.classList.remove("active"));
                    tabContents.forEach((content) => content.classList.remove("active"));

                    button.classList.add("active");
                    document.getElementById(targetTab).classList.add("active");
                });
            });
        });

        document.querySelector('.login-modal-kundali-close-btn').addEventListener('click', function(e) {
            const login_modal_kundali = document.getElementById("login_modal_kundali");
            login_modal_kundali.classList.remove("show");
            login_modal_kundali.classList.add('hidden');
            document.body.classList.remove('login_modal_kundali_show');
        });
    </script>
</div>
