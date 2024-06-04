<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\carts_products;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class AddToCart extends Component
{

    public $product_id=0;
    
    public function render()
    {  
        return view('livewire.add-to-cart');
    }
    public function AddToCart()
    {
        $total_price=Product::where('id',$this->product_id)->value('Price');
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $Ifexist = carts_products::where('user_id', $user_id)->where('product_id', $this->product_id)->exists();
            if($Ifexist){
                
            }else{
                carts_products::insert([
                    'user_id'=>$user_id,
                    'product_id'=>$this->product_id,
                    'Totale_Price'=>$total_price
                ]);
                $this->emit('cartItemAdded');

            };

            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Product added successfully to your Cart');

        }else{
            $sessionId = Session::getId();
            carts_products::insert([
                'session_ID'=>$sessionId,
                'product_id'=>$this->product_id,
                'Totale_Price'=>$total_price
            ]);
            $this->emit('cartItemAdded');
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Product added successfully to your Cart');

        }


    }
    
}
