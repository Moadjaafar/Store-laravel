<tbody class="cart__table--body">
    @foreach ($Products as $item)
        <tr class="cart__table--body__items">
            <td class="cart__table--body__list">
                <div class="cart__product d-flex align-items-center">
                    <button class="cart__remove--btn" aria-label="search button" type="button" wire:click="DeleteItem({{ $item->id }})">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                    </button>
                    <div class="cart__thumbnail">
                        <a href="product-details.html"><img class="border-radius-5" src="{{ asset($item->Product_Image) }}" alt="cart-product"></a>
                    </div>
                    <div class="cart__content">
                        <h3 class="cart__content--title h4"><a href="product-details.html">{{$item->Product_name}}</a></h3>
                        <span class="cart__content--variant">COLOR: Blue</span>
                        <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                    </div>
                </div>
            </td>
            <td class="cart__table--body__list">
                <span class="cart__price">{{$item->Price}} DH</span>
            </td>
            <td class="cart__table--body__list">
                <div class="quantity__box">
                    <button type="button" wire:click="decreasequntitiy({{ $item->id }})" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                    <label>
                        @php
                            $quantity = App\Models\carts_products::where('product_id', $item->id)->value('Quantity');
                        @endphp
                        <input type="number" class="quantity__number quickview__value--number" value="{{$quantity}}" data-counter />
                    </label>
                    <button type="button" wire:click="increasequntitiy({{ $item->id }})" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                </div>
            </td>
            <td class="cart__table--body__list">
                @php
                    $totale_price = App\Models\carts_products::where('product_id', $item->id)->value('Totale_Price');
                @endphp
                <span class="cart__price end">{{$totale_price}} DH</span>
            </td>
        </tr>
    @endforeach 
</tbody>
