<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Product;
use App\Models\carts_products;
use App\Models\Favourit_Product;
use App\Models\Product_for_order;
use App\Models\Order_Info;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class HomeController extends Controller
{
    public function Index(){

        $categorys=Categories::all();
        $Products=Product::latest()->take(8)->get();
        $testAuth=Auth::check();
        $carts_products=$this->cart_items();
        return view('user_pages.home',compact('categorys','Products','carts_products'));
    }
    public function Product_Details_Form($id){
        $carts_products=$this->cart_items();
        $latestProducts = Product::orderBy('created_at', 'desc')->take(4)->get();
        $Products=Product::findOrFail($id);
        return view('user_pages.Product_Details',compact('latestProducts','Products','carts_products'));
    }

    public function Get_Product_List(){
        $carts_products=$this->cart_items();
        $categorys=Categories::all();
        $Products=Product::paginate(8);
        return view('user_pages.Product_list',compact('Products','carts_products','categorys'));
    }
    public function Get_Product_List_by_latest(){
        $carts_products=$this->cart_items();
        $categorys=Categories::all();
        $Products=Product::latest()->paginate(8);
        return view('user_pages.Product_list',compact('Products','carts_products','categorys'));
    }
    public function Get_Product_List_by_oldest(){
        $carts_products=$this->cart_items();
        $categorys=Categories::all();
        $Products=Product::oldest()->paginate(8);
        return view('user_pages.Product_list',compact('Products','carts_products','categorys'));
    }

    public function Add_toCart_from(){
        $Products = $this->cart_items();
        $carts_products=$this->cart_items();

        return view('user_pages.Add_To_Cart',compact('Products','carts_products')); 
    }
    public function Favourit_product_form(Request $request){
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $favourit_productID = Favourit_Product::where('user_id', $user_id)->pluck('product_id')->toArray();
            $favourit_product = Product::whereIn('id', $favourit_productID)->get();
            return view('user_pages.favourit_product',compact('favourit_product'));

        }else{
            $sessionId = Session::getId();
            $favourit_productID = Favourit_Product::where('session_ID', $sessionId)->pluck('product_id')->toArray();
            $favourit_product = Product::whereIn('id', $favourit_productID)->get();
            return view('user_pages.favourit_product',compact('favourit_product'));
        }
    }
    public function Get_order_form(Request $request){
        $user_id=Auth::id();
        $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
        $Products = Product::whereIn('id', $cartProductIds)->get();
        return view('user_pages.Order',compact('Products'));

    }
    public function Get_order_form_byitNow($id){
        $id = (int)$id;
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();
            $Ifexist = carts_products::where('user_id', $user_id)->where('product_id', $id)->exists();
            if($Ifexist){
                
            }else{
                carts_products::insert([
                    'user_id'=>$user_id,
                    'product_id'=>$id
                ]);
            };
            $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
            $Products = Product::whereIn('id', $cartProductIds)->get();

            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Product added successfully to your Cart');

        }else{
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('You need to login first');

        }
        $Products=$this->cart_items();
        return view('user_pages.Order',compact('Products'));

    }
    public function Order(Request $request){
        $testlogin=Auth::check();
        if($testlogin){
            $user_id=Auth::id();

            $Order=Order_Info::create([
                'user_id'=>$user_id,
                'Fist_Name'=>$request->Fist_Name,
                'Last_Name'=>$request->Last_Name,
                'Phone_number'=>$request->Phone_number,
                'Email'=>$request->Email,
                'Address'=>$request->Address,
                'City'=>$request->City,
                'Order_Notes'=>$request->Order_Notes
            ]);

            $cartProductIds = carts_products::where('user_id', $user_id)->get();

            foreach ($cartProductIds as $product){
                Product_for_order::create([
                    'user_id'=>$user_id,
                    'product_id'=>$product->product_id,
                    'Order_Info_Id'=>$Order->id,
                    'Quantity'=>$product->Quantity,
                    'TotalPrice'=>$product->Totale_Price
                ]);
            }
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Your order has been created successfully');

        }else{
            notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Sorry !!!!, You need to login first');

        }

        $categorys=Categories::all();
        $Products=Product::all();
        $user_id=Auth::id();

        $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
        $carts_products = Product::whereIn('id', $cartProductIds)->get();
        return redirect()->route('user_pages.home',compact('categorys','Products','carts_products'));

    }
    public function Search_by_categoys($categoryID){
        $user_id=Auth::id();
        $cartProductIds = carts_products::where('user_id', $user_id)->pluck('product_id')->toArray();
        $carts_products = Product::whereIn('id', $cartProductIds)->get();
        $Products=Product::where('category_id', $categoryID)->paginate(8);
        $categorys=Categories::all();
        return view('user_pages.Product_list',compact('Products','carts_products','categorys'));
    }

    public function Filter_listProduct(Request $request){
        $query = Product::query();

        if ($request->has('lower_price')&&$request->has('highe_price')) {
            if ($request->lower_price!=0&&$request->highe_price!=0) {
                $query->whereBetween('Price', [$request->lower_price, $request->highe_price]);
            }
        }
        if ($request->has('Product_category')) {
            if ($request->Product_category!='All') {
                $query->where('category_id' , $request->Product_category);
            }
        }
        $Products = $query->paginate(8);
        
        $carts_products=$this->cart_items();
        $categorys=Categories::all();

        return view('user_pages.Product_list',compact('Products','carts_products','categorys'));
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
    public function Clear_Cart(){
        $testAuth=Auth::check();
        if($testAuth){
            $user_id=Auth::id();
            $cartProductIds = carts_products::where('user_id', $user_id)->delete();
        }else{
            $Session_ID= Session::getId();
            $cartProductIds = carts_products::where('session_ID', $Session_ID)->delete();
        }
        $categorys=Categories::all();
        $Products=Product::latest()->take(8)->get();
        $testAuth=Auth::check();
        $carts_products=$this->cart_items();
        return redirect()->route('user_pages.home',compact('categorys','Products','carts_products'));
    }
    
}
