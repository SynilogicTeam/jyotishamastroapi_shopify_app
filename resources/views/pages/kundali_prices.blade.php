@extends('layouts.default')

@section('content')
    <div id="root">
        <div class="Polaris-Page">
            <div class="Polaris-Box"
                style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-600);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-600);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);position:relative">
                <div class="Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                    <div class="Polaris-Page-Header__Row">
                        <div class="Polaris-Page-Header__TitleWrapper">
                            <div class="Polaris-Header-Title__TitleWrapper">
                                <h1 class="Polaris-Header-Title">
                                    <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Kundali Prices</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Polaris-Layout">
                <div class="Polaris-Layout__Section">
                    <div class="Polaris-LegacyCard">
                        <div class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding Polaris-LegacyCard__FirstSectionPadding">
                            <form action="{{ url('/save-kundali-prices') }}" method="POST">
                                @csrf
                                <div class="Polaris-BlockStack" style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400)">

                                    {{-- Small Kundali Price --}}
                                    <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <div class="">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id=":R2q6:Label" for=":R2q6:" class="Polaris-Label__Text">
                                                        <span class="Polaris-Text--root Polaris-Text--bodyMd">Small Kundali Price</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected">
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField">
                                                        <input id=":R2q6:" autocomplete="off"
                                                            class="Polaris-TextField__Input" type="text"
                                                            aria-labelledby=":R2q6:Label" aria-invalid="false"
                                                            data-1p-ignore="true" data-lpignore="true"
                                                            data-form-type="other" value="{{ $settings['small_kundali_price'] ?? '' }}" name="small_kundali_price">
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Medium Kundali Price --}}
                                    <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <div class="">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id=":R2cc4:Label" for=":R2cc4:" class="Polaris-Label__Text">
                                                        <span class="Polaris-Text--root Polaris-Text--bodyMd">Medium Kundali Price</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected">
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField">
                                                        <input id=":R2cc4:" autocomplete="off"
                                                            class="Polaris-TextField__Input" type="text"
                                                            aria-labelledby=":R2cc4:Label" aria-invalid="false"
                                                            data-1p-ignore="true" data-lpignore="true"
                                                            data-form-type="other" value="{{ $settings['medium_kundali_price'] ?? '' }}" name="medium_kundali_price">
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Large Kundali Price --}}
                                    <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <div class="">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id=":R2bb6:Label" for=":R2bb6:" class="Polaris-Label__Text">
                                                        <span class="Polaris-Text--root Polaris-Text--bodyMd">Large Kundali Price</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected">
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField">
                                                        <input id=":R2bb6:" autocomplete="off"
                                                            class="Polaris-TextField__Input" type="text"
                                                            aria-labelledby=":R2bb6:Label" aria-invalid="false"
                                                            data-1p-ignore="true" data-lpignore="true"
                                                            data-form-type="other" value="{{ $settings['large_kundali_price'] ?? '' }}" name="large_kundali_price">
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Kundali Match Price --}}
                                    <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <div class="">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id=":R2uu5:Label" for=":R2uu5:" class="Polaris-Label__Text">
                                                        <span class="Polaris-Text--root Polaris-Text--bodyMd">Kundali Match Price</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected">
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField">
                                                        <input id=":R2uu5:" autocomplete="off"
                                                            class="Polaris-TextField__Input" type="text"
                                                            aria-labelledby=":R2uu5:Label" aria-invalid="false"
                                                            data-1p-ignore="true" data-lpignore="true"
                                                            data-form-type="other" value="{{ $settings['kundali_match_price'] ?? '' }}" name="kundali_match_price">
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Save Button --}}
                                    <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <button type="submit" class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter">
                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Save Prices</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("form").on("submit", async function(event)
        {
            event.preventDefault();
            window.flashNotice("Updating... Please wait...");

				const token = await window.shopify.idToken();
          var xhr = new XMLHttpRequest();
                xhr.open(this.method, this.action);
                xhr.setRequestHeader('Authorization', "Bearer " + token);
                xhr.onload = function() {
                    
                    if (xhr.status >= 200 && xhr.status < 300)
                    {
                        window.flashNotice("Setting Updated Successfully!");
                    }
                    else
                    {
                        window.flashError("Something went wrong...")
                    }
                };
                
                xhr.onerror = function() {
                    window.flashError('Network error occurred');
                };
                
                xhr.send(new FormData(this));
           
        });
    </script>
@endsection
