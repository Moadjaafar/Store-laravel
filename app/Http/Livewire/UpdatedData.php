<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\carts_products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UpdatedData extends Component
{
    
    
    public $carts_products;
    protected $listeners = ['cartItemAdded' => 'cart_items'];
  
    public function render()
    {
        
        $this->carts_products = $this->cart_items();
        return view('livewire.updated-data');
       
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
    // public function myFunction()
    // {
    //     $testAuth=Auth::check();
    //     if($testAuth){
    //         $user_id=Auth::id();
    //         $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
    //         $this->carts_products = Product::whereIn('id', $cartProductIds)->get();
    //     }else{
    //         $Session_ID= Session::getId();
    //         $cartProductIds = carts_products::where('session_ID', $Session_ID)->pluck('product_id')->toArray();
    //         $this->carts_products = Product::whereIn('id', $cartProductIds)->get(); 
    //     }
       
    // }
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
