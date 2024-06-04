<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourit_Product;
use Illuminate\Support\Facades\Session;

class ToastrNotification extends Component
{
    public $product_id=0;
    public $isClicked = false;

    public function render()
    {
        return view('livewire.toastr-notification');
    }
    public function notification()
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
            $sessionId = Session::getId();
            $Ifexist = Favourit_Product::where('session_ID', $sessionId)->where('product_id', $this->product_id)->exists();
            if($Ifexist){
                
            }else{
                Favourit_Product::insert([
                    'session_ID'=>$sessionId,
                    'product_id'=>$this->product_id
                ]);
            };
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Product added successfully to your favorites');

        }
        
        $this->isClicked=true;

    }
}
