@extends('frontend.layout.layout')

@section('addition_style')
<style>
    .title1 {
        text-transform: uppercase;
    }

    .header {
        padding: 45px 0px 15px;
    }

    #pricelist_content tr td:nth-child(1) {
        text-transform: uppercase;
    }

    .box17-info .title16 {
        text-transform: uppercase;
    }

    .auth_a {
        width: auto;
    }

    .aligner .cart {
        margin: 0 auto;
    }

    .aligner {
        align-items: center;
        justify-content: center;
    }

    .auth_a .icon-in-item {
        margin: 1px -10px 0 0;
    }

    .auth_a a {
        color: #fff;
        display: flex;
        margin-left: 20px;
    }

    .pagination {
        margin: 0 auto;
        white-space: nowrap;
    }

    .pagination li.page-item {
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 32px;
        font-size: 18px;
        text-align: center;
        background: #b8bfc6;
        color: #2d2d2d;
        margin: 0 5px;
        border-radius: 4px;
    }

    .pagination li.page-item.active {
        background: #000000;
        color: #b8bfc6;
    }

    .pagination li.page-item a {
        display: block;
        width: 32px;
        height: 32px;
        line-height: 32px;
        font-size: 18px;
        text-align: center;
        background: #b8bfc6;
        color: #2d2d2d;
        border-radius: 4px;
    }

    .icon-in-item.user {
        background: url({{asset('img/profile.png')}}) no-repeat top center;
        height: 15px;
        margin-left: 7px;
    }

    .icon-in {
        width: auto;
    }

    .icon-in a {
        margin-right: 20px;
        color: #fff;
    }

    .icon-in-item.chat {
        background: url({{asset('img/bubbles.png')}}) no-repeat center center;
    }

    .icon-in-item.top_cart {
        background: url({{asset('img/cart.png')}}) no-repeat center center;
    }

    .quantity-external {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #b8bfc6;
        height: 8px;
        z-index: 15;
    }

    .quantity-inner {
        background: #03a8ed;
        height: 8px;
    }

    .quantity-inner.quantity_max {
        width: 100%;
    }

    .quantity-inner.quantity_avg {
        width: 70%;
    }

    .quantity-inner.quantity_low {
        width: 30%;
    }

    .quantity-inner.quantity_none {
        width: 0%;
    }

    div.quantity_max {
        background-color: rgba(123, 193, 159, 0.7);
    }

    div.quantity_avg {
        background-color: rgba(193, 164, 123, 0.5);
    }

    div.quantity_low {
        background-color: rgba(245, 22, 50, 0.3);
    }

    div.quantity_none {
        background-color: rgba(245, 22, 50, 0.7);
        pointer-events: none;
    }

    span.quantity_max {
        color: rgba(123, 193, 159, 1);
    }

    span.quantity_avg {
        color: rgba(193, 164, 123, 1);
    }

    span.quantity_low {
        color: #e8a3ad;
    }

    span.quantity_none {
        color: rgba(245, 22, 50, 1);
    }

    tr.quantity_none .cart,
    tr.quantity_none .cart-trigger {
        opacity: 0.5;
        pointer-events: none;
    }

    #overlay {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(0, 0, 0, 0.7);
        display: none;
    }

    .box6-in {
        background-image: none !important;
    }

    .mobile_only {
        display: none;
    }

    .cart-button.price {
        padding-right: 40px;
        background-image: url({{asset('img/cart_dark.png')}}) !important;
        background-position: center right 10px !important;
        background-repeat: no-repeat !important;
        white-space: nowrap !important;
        width: auto;
    }

    .cart-button.price:hover {
        background-image: url({{asset('img/cart.png')}}) !important;
    }

    .quantity-external {
        height: 18px;
        line-height: 18px;
        background: #fff;
    }

    .quantity-inner-wrapper {
        height: 18px;
        line-height: 18px;
        position: relative;
    }

    .quantity_inner_wrap {
        height: 18px;
        line-height: 18px;
        position: relative;
        z-index: 10;
        width: 100%;
        z-index: 10;
        opacity: 0.4;
    }

    .quantity_inner_fill {
        height: 18px;
        line-height: 18px;
        position: relative;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 11;
    }

    .quantity_title {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 18px;
        text-align: center;
        line-height: 18px;
        color: #fff;
        z-index: 12;
        font-size: 12px;
    }

    .quantity_max .quantity_inner_wrap,
    .quantity_max .quantity_inner_fill {
        background-color: #7bc19f !important;
    }

    .quantity_avg .quantity_inner_wrap,
    .quantity_avg .quantity_inner_fill {
        background-color: #c1a47b !important;
    }

    .quantity_low .quantity_inner_wrap,
    .quantity_low .quantity_inner_fill,
    .quantity_none .quantity_inner_wrap,
    .quantity_none .quantity_inner_fill {
        background-color: #f51632 !important;
    }

    @media (max-width: 650px) {
        .content-1 {
            z-index: 20;
        }
    }

    .box2.border1 .box2-in {
        align-items: stretch;
    }

    .box2-in-item {
        padding: 25px 15px 25px 15px !important;
    }

    .quantity-external3 {
        bottom: 0px;
    }

    .quantity-external2 {
        bottom: 18px;
    }

    .quantity-external1 {
        bottom: 36px;
    }

    .cart-button.price {
        width: 100%;
    }

    .cart-button.price .wh_label {
        display: block;
        float: left;
        font-size: 12px;
    }

    .cart-button.price .price_label {
        display: block;
        float: right;
    }


    .user-dashboard-menu .box-item4 {
        margin: 0 0px 10px 0px !important;
        font-size: 15px !important;
        border-bottom: 0;
        line-height: 16px;
    }
</style>
    <style>

    .inner-table {
        border-collapse: collapse;
    }

    .inner-table tr:hover td {
        background: #323232;
    }

    .box14.border1 table {
        min-width: 100%;
    }

    .td:nth-child(4) {
        padding-right: 15px;
        display: table-cell !important;
    }

    .tr:hover {
        background: rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
    }

    .tr:first-child:hover {
        background: rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
    }

    .minus2 {
        background: url({{asset('img/cart-minus3.png')}}) no-repeat center center;
    }

    .plus2 {
        background: url({{asset('img/cart-plus3.png')}}) no-repeat center center;
    }

    .sum2 input {
        color: #fff;
    }

    .td:nth-child(4),
    .td:nth-child(5),
    .td-title:nth-child(4),
    .td-title:nth-child(5) {
        width: 15% !important;
    }

    .td:nth-child(1),
    .td:nth-child(2),
    .td:nth-child(3),
    .td-title:nth-child(1),
    .td-title:nth-child(2),
    .td-title:nth-child(3) {
        width: 25% !important;
    }

    .td:nth-child(7),
    .td-title:nth-child(7) {
        width: 20px !important;
        padding-right: 20px !important;
    }

    .td-title:nth-child(6),
    .td:nth-child(6) {
        width: 70px !important;
        padding-right: 0px;
    }

    .mobile-only-price {
        display: none;
    }

    .mobile-only {
        display: none;
    }

    .data_trigger {
        color: #b8bfc6;
    }

    @media (max-width: 1100px) {
        .td-title:nth-child(7),
        .td:nth-child(7) {
            display: table-cell !important;
        }

        .td:nth-child(5),
        .td:nth-child(2),
        .td:nth-child(3),
        .td-title:nth-child(5),
        .td-title:nth-child(2),
        .td-title:nth-child(3) {
            display: none;
        }

        .td:nth-child(1),
        .td-title:nth-child(1) {
            width: 70% !important;
        }

        .td:nth-child(4),
        .td-title:nth-child(4) {
            width: 20% !important;
            text-align: center;
        }

        .mobile-only-price {
            /*display: block;*/
            font-size: 10px;
        }

        .mobile-only {
            display: block;
        }

        tr.tr.active td {
            border-bottom: none;
        }

        tr.tr.active + tr.mobile-only {
            display: table-row;
        }

        .data_trigger {
        / / color: #089dea;
        }

        a.quantity_max {
            color: #7bc19f;
        }

        a.quantity_avg {
            color: #c1a47b;
        }

        a.quantity_low {
            color: #f51632;
        }

        .headtext {
            padding: 0 20px 0px 30px !important;
        }
    }

    .borderer td {
        border-top: 1px solid #9a9a9a;
        border-bottom: 1px solid #9a9a9a;
    }

    .headtext {
        margin: 0 60px 0px 60px;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.15);;
    }

    .headtext p {
        color: #fff;
        line-height: 22px;
        padding-bottom: 10px;
    }

    .headtext strong {
        font-family: 'SourceSansPro-Bold', sans-serif;
        font-size: 20px;
    }
</style>
<style>
    .personal_area {
        text-shadow: 2px 2px 2px #059dea;
        font-size: 18px !important;
    }
    .currency_select {
    font-size: 14px !important;
    height: 24px !important;
    padding: 0px 15px 0 10px !important;
}
</style>
@endsection

@section('content')
            
<div class="section1 border1">
    <div class="wrap5">
        <div class="title6">News</div>
        <div class="box13">
               @foreach ($news as $item)
               <div class="box13-in">
                <div class="box13-in-item1">
                    <div class="data3">{{$item->Date}}</div>
                </div>
                <div class="box13-in-item2">
                    <div class="text2">
                        {!!$item->content!!}
                    </div>
                </div>
            </div>
               @endforeach
                        </div>
    </div>
</div>
@endsection