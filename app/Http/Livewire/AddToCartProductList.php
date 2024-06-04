<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\carts_products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddToCartProductList extends Component 
{
    public $Products;
    public function render()
    {
        $this->Products = $this->cart_items();
        return view('livewire.add-to-cart-product-list');
    }

    public function cart_items(){
        $testAuth=Auth::check();
        if($testAuth){
            $user_id=Auth::id();
            $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
            $carts_products = Product::whereIn('id', $cartProductIds)->get();
        }else{
            $Session_ID= Session::getId();
            $cartProductIds = carts_products::where('session_ID', $Session_ID)->pluck('product_id')->toArray();
            $carts_products = Product::whereIn('id', $cartProductIds)->get(); 
        }
        return $carts_products;
    }
    public function increasequntitiy($id){
        $id = (int)$id;
        $product = Product::find($id); 

        if (!$product) {
            return;
        }
        
        DB::table('carts_products')->where('product_id', $id)->increment('Quantity', 1);

        $quantity = DB::table('carts_products')->where('product_id', $id)->value('Quantity');
        $totalPrice = $quantity * $product->Price;

        DB::table('carts_products')->where('product_id', $id)->update([
            'Totale_Price' => $totalPrice
        ]);
    }
    public function decreasequntitiy($id){
        $id = (int)$id;
        $product = Product::find($id); 

        if (!$product) {
            return;
        }
        $quantity = DB::table('carts_products')->where('product_id', $id)->value('Quantity');
        if ($quantity != 1) {
            DB::table('carts_products')->where('product_id', $id)->decrement('Quantity', 1);
        }
        $quantity = DB::table('carts_products')->where('product_id', $id)->value('Quantity');
        $totalPrice = $quantity * $product->Price;

        DB::table('carts_products')->where('product_id', $id)->update([
            'Totale_Price' => $totalPrice
        ]);
    }
    public function DeleteItem($id){
        $id = (int)$id;
        $product = Product::find($id); 

        if (!$product) {
            return;
        }
        DB::table('carts_products')->where('product_id', $id)->delete();
        return $this->cart_items();
    }
}
