@extends('layouts.list')

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
                                        <span class="Polaris-Text--root Polaris-Text--headingLg Polaris-Text--bold">Kundali
                                            Payments</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Polaris-Page">
                <div class="Polaris-LegacyCard">
                    <div class="Polaris-IndexTable">
                        <div class="Polaris-IndexTable__IndexTableWrapper">
                            <div class="Polaris-IndexTable-ScrollContainer">
                                <table id="payments_list"
                                    class="Polaris-IndexTable__Table Polaris-IndexTable__Table--unselectable Polaris-IndexTable__Table--sticky">
                                    <thead>
                                        <tr>
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Customer
                                                        ID</span>
                                                </div>
                                            </th>
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Order
                                                        ID</span>
                                                </div>
                                            </th>
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Payment
                                                        Type</span>
                                                </div>
                                            </th>
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Amount</span>
                                                </div>
                                            </th>
                                            
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Date</span>
                                                </div>
                                            </th>
                                            
                                            <th class="Polaris-IndexTable__TableHeading Polaris-IndexTable__TableHeading--unselectable"
                                                data-index-table-heading="true">
                                                <div style="--pc-index-table-heading-extra-padding-right:0" class="">
                                                    <span
                                                        class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">
                                                        Download PDF </span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr
                                                class="Polaris-IndexTable__TableRow Polaris-IndexTable__TableRow--unclickable">

                                                <td class="Polaris-IndexTable__TableCell"> <a
                                                        href="https://admin.shopify.com/store/{{ session('shop_name') }}/customers/{{ $payment['customer_id'] }}"
                                                        target="_blank"
                                                        class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPlain Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"><span
                                                            style="display: flex;align-items: center;gap: 3px; justify-content: center;"
                                                            class="Polaris-Text--root Polaris-Text--bodyMd Polaris-Text--regular">{{ $payment['customer_id'] }}<svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                style="width:20px; height:20px;" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M11.75 4.5a.75.75 0 0 0 0 1.5h1.19l-2.72 2.72a.75.75 0 1 0 1.06 1.06l2.72-2.72v1.19a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-.75-.75h-3Z" />
                                                                <path
                                                                    d="M15 11.25a.75.75 0 0 0-1.5 0v1c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5c0-.69.56-1.25 1.25-1.25h1a.75.75 0 0 0 0-1.5h-1a2.75 2.75 0 0 0-2.75 2.75v4.5a2.75 2.75 0 0 0 2.75 2.75h4.5a2.75 2.75 0 0 0 2.75-2.75v-1Z" />
                                                            </svg></span></a> </td>

                                                <td class="Polaris-IndexTable__TableCell"> <a
                                                        href="https://admin.shopify.com/store/{{ session('shop_name') }}/orders/{{ $payment['order_id'] }}"
                                                        target="_blank"
                                                        class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPlain Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"
                                                        class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPlain Polaris-Button--sizeMedium Polaris-Button--textAlignCenter"><span
                                                            style="display: flex;align-items: center;gap: 3px; justify-content: center;"
                                                            class="Polaris-Text--root Polaris-Text--bodyMd Polaris-Text--regular">{{ $payment['order_id'] }}<svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                style="width:20px; height:20px;" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M11.75 4.5a.75.75 0 0 0 0 1.5h1.19l-2.72 2.72a.75.75 0 1 0 1.06 1.06l2.72-2.72v1.19a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-.75-.75h-3Z" />
                                                                <path
                                                                    d="M15 11.25a.75.75 0 0 0-1.5 0v1c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5c0-.69.56-1.25 1.25-1.25h1a.75.75 0 0 0 0-1.5h-1a2.75 2.75 0 0 0-2.75 2.75v4.5a2.75 2.75 0 0 0 2.75 2.75h4.5a2.75 2.75 0 0 0 2.75-2.75v-1Z" />
                                                            </svg></span></a> </td>

                                                <td class="Polaris-IndexTable__TableCell">
                                                    {{ $payment['kundali_type'] == 'kundali' ? 'Kundali' : 'Kundali Matching' }}
                                                </td>

                                                <td class="Polaris-IndexTable__TableCell">
                                                    <span class="Polaris-Text--numeric">
                                                        <?php
                                                            $amount = str_replace('{{amount}}', $payment['price'], $currency_format);
                                                            echo html_entity_decode($amount);
                                                        ?>

                                                    </span>
                                                </td>

                                                <td class="Polaris-IndexTable__TableCell">
                                                    <span class="Polaris-Text--numeric">
                                                        {{ \Carbon\Carbon::parse($payment['created_at'])->timezone('UTC')->format('d M Y, h:i A') }} (UTC)
                                                    </span>
                                                </td>

                                                <td class="Polaris-IndexTable__TableCell">
                                                    
                                                    @if (empty($payment['pdf_link']))
                                                        <a href="{{ url('regenerate-pdf?id='.$payment['id']) }}" class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter">
                                                            <span class="Polaris-Text--root Polaris-Text--bodySm Polaris-Text--medium">Regenerate PDF</span>
                                                            <span class="Polaris-Button__Icon">
                                                            <span class="Polaris-Icon">
                                                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                                <path d="M3.5 9.25a.75.75 0 0 0 1.5 0 3 3 0 0 1 3-3h6.566l-1.123 1.248a.75.75 0 1 0 1.114 1.004l2.25-2.5a.75.75 0 0 0-.027-1.032l-2.25-2.25a.75.75 0 1 0-1.06 1.06l.97.97h-6.44a4.5 4.5 0 0 0-4.5 4.5Z"/>
                                                                <path d="M16.5 10.75a.75.75 0 0 0-1.5 0 3 3 0 0 1-3 3h-6.566l1.123-1.248a.75.75 0 1 0-1.114-1.004l-2.25 2.5a.75.75 0 0 0 .027 1.032l2.25 2.25a.75.75 0 0 0 1.06-1.06l-.97-.97h6.44a4.5 4.5 0 0 0 4.5-4.5Z"/>
                                                                </svg>
                                                            </span>
                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="{{ $payment['pdf_link'] }}" target="_blank"
                                                            class="Polaris-Button Polaris-Button--pressable Polaris-Button--variantPrimary Polaris-Button--sizeMedium Polaris-Button--textAlignCenter">
                                                            View <svg xmlns="http://www.w3.org/2000/svg"
                                                                style="width:20px; height:20px;" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M11.75 4.5a.75.75 0 0 0 0 1.5h1.19l-2.72 2.72a.75.75 0 1 0 1.06 1.06l2.72-2.72v1.19a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-.75-.75h-3Z" />
                                                                <path
                                                                    d="M15 11.25a.75.75 0 0 0-1.5 0v1c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5c0-.69.56-1.25 1.25-1.25h1a.75.75 0 0 0 0-1.5h-1a2.75 2.75 0 0 0-2.75 2.75v4.5a2.75 2.75 0 0 0 2.75 2.75h4.5a2.75 2.75 0 0 0 2.75-2.75v-1Z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="Polaris-IndexTable__ScrollBarContainer Polaris-IndexTable--scrollBarContainerHidden">
                                <div class="Polaris-IndexTable__ScrollBar"
                                    style="--pc-index-table-scroll-bar-content-width: 816px;">
                                    <div class="Polaris-IndexTable__ScrollBarContent">
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
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('#payments_list');
            if (table) {
                new DataTable(table, {
                    order: [],
                    language: {
                        emptyTable: `
                    
                            <div class="Polaris-Box"
                                style="--pc-box-padding-block-start-xs:var(--p-space-500);--pc-box-padding-block-end-xs:var(--p-space-1600);--pc-box-padding-inline-start-xs:var(--p-space-0);--pc-box-padding-inline-end-xs:var(--p-space-0)">
                                <div class="Polaris-BlockStack"
                                    style="--pc-block-stack-inline-align:center;--pc-block-stack-order:column">
                                    <div class="Polaris-EmptyState__ImageContainer">
                                        <img alt=""
                                            src="https://cdn.shopify.com/s/files/1/0262/4071/2726/files/emptystate-files.png"
                                            class="Polaris-EmptyState__Image Polaris-EmptyState--loaded"
                                            role="presentation">
                                        <div
                                            class="Polaris-EmptyState__SkeletonImage Polaris-EmptyState--loaded">
                                        </div>
                                    </div>
                                    <div class="Polaris-Box" style="--pc-box-max-width:400px">
                                        <div class="Polaris-BlockStack"
                                            style="--pc-block-stack-inline-align:center;--pc-block-stack-order:column">
                                            <div class="Polaris-Box"
                                                style="--pc-box-padding-block-end-xs:var(--p-space-400)">
                                                <div class="Polaris-Box"
                                                    style="--pc-box-padding-block-end-xs:var(--p-space-150)">
                                                    <p
                                                        class="Polaris-Text--root Polaris-Text--headingMd Polaris-Text--block Polaris-Text--center">
                                                        No Payment Records Found</p>
                                                </div>
                                            </div>
                                            <div class="Polaris-InlineStack"
                                                style="--pc-inline-stack-align:center;--pc-inline-stack-wrap:wrap;--pc-inline-stack-gap-xs:var(--p-space-200);--pc-inline-stack-flex-direction-xs:row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                              
                        `
                    }
                });
            }
        });



        var CURRENT_URL = "{{ url('/kundalis') }}";
    </script>
@endsection
