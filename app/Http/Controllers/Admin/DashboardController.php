<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Order_Info;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('Admin.Dashboard');
    }

    public function AllCategory(){
        $category=Categories::all();

        return view('Admin.AllCategory',compact('category'));
    }

    public function AddCategory(){
        return view('Admin.AddCategory');
    }

    public function create_category(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
            'category_img'=>'required|image|mimes:jpg,png,gif,jpeg|max:2048'
        ]);

        $image = $request->file('category_img');
        $imageName = hexdec(uniqid()).'.'.time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('category_img'), $imageName);
        $img_url='category_img/'.$imageName;

        Categories::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$img_url,
        ]);
        return redirect()->route('Admin.AllCategory')->with('message','Category added successfully');
    }
    public function Update_category($id){
        $category_info=Categories::findOrFail($id);
        return view('Admin.UpdateCategory',compact('category_info'));
    }

    public function Update_category_data(Request $request){
        $category_id=$request->category_id;

        $request->validate([
            'category_name'=>'required'
        ]);
        if($request->hasFile('category_img')){
            
            $request->validate([
                'category_img'=>'required|image|mimes:jpg,png,gif,jpeg|max:2048'
            ]);
            $image = $request->file('category_img');
            $imageName = hexdec(uniqid()).'.'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('category_img'), $imageName);
            $img_url='category_img/'.$imageName;
        }else{
            $img_url=Categories::where('id',$request->category_id)->value('category_img');
        }

        Categories::findOrFail($category_id)->update([
            'category_name'=>$request->category_name,
            'category_img'=>$img_url,
        ]);

        return redirect()->route('Admin.AllCategory')->with('message','Category Updated successfully');
    }

    public function Delete_category($id){
        Categories::findOrFail($id)->delete();
        return redirect()->route('Admin.AllCategory')->with('message','Category Deleted successfully');
    }


    public function AddProduct(){
        $categories=Categories::latest()->get();
        return view('Admin.AddProduct',compact('categories'));
    }
    public function Store_product_data(Request $request){
        $request->validate([
            'Product_name'=>'required',
            'Product_short_description'=>'required',
            'Product_long_description'=>'required',
            'category_id'=>'required',
            'Price'=>'required',
            'Quantity'=>'required',
            'Product_Image'=>'required|image|mimes:jpg,png,gif,jpeg|max:2048'
        ]);

        $category_name=Categories::where('id',$request->category_id)->value('category_name');

        $image = $request->file('Product_Image');
        $imageName = hexdec(uniqid()).'.'.time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Product_image'), $imageName);
        $img_url='Product_image/'.$imageName;
        $Discount=rand(10, 30);
        $originalPrice=$request->Price;
        $discountedPrice = $originalPrice + ($originalPrice * ($Discount / 100));

        Product::create([
            'Product_name'=>$request->Product_name,
            'category_name'=>$category_name,
            'category_id'=>$request->category_id,
            'Product_short_description'=>$request->Product_short_description,
            'Product_long_description'=>$request->Product_long_description,
            'Price'=>$originalPrice,
            'Quantity'=>$request->Quantity,
            'Product_Image'=>$img_url,
            'Discount'=>$Discount,
            'Price_befor_Discount'=>$discountedPrice
        ]);

        Categories::where('id',$request->Ctegory_id)->increment('product_count',1);

        return redirect()->route('Admin.AllProducts')->with('message','Product added successfully');
    }

    public function AllProducts(){
        $Products=Product::latest()->get();
        return view('Admin.AllProducts',compact('Products'));
    }

    public function Update_Product_forme($id){
        $Product_info=Product::findOrFail($id);

        $categories=Categories::latest()->get();
        // $sub_categories=SubCategory::latest()->get();
        return view('Admin.Update-Product',compact('Product_info','categories'));
    }
    public function Update_Product_data(Request $request){
        $request->validate([
            'Product_id'=>'required',
            'Product_name'=>'required',
            'Product_short_description'=>'required',
            'Product_long_description'=>'required',
            'category_id'=>'required',
            // 'sub_category_id'=>'required',
            'Price'=>'required',
            'Quantity'=>'required',
        ]);

        $category_name=Categories::where('id',$request->category_id)->value('category_name');
        // $sub_category_name=SubCategory::where('id',$request->sub_category_id)->value('Sub_category_name');

        if($request->hasFile('Product_Image')){
            $request->validate([
                'Product_Image'=>'required|image|mimes:jpg,png,gif,jpeg|max:2048'
            ]);
            $image = $request->file('Product_Image');
            $imageName = hexdec(uniqid()).'.'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Product_image'), $imageName);
            $img_url='Product_image/'.$imageName;
        }else{
            $img_url=Product::where('id',$request->Product_id)->value('Product_Image');
        }
        $id_cat=Product::where('id',$request->Product_id)->value('category_id');
        Categories::where('id',$id_cat)->decrement('product_count',1);

        
        Product::findOrFail($request->Product_id)->update([
            'Product_name'=>$request->Product_name,
            'slug'=>strtolower(str_replace(' ', '-', $request->Product_name)),
            'category_name'=>$category_name,
            'category_id'=>$request->category_id,
            'Product_short_description'=>$request->Product_short_description,
            'Product_long_description'=>$request->Product_long_description,
            'Price'=>$request->Price,
            'Quantity'=>$request->Quantity,
            'Product_Image'=>$img_url
        ]);

        Categories::where('id',$request->Ctegory_id)->increment('product_count',1);

        return redirect()->route('Admin.AllProducts')->with('message','Product Updated successfully');
    }
    public function Delete_product($id){
        Product::findOrFail($id)->delete();

        $id_cat=Product::where('id',$id)->value('category_id');

        Categories::where('id',$id_cat)->decrement('product_count',1);

        return redirect()->route('Admin.AllProducts')->with('message','Product Deleted successfully');
    }
    public function Orders(){
        $status='En Attente';
        $client_Infos=Order_Info::where('status',$status)->latest()->get();
        return view('Admin.Orders',compact('client_Infos'));
    }
    public function Termines_commande($id){
        $order_info=Order_Info::findOrFail($id);
        $order_info->status='Terminée';
        $order_info->Status_Livraison='En Attente Livraison';
        $order_info->save();

        notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Commande Terminee');

        $client_Infos=Order_Info::latest()->get();
        return redirect()->route('Admin.Orders')->with('client_Infos', $client_Infos);
    }
    public function Annules_commande($id){
        $order_info=Order_Info::findOrFail($id);
        $order_info->status='Annulée';
        $order_info->save();

        notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Commande Terminee');

        $client_Infos=Order_Info::latest()->get();
        return redirect()->route('Admin.Orders')->with('client_Infos', $client_Infos);

    }
    public function Delete_commande($id){
        $order_info=Order_Info::findOrFail($id);
        $order_info->delete();

        notyf()->position('x', 'right')->position('y', 'top')->addSuccess('Commande Supprimé');

        $client_Infos=Order_Info::latest()->get();
        return redirect()->route('Admin.Orders')->with('client_Infos', $client_Infos);
    }
    public function Get_commande_Termines(){
        $status='Terminée';
        $client_Infos=Order_Info::where('status',$status)->get();

        return view('Admin.Order_confirmed',compact('client_Infos'));
    }
    public function Get_commande_Annules(){
        $status='Annulée';
        $client_Infos=Order_Info::where('status',$status)->get();

        return view('Admin.Order_canceled',compact('client_Infos'));
    }
    public function Get_commande_attente_livraison(){
        $status='En Attente Livraison';
        $client_Infos=Order_Info::where('Status_Livraison',$status)->get();

        return view('Admin.Order_Livraison',compact('client_Infos'));
    }
}
