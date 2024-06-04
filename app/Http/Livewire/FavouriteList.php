<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\carts_products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Favourit_Product;

class FavouriteList extends Component
{
    public $favourit_product;

    public function render()
    {
        $this->favourit_product = $this->cart_items();
        return view('livewire.favourite-list');
    }

    public function cart_items(){
        $testAuth=Auth::check();
        if($testAuth){
            $user_id=Auth::id();
            $FavProductIds = Favourit_Product::where('user_id', $user_id)->pluck('product_id')->toArray();
            $fav_products = Product::whereIn('id', $FavProductIds)->get();
        }else{
            $Session_ID= Session::getId();
            $FavProductIds = Favourit_Product::where('session_ID', $Session_ID)->pluck('product_id')->toArray();
            $fav_products = Product::whereIn('id', $FavProductIds)->get(); 
        }
        return $fav_products;
    }
    public function DeleteItem($id){
        $id = (int)$id;
        $product = Product::find($id); 

        if (!$product) {
            return;
        }
        DB::table('favourit__products')->where('product_id', $id)->delete();
        return $this->cart_items();
    }
}
