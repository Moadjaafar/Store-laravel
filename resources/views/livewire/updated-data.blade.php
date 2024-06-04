<div class="offCanvas__minicart">
    <div class="minicart__header ">
        <div class="minicart__header--top d-flex justify-content-between align-items-center">
            <h3 class="minicart__title"> Shopping Cart</h3>
            <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <p class="minicart__header--desc">The Beauty and Cosmetic products are limited</p>
    </div>
    <div class="minicart__product">
        @foreach ($carts_products as $item)
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html"><img src="{{ asset($item->Product_Image) }}" alt="prduct-img"></a>
                </div>
                <div class="minicart__text">
                    <h4 class="minicart__subtitle"><a href="product-details.html">{{$item->Product_name}}</a></h4>
                    <span class="color__variant"><b>Color:</b> Beige</span>
                    <div class="minicart__price">
                        <span class="minicart__current--price">{{$item->Price}} DH</span>
                        <span class="minicart__old--price">{{$item->Price_befor_Discount}} DH</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        
                        <button class="minicart__product--remove" type="button" wire:click="DeleteItem({{ $item->id }})">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="minicart__amount">
        @php
            $totalPrice = App\Models\carts_products::sum('Totale_Price');
        @endphp
        <div class="minicart__amount_list d-flex justify-content-between">
            <span>Total:</span>
            <span><b>{{$totalPrice}} DH</b></span>
        </div>
    </div>
    <div class="minicart__conditions text-center">
        <input class="minicart__conditions--input" id="accept" type="checkbox">
        <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
    </div>
    <div class="minicart__button d-flex justify-content-center">
        <a class="primary__btn minicart__button--link" href="{{route('Cart_list')}}">View cart</a>
        <a class="primary__btn minicart__button--link" href="{{route('Get_order_form')}}">Checkout</a>
    </div>
</div>
