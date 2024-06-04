<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\carts_products;
use Illuminate\Support\Facades\Session;

class CartNbr extends Component
{

    public $nbr_cart = 0;

    protected $listeners = ['cartItemAdded' => 'myFunction'];

    public function render()
    {
        $sessionId = Session::getId();
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $this->nbr_cart = carts_products::where('user_id', $user_id)->count();
        }else{
            $this->nbr_cart =carts_products::where('session_ID', $sessionId)->count();
        }
        
        return view('livewire.cart-nbr');
    }
    public function myFunction(){
        $sessionId = Session::getId();
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $this->nbr_cart = carts_products::where('user_id', $user_id)->count();
        }else{
            $this->nbr_cart =carts_products::where('session_ID', $sessionId)->count();
        }

    }
}
