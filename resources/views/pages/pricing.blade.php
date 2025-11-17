@extends('layouts.default')

@section('content')
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
                                        <span
                                            class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Pricing</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Polaris-Tabs__Outer ai-polaris-tab-filter">
                    <div class="Polaris-Box"
                        style="--pc-box-padding-block-start-md:var(--p-space-200);--pc-box-padding-block-end-md:var(--p-space-200);--pc-box-padding-inline-start-md:var(--p-space-200);--pc-box-padding-inline-end-md:var(--p-space-200)">
                        <div class="Polaris-Tabs__Wrapper">
                            <div class="Polaris-Tabs__ButtonWrapper" style="justify-content: center">
                                <ul class="Polaris-Tabs" data-tabs-focus-catchment="true" role="tablist"
                                    style="justify-content: center">

                                    {{-- Monthly --}}

                                    <li class="Polaris-Tabs__TabContainer" role="presentation">
                                        <button id="all-customers-1"
                                            class="Polaris-Tabs__Tab tab_wrap_btn monthly {{ $plan_id == 1 || $plan_id == 2 || $plan_id == 3 ? 'Polaris-Tabs__Tab--active' : '' }}"
                                            aria-label="All customers" role="tab" type="button"
                                            aria-controls="all-customers-content-1" tabindex="0" aria-selected="true">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-align: center; --pc-inline-stack-block-align: center; --pc-inline-stack-wrap: nowrap; --pc-inline-stack-gap-xs: var(--p-space-200); --pc-inline-stack-flex-direction-xs: row;">
                                                <span class="Polaris-Text--root Polaris-Text--headingSm">Monthly</span>
                                            </div>
                                        </button>
                                    </li>

                                    {{-- Yearly --}}

                                    <li class="Polaris-Tabs__TabContainer" role="presentation">
                                        <button id="accepts-marketing-1"
                                            class="Polaris-Tabs__Tab tab_wrap_btn yearly {{ $plan_id == 5 || $plan_id == 6 ? 'Polaris-Tabs__Tab--active' : '' }}"
                                            role="tab" type="button" aria-controls="accepts-marketing-content-1"
                                            tabindex="-1" aria-selected="false">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-align: center; --pc-inline-stack-block-align: center; --pc-inline-stack-wrap: nowrap; --pc-inline-stack-gap-xs: var(--p-space-200); --pc-inline-stack-flex-direction-xs: row;">
                                                <span class="Polaris-Text--root Polaris-Text--headingSm">Yearly</span>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="Polaris-Grid zend_gap monthly-plan {{ $plan_id == 1 || $plan_id == 2 || $plan_id == 3 ? '' : 'd-none' }}">

                    {{-- Free Plan 1 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_1') }}</h3>

                                            @if ($plan_id == 1)
                                                <p>
                                                    <span class="Polaris-Badge Polaris-Badge--toneSuccess">
                                                        <span class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span>
                                                        <span class="Polaris-Text--root Polaris-Text--bodySm">Active</span>
                                                    </span>
                                                </p>
                                            @else
                                                <p>Free Forever</p>
                                            @endif
                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                          <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_1_Credits')?> API Credits</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Customer Support</p>
                                                </div>
                                            </li>
                                            
                                        </ul>

                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_1') }} <span class="plan-price-sub-text">
                                                    /Month
                                                </span></h3>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 1 ? 'javascript:void(0);' : url('plan/1/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 1 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 1 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Plan 2 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXll">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_2') }}</h3>

                                            @if ($plan_id == 2)
                                                <p>
                                                    <span class="Polaris-Badge Polaris-Badge--toneSuccess">
                                                        <span class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span>
                                                        <span class="Polaris-Text--root Polaris-Text--bodySm">Active</span>
                                                    </span>
                                                </p>
                                            @else
                                                <p>Free Plan Included</p>
                                            @endif
                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                          <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_2_Credits')?> API Credits</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Priority Customer Support</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_2') }} <span class="plan-price-sub-text">
                                                    /Month
                                                </span></h3>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 2 ? 'javascript:void(0);' : url('plan/2/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 2 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 2 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Plan 3 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_3') }}</h3>

                                            @if ($plan_id == 3)
                                                <p>
                                                    <span class="Polaris-Badge Polaris-Badge--toneSuccess">
                                                        <span class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span>
                                                        <span class="Polaris-Text--root Polaris-Text--bodySm">Active</span>
                                                    </span>
                                                </p>
                                            @else
                                                <p>Free Plan Included</p>
                                            @endif
                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                           <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_3_Credits')?> API Credits</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Priority Customer Support</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_3') }} <span class="plan-price-sub-text">
                                                    /Month
                                                </span></h3>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 3 ? 'javascript:void(0);' : url('plan/3/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 3 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 3 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="Polaris-Grid zend_gap yearly-plan {{ $plan_id == 5 || $plan_id == 6 ? '' : 'd-none' }}">

                    {{-- Free Plan 1 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_1') }}</h3>

                                            @if ($plan_id == 1)
                                                <p><span class="Polaris-Badge Polaris-Badge--toneSuccess"><span
                                                            class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span><span
                                                            class="Polaris-Text--root Polaris-Text--bodySm">Active</span></span>
                                                </p>
                                            @else
                                                <p>Free Forever</p>
                                            @endif
                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                           <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_1_Credits')?> API Credits</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Customer Support</p>
                                                </div>
                                            </li>
                                           
                                        </ul>

                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_1') }} <span class="plan-price-sub-text">
                                                    /Month
                                                </span></h3>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 1 ? 'javascript:void(0);' : url('plan/1/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 1 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 1 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Plan 5 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_5') }}</h3>

                                            @if ($plan_id == 5)
                                                <p>
                                                    <span class="Polaris-Badge Polaris-Badge--toneSuccess">
                                                        <span class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span>
                                                        <span class="Polaris-Text--root Polaris-Text--bodySm">Active</span>
                                                    </span>
                                                </p>
                                            @else
                                                <p>Free Plan Included</p>
                                            @endif

                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                          	<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_5_Credits')?> API Credits<span class="plan-price-sub-text">
                                                    /Month
                                                </span></p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Priority Customer Support</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_5') }} <span class="plan-price-sub-text">
                                                    /Yearly
                                                </span></h3>
                                        </div>
                                        <div class="zend__price-bottom-box">
                                          <span>Save 16 %</span>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 5 ? 'javascript:void(0);' : url('plan/5/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 5 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 5 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Plan 6 --}}

                    <div
                        class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_4ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">
                        <div class="Polaris-ShadowBevel"
                            style="--pc-shadow-bevel-z-index: 32; --pc-shadow-bevel-box-shadow-xs: var(--p-shadow-100); --pc-shadow-bevel-border-radius-xs: var(--p-border-radius-300);">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-surface);--pc-box-min-height:100%;--pc-box-overflow-x:clip;--pc-box-overflow-y:clip;">
                                <div class="zend__price-item-box">
                                    <div class="zend__price-item-box-inner">
                                        <div class="zend__price-top-box plan-price-box">
                                            <h3 class="Polaris-DisplayText Polaris-Text--heading2xl ">
                                                {{ env('Plan_Name_6') }}</h3>

                                            @if ($plan_id == 6)
                                                <p><span class="Polaris-Badge Polaris-Badge--toneSuccess"><span
                                                            class="Polaris-Text--root Polaris-Text--visuallyHidden">Success</span><span
                                                            class="Polaris-Text--root Polaris-Text--bodySm">Active</span></span>
                                                </p>
                                            @else
                                                <p>Free Plan Included</p>
                                            @endif
                                        </div>
                                        <ul class="plan-benifits currentPlan">
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Kundali</p>
                                                </div>
                                            </li>--}}
                                           <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p><?=env('Plan_6_Credits')?> API Credits<span class="plan-price-sub-text">
                                                    /Month
                                                </span></p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Basic Panchang</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Match Making (Basic)</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Horoscope Charts</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Multi Languages</p>
                                                </div>
                                            </li>
                                            {{--<li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Kundali Matching Payout</p>
                                                </div>
                                            </li>
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box" style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>View Panchang Widget</p>
                                                </div>
                                            </li>--}}
                                            <li class="plan-benifits-item">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-color:var(--p-color-text-subdued)">
                                                    <p>Priority Customer Support</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="zend__price-bottom-box plan-price-box">
                                            <h3 class="Polaris-Heading plan-price Polaris-Text--heading2xl">
                                                ${{ env('Plan_Price_6') }} <span class="plan-price-sub-text">
                                                    /Yearly
                                                </span></h3>
                                        </div>
                                      	<div class="zend__price-bottom-box">
                                          <span>Save 17 %</span>
                                        </div>
                                        <div class="plan-select-btn">
                                            <a href="javascript:void(0);"
                                                onclick="window.top.location.href='{{ $plan_id == 6 ? 'javascript:void(0);' : url('plan/6/' . session('shop_id')) . '?host=' . session('host') }}'"
                                                class="Polaris-Button Polaris-Button--pressable {{ $plan_id == 6 ? 'Polaris-Button--variantPrimary' : 'Polaris-Button--variantSecondary' }} Polaris-Button--sizeLarge Polaris-Button--textAlignCenter active-plan-button"
                                                type="button">
                                                <span class="Polaris-Button__Content">
                                                    <span
                                                        class="Polaris-Button__Text Polaris-Text--bodyMd">{{ $plan_id == 6 ? 'Active' : 'Activate Now' }}</span>
                                                </span>
                                            </a>
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
        document.querySelector(".tab_wrap_btn.monthly").addEventListener("click", function() {
            this.classList.add("Polaris-Tabs__Tab--active");
            document.querySelector(".tab_wrap_btn.yearly").classList.remove("Polaris-Tabs__Tab--active");
            document.querySelector(".monthly-plan").classList.remove("d-none");
            document.querySelector(".yearly-plan").classList.add("d-none");
        });

        document.querySelector(".tab_wrap_btn.yearly").addEventListener("click", function() {
            this.classList.add("Polaris-Tabs__Tab--active");
            document.querySelector(".tab_wrap_btn.monthly").classList.remove("Polaris-Tabs__Tab--active");
            document.querySelector(".yearly-plan").classList.remove("d-none");
            document.querySelector(".monthly-plan").classList.add("d-none");
        });
    </script>
@endsection
