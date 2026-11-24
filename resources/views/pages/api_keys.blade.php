@extends('layouts.default')

@section('content')

    @if(env('AdminShop') == session('shop_name'))

        <div id="root">
            <div class="container" style="padding-top:var(--p-space-8);">
                <div class="Polaris-Page">

                    <div class="Polaris-Box"
                        style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-600);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-600);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);position:relative">
                        <div class="Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                            <div class="Polaris-Page-Header__Row">
                                <div class="Polaris-Page-Header__TitleWrapper">
                                    <div class="Polaris-Header-Title__TitleWrapper">
                                        {{-- <h1 class="Polaris-Header-Title">
                                            <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Jyotisham Astro API</span>
                                        </h1> --}}

                                        {{--<div class="Polaris-BlockStack" style="display: flex; justify-content: center; align-items: center;">
                                            <img src="https://www.jyotishamastroapi.com/backend/uploads/setting/34526.webp" alt="" style="width: 250px">
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                   
        {{-- <div class="Polaris-Layout">
                <div class="Polaris-Layout__Section">
                    <div class="Polaris-LegacyCard">
                        <div class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding Polaris-LegacyCard__FirstSectionPadding">
                            <form action="{{ url('/save-api-keys') }}" method="POST">
                                @csrf
                                <div class="Polaris-BlockStack" style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400)"> --}}

                                    {{-- Small Kundali Price --}}
                                   {{-- <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <div class="">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id=":R2q6:Label" for=":R2q6:" class="Polaris-Label__Text">
                                                        <span class="Polaris-Text--root Polaris-Text--bodyMd">Don't have an API Key, <a href="https://www.jyotishamastroapi.com/front/pricing" target="_blank">Generate Keys</a> now.</span>
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
                                                            data-form-type="other" value="{{ $jyotisham_astro_api ?? '' }}" name="jyotisham_astro_api" required>
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- Save Button --}}
                                    {{--<div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                        <button type="submit" class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter">
                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Save API Key</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

                    {{-- Account Details --}}

                    <div class="Polaris-Box"
                        style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-600);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-600);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);position:relative">
                        <div class="Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                            <div class="Polaris-Page-Header__Row">
                                <div class="Polaris-Page-Header__TitleWrapper">
                                    <div class="Polaris-Header-Title__TitleWrapper">
                                        <h1 class="Polaris-Header-Title">
                                            <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Remaining API Call Limits </span>
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
                                    <div class="Polaris-BlockStack" style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400)">
                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">Remaining Calls: {{ $api_records['callsRemaining'] ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">PDF Large: {{ $api_records['pdfLarge'] ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">PDF Medium: {{ $api_records['pdfMedium'] ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">PDF Small: {{ $api_records['pdfSmall'] ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">PDF Matching: {{ $api_records['pdfMatching'] ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            Turbolinks.visit("{{ url('api-keys') }}");
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

    @else

        <div id="root">
            <div class="container" style="padding-top:var(--p-space-8);">
                <div class="Polaris-Page">

                    <div class="Polaris-Box"
                        style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-600);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-600);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);position:relative">
                        <div class="Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                            <div class="Polaris-Page-Header__Row">
                                <div class="Polaris-Page-Header__TitleWrapper">
                                    <div class="Polaris-Header-Title__TitleWrapper">
                                        <h1 class="Polaris-Header-Title">
                                            <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Remaining Credits </span>
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
                                    <div class="Polaris-BlockStack" style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400)">
                                        
                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">Plan Name: {{ env('Plan_Name_'.session('plan_id')) ?? 'Free' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">Plan Credits: {{ env('Plan_'.session('plan_id').'_Credits') ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">Remaining Credits: {{ $plan_credits ?? 0 }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Polaris-FormLayout__Item Polaris-FormLayout--grouped">
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <h3 class="Polaris-Text--headingMd Polaris-Text--medium">Used Credits: {{ number_format((env('Plan_'.session('plan_id').'_Credits') - $plan_credits), 1) ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
