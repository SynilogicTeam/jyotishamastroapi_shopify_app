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
                                    <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">
                                        💼 No Coding Needed – Quick Setup
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Header-Title__SubTitle">
                    <p class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--subdued">
                        🛍️ Start earning more from your store today – with just one powerful astrology app!</p>
                </div>
            </div>

            <div class="Polaris-Page--fullWidth">
                <div class="Polaris-Page__Content">
                    <div class="Polaris-Grid">
                        <div
                            class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_4ColumnSm Polaris-Grid-Cell--cell_4ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                            <div class="Polaris-LegacyCard">
                                <div class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">🔮 Step 1: Show Kundali Widgets</h2>
                                </div>
                                <div class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                    <p>🧿 Display Kundali, Matchmaking, and Panchang widgets directly on your store — attract attention and add value for your customers instantly.</p>
                                    
                                    <div class="Polaris-CalloutCard__Buttons">
                                        <a class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"
                                            href="https://admin.shopify.com/store/{{session('shop_name')}}/themes" target="_blank" data-polaris-unstyled="true">
                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Open Customizer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_4ColumnSm Polaris-Grid-Cell--cell_4ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                            <div class="Polaris-LegacyCard">
                                <div class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">💰 Step 2: Set Your Kundali Pricing</h2>
                                </div>
                                <div class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                    <p>⚙️ Customize prices for small, medium, or large Kundali PDFs — start earning with every order placed.</p>

                                    <div class="Polaris-CalloutCard__Buttons">
                                        <a class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"
                                            href="{{ url('kundali-prices') }}" data-polaris-unstyled="true">
                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Set Kundali Price</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_4ColumnSm Polaris-Grid-Cell--cell_4ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                            <div class="Polaris-LegacyCard">
                                <div class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">🔑 Step 3: Set Your API Key</h2>
                                </div>
                                <div class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                    <p>🔐 Add your API key to unlock all Kundali features and start offering professional astrology services.</p>
                                    <div class="Polaris-CalloutCard__Buttons">
                                        <a class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"
                                            href="{{ url('api-keys') }}" data-polaris-unstyled="true">
                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Set API Key</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="Polaris-Box"
                style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-600);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-600);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);position:relative">
                <div class="Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                    <div class="Polaris-Page-Header__Row">
                        <div class="Polaris-Page-Header__TitleWrapper">
                            <div class="Polaris-Header-Title__TitleWrapper">
                                <h1 class="Polaris-Header-Title">
                                    <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">
                                        💸 Turn Astrology into Income with the Kundali App!
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Header-Title__SubTitle">
                    <p class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--subdued">
                        Monetize your store by offering high-demand astrology services! With the Kundali App, you can
                        generate steady revenue while providing valuable tools to your customers:</p>
                </div>
            </div>

            {{-- Generate Kundalis --}}
            <div class="Polaris-LegacyCard">
                <div class="Polaris-CalloutCard__Container">
                    <div
                        class="Polaris-LegacyCard__Section Polaris-LegacyCard__FirstSectionPadding Polaris-LegacyCard__LastSectionPadding">
                        <div class="Polaris-CalloutCard">
                            <div class="Polaris-CalloutCard__Content">
                                <div class="Polaris-CalloutCard__Title">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">🔮 Sell Digital Kundalis</h2>
                                </div>
                                <span class="Polaris-Text--root Polaris-Text--bodyMd">
                                    <div class="Polaris-BlockStack" style="--pc-block-stack-order:column">
                                        <p>Let your customers generate their personalized Kundali instantly. Charge based on
                                            PDF size – Small, Medium, or Large – and start earning from every download.</p>
                                    </div>
                                </span>
                            </div>
                            <img alt="Kundali" src="{{ url('/img/kundali.png')}}" class="Polaris-CalloutCard__Image">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Match Kundalis --}}
            <div class="Polaris-LegacyCard">
                <div class="Polaris-CalloutCard__Container">
                    <div
                        class="Polaris-LegacyCard__Section Polaris-LegacyCard__FirstSectionPadding Polaris-LegacyCard__LastSectionPadding">
                        <div class="Polaris-CalloutCard">
                            <div class="Polaris-CalloutCard__Content">
                                <div class="Polaris-CalloutCard__Title">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">💑 Offer Paid Kundali Matching
                                    </h2>
                                </div>
                                <span class="Polaris-Text--root Polaris-Text--bodyMd">
                                    <div class="Polaris-BlockStack" style="--pc-block-stack-order:column">
                                        <p>Add a premium Kundali Matching feature to your store. Customers pay a fee to
                                            generate a beautifully designed compatibility report PDF — perfect for weddings
                                            and match-making.</p>
                                    </div>
                                </span>
                            </div>
                            <img alt="Kundali Matching" src="{{ url('/img/matching.png')}}" class="Polaris-CalloutCard__Image">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Display Daily Panchang --}}
            <div class="Polaris-LegacyCard" style="margin-bottom: 30px;">
                <div class="Polaris-CalloutCard__Container">
                    <div
                        class="Polaris-LegacyCard__Section Polaris-LegacyCard__FirstSectionPadding Polaris-LegacyCard__LastSectionPadding">
                        <div class="Polaris-CalloutCard">
                            <div class="Polaris-CalloutCard__Content">
                                <div class="Polaris-CalloutCard__Title">
                                    <h2 class="Polaris-Text--root Polaris-Text--headingSm">📅 Engage with Panchang Widget
                                    </h2>
                                </div>
                                <span class="Polaris-Text--root Polaris-Text--bodyMd">
                                    <div class="Polaris-BlockStack" style="--pc-block-stack-order:column">
                                        <p>Boost user retention by displaying the daily Panchang on your store. It keeps
                                            your visitors coming back, increasing engagement and potential sales.</p>
                                    </div>
                                </span>
                            </div>
                            <img alt="Panchang" src="{{ url('/img/panchang.png')}}" class="Polaris-CalloutCard__Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
