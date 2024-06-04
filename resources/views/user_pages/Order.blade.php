@extends('user_pages.layouts.Home_page')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start checkout page area -->
    <div class="checkout__page--area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="main checkout__mian">
                        <form action="{{route('Order')}}" method="POST" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="checkout__content--step section__shipping--address">
                                <div class="checkout__section--header mb-25">
                                    <h2 class="checkout__header--title h3">Client Details</h2>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list ">
                                                <label class="checkout__input--label mb-10" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="Fist_Name" placeholder="First name (optional)" id="input1"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input2">Last Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="Last_Name" placeholder="Last name" id="input2"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Phone number<span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="Phone_number" placeholder="Phone (optional)" id="input3" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Email <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="Email" placeholder="Email (optional)" id="input3" type="email">
                                            </div>
                                            <div class="checkout__checkbox">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label" for="check1">
                                                    Email me with news and offers</label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="Address" placeholder="Address1" id="input4" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input5">City <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" name="City" placeholder="City" id="input5" type="text">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label" for="checkbox2">
                                        Save this information for next time</label>
                                </div>
                            </div>
                            <div class="order-notes mb-20">
                                <label class="checkout__input--label mb-10" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                               <textarea class="checkout__notes--textarea__field border-radius-5" name="Order_Notes" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                            </div>
                            
                            <button class="checkout__now--btn primary__btn" type="submit">ORDER NOW</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                    @foreach ($Products as $item)
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    @php
                                                        $nbrQnt = App\Models\carts_products::where('product_id', $item->id)->value('Quantity');
                                                        $totale_price = App\Models\carts_products::where('product_id', $item->id)->value('Totale_Price');
                                                    @endphp
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="{{ asset($item->Product_Image) }}" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">{{$nbrQnt}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="product-details.html">{{$item->Product_name}}</a></h4>
                                                        <span class="product__description--variant">COLOR: Blue</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{$totale_price}} DH</span>
                                            </td>
                                        </tr>
                
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Shipping</td>
                                        <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                        @php
                                            $totalPrice = App\Models\carts_products::sum('Totale_Price');
                                        @endphp
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{$totalPrice}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment__history mb-30">
                            <h3 class="payment__history--title mb-20">Payment</h3>
                            <ul class="payment__history--inner d-flex">
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Payment en delevery</button></li>
                            </ul>
                        </div>
                        <a class="checkout__now--btn primary__btn" href="{{route('Cart_list')}}">Update Cart</a>
                    </aside>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End checkout page area -->

</main>
@livewire('updated-data')

@endsection