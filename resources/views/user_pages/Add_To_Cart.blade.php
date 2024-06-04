@extends('user_pages.layouts.Home_page')
@section('content')
<div class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb section -->

<!-- cart section start -->
<section class="cart__section section--padding">
    <div class="container-fluid">
        <div class="cart__section--inner">
            <form action="#"> 
                <h2 class="cart__title mb-35">Shopping Cart</h2>
                <div class="row">
                    <div class="col-">
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list">Quantity</th>
                                        <th class="cart__table--header__list">Totale</th>

                                    </tr>
                                </thead>
                                
                                @livewire('add-to-cart-product-list')

                            </table> 
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="{{route('user_pages.home')}}">Continue shopping</a>
                                <a class="continue__shopping--clear" href="{{route('Clear_Cart')}}">Clear Cart</a>
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </form> 
        </div>
    </div>     
</section>

@livewire('updated-data')

@endsection