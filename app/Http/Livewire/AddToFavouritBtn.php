<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourit_Product;

class AddToFavouritBtn extends Component
{
    public $product_id=0;
    public $isClicked = false;

    public function render()
    {
        return view('livewire.add-to-favourit-btn');
    }
    public function Add_to_favourit()
    {
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $Ifexist = Favourit_Product::where('user_id', $user_id)->where('product_id', $this->product_id)->exists();
            if($Ifexist){
                
            }else{
                Favourit_Product::insert([
                    'user_id'=>$user_id,
                    'product_id'=>$this->product_id
                ]);
            };
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Product added successfully to your favorites');

        }else{
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('You need to login first');

        }
        $this->isClicked=true;
        

    }
}
