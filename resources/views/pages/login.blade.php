@extends('layouts.default')

@section('content')

    
    
   
    {{-- Default Skeleton --}}

    <div class="Polaris-Page">
        <div class="Polaris-Box"
            style="--pc-box-padding-block-start-xs:var(--p-space-400);--pc-box-padding-block-start-md:var(--p-space-500);--pc-box-padding-block-end-xs:var(--p-space-400);--pc-box-padding-block-end-md:var(--p-space-500);--pc-box-padding-inline-start-xs:var(--p-space-400);--pc-box-padding-inline-start-sm:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-400);--pc-box-padding-inline-end-sm:var(--p-space-0);--pc-box-width:100%">
            <div class="Polaris-InlineStack"
                style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:wrap;--pc-inline-stack-gap-xs:var(--p-space-400);--pc-inline-stack-flex-direction-xs:row">
                <div class="Polaris-InlineStack"
                    style="--pc-inline-stack-wrap:wrap;--pc-inline-stack-gap-xs:var(--p-space-400);--pc-inline-stack-flex-direction-xs:row">
                    <div class="Polaris-Box"
                        style="--pc-box-padding-block-start-xs:var(--p-space-100);--pc-box-padding-block-end-xs:var(--p-space-100)">
                        <div class="Polaris-SkeletonPage__SkeletonTitle">
                            <div class="Polaris-Box"
                                style="--pc-box-background:var(--p-color-bg-fill-tertiary);--pc-box-border-radius:var(--p-border-radius-100);--pc-box-min-height:28px;--pc-box-min-width:120px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Box" id="SkeletonPage-PrimaryAction"
                    style="--pc-box-background:var(--p-color-bg-fill-tertiary);--pc-box-border-radius:var(--p-border-radius-100);--pc-box-min-height:2.25rem;--pc-box-min-width:6.25rem">
                </div>
            </div>
        </div>
        <div class="Polaris-Layout">
            
            <div class="Polaris-Layout__Section">
                <div class="Polaris-LegacyCard">
                    <div
                        class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding Polaris-LegacyCard__LastSectionPadding">
                        <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer">
                            <div class="Polaris-SkeletonBodyText">
                            </div>
                            <div class="Polaris-SkeletonBodyText">
                            </div>
                            <div class="Polaris-SkeletonBodyText">
                            </div>
                        </div>
                    </div>
                    <div id="setup-guide-beginners"
                        style="transition-duration:500ms;max-height:none;overflow:visible;display:block;"
                        class="Polaris-Collapsible" aria-hidden="true">
                        <hr class="Polaris-Divider"
                            style="border-block-start: var(--p-border-width-025) solid var(--p-color-border-secondary);">
                        <div
                            class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding Polaris-LegacyCard__FirstSectionPadding">
                            <div class="Polaris-BlockStack"
                                style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-200);--pc-block-stack-gap-sm:var(--p-space-200)">
                                <div class="Polaris-Box">
                                    <ul class="quick-setupitem guide-beginners Polaris-BlockStack Polaris-BlockStack--listReset"
                                        style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-100)"
                                        role="menu">
                                        <li class="Polaris-Box" role="presentation">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-300);--pc-inline-stack-flex-direction-xs:row">
                                                <div
                                                    class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                </div>
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 100px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="quick-content">
                                                <div class="Polaris-BlockStack"
                                                    style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-300)">
                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer">
                                                        <div class="Polaris-SkeletonBodyText">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="Polaris-Box" role="presentation">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-300);--pc-inline-stack-flex-direction-xs:row">
                                                <div
                                                    class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                </div>
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 100px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="Polaris-Box" role="presentation">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-300);--pc-inline-stack-flex-direction-xs:row">
                                                <div
                                                    class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                </div>
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 100px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="Polaris-Box" role="presentation">
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-300);--pc-inline-stack-flex-direction-xs:row">
                                                <div
                                                    class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                </div>
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 100px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="Polaris-Layout__Section" style="margin-bottom: 20px;">
                <div class="Polaris-LegacyCard">
                    <div class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                        <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer" style="width: 50px;">
                            <div class="Polaris-SkeletonBodyText"> </div>
                        </div>
                    </div>
                    <div
                        class="Polaris-LegacyCard__Section Polaris-LegacyCard__FirstSectionPadding Polaris-LegacyCard__LastSectionPadding">
                        {{-- Analytics Content --}}
                        <div id="analytics-content" class="Polaris-BlockStack"
                            style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-400);">
                            <div class="Polaris-Grid">
                                {{-- Section 1 (Labels) --}}
                                <div
                                    class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_2ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">

                                    {{-- Skeleton Loader --}}
                                    <div class="skeleton-loader">
                                        <div class="Polaris-LegacyCard">
                                            <div
                                                class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 50px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                                <div class="Polaris-BlockStack"
                                                    style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-500)">
                                                    <div class="Polaris-Box">
                                                        <ul class="Polaris-BlockStack Polaris-BlockStack--listReset"
                                                            style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-200)"
                                                            role="menu">
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 70px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 100px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 150px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 180px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Section 2 Products --}}
                                <div
                                    class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_2ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">

                                    {{-- Skeleton Loader --}}
                                    <div class="skeleton-loader">
                                        <div class="Polaris-LegacyCard">
                                            <div
                                                class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 50px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                                <div class="Polaris-BlockStack"
                                                    style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-500)">
                                                    <div class="Polaris-Box">
                                                        <ul class="Polaris-BlockStack Polaris-BlockStack--listReset"
                                                            style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-200)"
                                                            role="menu">
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 70px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 100px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 150px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 180px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Section 3 (Automation) --}}
                                <div
                                    class="Polaris-Grid-Cell Polaris-Grid-Cell--cell_6ColumnXs Polaris-Grid-Cell--cell_3ColumnSm Polaris-Grid-Cell--cell_3ColumnMd Polaris-Grid-Cell--cell_2ColumnLg Polaris-Grid-Cell--cell_4ColumnXl">

                                    {{-- Skeleton Loader --}}
                                    <div class="skeleton-loader">
                                        <div class="Polaris-LegacyCard">
                                            <div
                                                class="Polaris-LegacyCard__Header Polaris-LegacyCard__FirstSectionPadding">
                                                <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                    style="width: 50px;">
                                                    <div class="Polaris-SkeletonBodyText">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="Polaris-LegacyCard__Section Polaris-LegacyCard__LastSectionPadding">
                                                <div class="Polaris-BlockStack"
                                                    style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-500)">
                                                    <div class="Polaris-Box">
                                                        <ul class="Polaris-BlockStack Polaris-BlockStack--listReset"
                                                            style="--pc-block-stack-order:column;--pc-block-stack-gap-xs:var(--p-space-200)"
                                                            role="menu">
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 70px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 100px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 150px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="Polaris-Box" role="presentation">
                                                                <div class="Polaris-InlineStack"
                                                                    style="--pc-inline-stack-align:space-between;--pc-inline-stack-block-align:center;--pc-inline-stack-wrap:nowrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                                                    <div class="Polaris-SkeletonBodyText__SkeletonBodyTextContainer"
                                                                        style="width: 180px;">
                                                                        <div class="Polaris-SkeletonBodyText">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeExtraSmall">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
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

        </div>
    </div>
@endsection
