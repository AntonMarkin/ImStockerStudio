@extends('layouts.main_layout')

@section('content')
<div class="nav_prices">
    <a href="/" class="nav-link_prices">{{__('breadcrumbs.mainPage')}}</a> <span>&gt;</span>
</div>
<div class="index-appBlock-prices">
    <div class="layout-center">
        <div class="main-section_prices">
            <h1 class="page-heading">{{__('prices.pageHeader')}}</h1>
            <div class="content-box-prices-page">
                <div class="prices_page_pro-version-pic">

                    <!--/payment/features_compare.tpl -->
                </div>
                <div class="prices-types">
                    <div class="prices-types-child-one">

                        <div class="child-one-sale">
                            <img src="{{'storage/images/yellow-lent.png'}}" alt="">
                            <p>{{__('prices.saveRibbon')}} {{$productPlans['ims_studio_pro_1y']['discount']}}</p>
                        </div>

                        <div class="child-one-content">
                            <div class="child-one-content-heading">{{__('prices.planTitles[ims_studio_pro_1y]')}}</div>
                            <div class="price">
                                <div class="price-box">
                                    <div class="price-box-heading">
                                        price: {{$productPlans['ims_studio_pro_1y'].price_product_plan}}
                                        <span>+ {{__('prices.priceTax')}}*</span>
                                    </div>
                                    <p class="price-box-text">{{__('prices.priceAlts[ims_studio_pro_1y]')}}</p>
                                </div>
                            </div>
                            <div class="other-prices one">
                                <p>≈ price: {{$productPlans['ims_studio_pro_1y'].price_product_plan / $productPlans['ims_studio_pro_1y'].months_num}} / {{__('prices.perMonth')}}</p>
                            </div>
                            <a target="_blank" class="buy-btn first-btn" >{{__('prices.buyButton')}}</a>
                        </div>
                    </div>
                    <div class="prices-types-child-two">
                        <div class="prices-types-child-two-content">
                            <div class="child-two-content-heading">{{__('prices.planTitles[ims_studio_pro_3m]')}}</div>
                            <div class="child-two-content">
                                <div class="price-box-heading">
                                    price: {{$productPlans['ims_studio_pro_3m'].price_product_plan}}
                                    <span>+ {{__('prices.priceTax')}}*</span>
                                </div>
                                <p class="price-box-text">{{__('prices.priceAlts[ims_studio_pro_3m]')}}</p>
                            </div>
                            <div class="other-prices">
                                <p>≈ price: {{$productPlans['ims_studio_pro_3m'].price_product_plan / $product_plans['ims_studio_pro_3m'].months_num}} / {{__('prices.perMonth')}}</p>
                            </div>
                            <a  target="_blank" class="buy-btn second-btn" >{{__('prices.buyButton')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="taxes-text">* {{__('prices.taxNote')}}</div>
        </div>
    </div>
</div>
@endsection
