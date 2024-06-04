<tbody class="cart__table--body">
    @foreach ($favourit_product as $item)
        <tr class="cart__table--body__items">
            <td class="cart__table--body__list">
                <div class="cart__product d-flex align-items-center">
                    <button class="cart__remove--btn" aria-label="search button" wire:click="DeleteItem({{ $item->id }})" type="button">
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
            <td class="cart__table--body__list text-center">
                <span class="in__stock text__secondary">in stock</span>
            </td>
            <td class="cart__table--body__list text-right">
                @livewire('add-to-cart-btn',['product_id' => $item->id])
            </td>
        </tr>
    @endforeach
</tbody>
