<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user_pages.Home_page');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function(){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('/Admin/Dashboard','index')->name('Admin.Dashboard');
            /*Category_Routs*/

        Route::get('/Admin/AllCategory','AllCategory')->name('Admin.AllCategory');
        Route::get('/Admin/AddCategory','AddCategory')->name('Admin.AddCategory');
        Route::Post('/Admin/Create_Cat','create_category')->name('create_category');
        Route::get('/Admin/Update_Cat/{id}','Update_category')->name('Update_category');
        Route::Post('/Admin/Update-Cat','Update_category_data')->name('Update_category_data');
        Route::get('/Admin/Delete-Cat/{id}','Delete_category')->name('Delete_category');

            /*Sub_Category_Routs*/
        Route::get('/Admin/AllSubCategory','AllSubCategory')->name('Admin.AllSubCategory');
        Route::get('/Admin/AddSubCategory','AddSubCategory')->name('Admin.AddSubCategory');
        Route::Post('/Admin/Store_subcat','Store_Sub_Cat')->name('Store_Sub_Cat');
        Route::get('/Admin/Delete-Sub_Cat/{id}','Delete_Sub_category')->name('Delete_Sub_category');
        Route::get('/Admin/Update_Sub-Cat/{id}','Update_Sub_category')->name('Update_Sub_category');
        Route::Post('/Admin/Update-Sub-Cat','Update_Sub_Cat_data')->name('Update_Sub_Cat_data');

            /*Product_Routs*/
        Route::get('/Admin/AllProducts','AllProducts')->name('Admin.AllProducts');
        Route::get('/Admin/AddProduct','AddProduct')->name('Admin.AddProduct');
        Route::Post('/Admin/Create-product','Store_product_data')->name('Store');
        Route::get('/Admin/Update_Product/{id}','Update_Product_forme')->name('Update_Product_forme');
        Route::Post('/Admin/Update-product','Update_Product_data')->name('Update_Product_data');
        Route::get('/Admin/Delete-Product/{id}','Delete_product')->name('Delete_product');

            /*Orders_Routs*/
        Route::get('/Admin/Orders','Orders')->name('Admin.Orders');
        Route::get('/Admin/Commande-Annules','Get_commande_Annules')->name('Admin.Orders_canceled');
        Route::get('/Admin/Commande-Termines','Get_commande_Termines')->name('Admin.Orders_confirmed');

        Route::get('/Admin/Delete-Commande/{id}','Delete_commande')->name('Delete_commande');
        Route::get('/Admin/Termines-Commande/{id}','Termines_commande')->name('Termines_commande');
        Route::get('/Admin/Annules-Commande/{id}','Annules_commande')->name('Annules_commande');
            /*Orders_Livraison*/
        Route::get('/Admin/Commande-Attent-livraison','Get_commande_attente_livraison')->name('Get_commande_attente_livraison');


    });

});

Route::get('/', [HomeController::class, 'Index'])->name('user_pages.home');
Route::get('/Product-Details/{id}', [HomeController::class, 'Product_Details_Form'])->name('Product_Details');
Route::get('/Product-List', [HomeController::class, 'Get_Product_List'])->name('Product_List');
Route::get('/Product-List-oldest', [HomeController::class, 'Get_Product_List_by_oldest'])->name('Get_Product_List_by_oldest');
Route::get('/Product-List-latest', [HomeController::class, 'Get_Product_List_by_latest'])->name('Get_Product_List_by_latest');

Route::get('/Add-toCart', [HomeController::class, 'Add_toCart_from'])->name('Cart_list');
Route::get('/Clear-Cart', [HomeController::class, 'Clear_Cart'])->name('Clear_Cart');
Route::post('/toggle-favorite', [HomeController::class, 'Add_favourit'])->name('toggle.favorite');
Route::get('/Favorite', [HomeController::class, 'Favourit_product_form'])->name('Favourit_product');
Route::get('/Order', [HomeController::class, 'Get_order_form'])->name('Get_order_form');
Route::get('/BuyNow/{id}', [HomeController::class, 'Get_order_form_byitNow'])->name('Get_order_form_byitNow');
Route::get('/Search-By-Catedoy/{id}', [HomeController::class, 'Search_by_categoys'])->name('Search_by_categoys');
Route::post('/Product-List/Filter', [HomeController::class, 'Filter_listProduct'])->name('Filter_listProduct');

Route::Post('/Order',[HomeController::class, 'Order'])->name('Order');



require __DIR__.'/auth.php';
