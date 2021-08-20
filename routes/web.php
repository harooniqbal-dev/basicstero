<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/singleproduct/{id?}',[FrontendController::class,'singleproduct'])->name('singleproduct');


Route::get('/news', [NewsController::class,'showallnews'])->name('news');

Route::get('/purchase', function () {
    return view('frontend.purchase');
})->name('purchase');

Route::get('/discount',[FrontendController::class,'showalldiscount'] )->name('discount');

Route::get('/faq', [FrontendController::class,'showallfaq'])->name('faq');

Route::get('/terms', function () {
    return view('frontend.ourterms');
})->name('terms');

Route::get('/innovations', function () {
    return view('frontend.innovation');
})->name('innovations');

Route::get('/results',[FrontendController::class,'showallreport'])->name('results');

Route::get('/reviews', function () {
    return view('frontend.review');
})->name('reviews');

Route::get('/contact', function () {
    return view('frontend.contactus');
})->name('contact');

Route::get('addcontact',[FrontendController::class,"addcontact"])->name('addcontact');

Route::get('/oralsteroids', [FrontendController::class,'Oralline'])->name('oralsteroids');

Route::get('/injectableline', [FrontendController::class,'injectableline'])->name('injectableline');

Route::get('/hgh', [FrontendController::class,'hgh'])->name('hgh');

Route::get('/login', function () {
    return view('Userview.login');
})->name('login');


// login in user url

Route::post('/userlogin',[UserController::class,'login'])->name('userlogin');
Route::post('/register',[UserController::class,'register'])->name('register');
Route::get('/logout',[UserController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth']],function (){
    Route::post('/storepassword',[UserController::class,'storepassword'])->name('storepassword');
    Route::get('/profile', [UserController::class,'get_profile'])->name('profile');
    Route::post('/updateprofile',[UserController::class,'updateprofile'])->name('updateprofile');

    Route::get('/cart', function () {
        return view('Userview.cart');
    })->name('cart');
    

    
    Route::get('/payment', function () {
        return view('Userview.payment');
    })->name('payment');
    
    Route::get('/order', function () {
        return view('Userview.orders');
    })->name('order');
    
    Route::get('/referals', function () {
        return view('Userview.referals');
    })->name('referals');
    
    Route::get('/changepassword', function () {
        return view('Userview.changepassword');
    })->name('changepassword');
    
});




Route::get('admin', [AdminController::class,'admin_form'])->name('admin_login');
Route::post('admin-login', [AdminController::class,'adminLogin'])->name('submitadminlogin');

Route::group(['middleware' => ['secureadmin:admin:user']],function (){
    Route::get('dashboard', [AdminController::class,'dashboard'])->name('dashboard');
//new url
    Route::get('all-news', [NewsController::class,'index'])->name('allnews');
    Route::get('add-news', [NewsController::class,'create'])->name('addnews');
    Route::post('save-news', [NewsController::class,'storenews'])->name('saveNews');
    Route::get('edit-news/{id?}', [NewsController::class,'editnews'])->name('editnews');
    Route::post('update-news/{id?}', [NewsController::class,'updatenews'])->name('updatenews');
    Route::get('delete-news/{id?}', [NewsController::class,'deletenews'])->name('deletenews');

// discount url
    Route::get('all-discount', [AdminController::class,'alldiscount'])->name('alldiscount');
    Route::get('add-discount', [AdminController::class,'creatediscount'])->name('creatediscount');
    Route::post('save-discount', [AdminController::class,'storediscount'])->name('storediscount');
    Route::get('edit-discount/{id?}', [AdminController::class,'editdiscount'])->name('editdiscount');
    Route::post('update-discount/{id?}', [AdminController::class,'updatediscount'])->name('updatediscount');
    Route::get('delete-discount/{id?}', [AdminController::class,'deletediscount'])->name('deletediscount');

// faq url
    Route::get('all-faq', [AdminController::class,'allfaq'])->name('allfaq');
    Route::get('add-faq', [AdminController::class,'createfaq'])->name('createfaq');
    Route::post('save-faq', [AdminController::class,'storefaq'])->name('storefaq');
    Route::get('edit-faq/{id?}', [AdminController::class,'editfaq'])->name('editfaq');
    Route::post('update-faq/{id?}', [AdminController::class,'updatefaq'])->name('updatefaq');
    Route::get('delete-faq/{id?}', [AdminController::class,'deletefaq'])->name('deletefaq');

// report url
    Route::get('all-report', [AdminController::class,'allreport'])->name('allreport');
    Route::get('add-report', [AdminController::class,'createreport'])->name('createreport');
    Route::post('save-report', [AdminController::class,'storelabreport'])->name('storelabreport');
    Route::get('edit-report/{id?}', [AdminController::class,'editreport'])->name('editreport');
    Route::post('update-report/{id?}', [AdminController::class,'updatereport'])->name('updatereport');
    Route::get('delete-report/{id?}', [AdminController::class,'deletereport'])->name('deletereport');

// product url
    Route::get('all-product', [AdminController::class,'allproducts'])->name('allproducts');
    Route::get('add-product', [AdminController::class,'createproduct'])->name('createproduct');
    Route::post('save-product', [AdminController::class,'storeproduct'])->name('storeproduct');
    // Route::get('edit-report/{id?}', [AdminController::class,'editproduct'])->name('editproduct');
    // Route::post('update-report/{id?}', [AdminController::class,'updateproduct'])->name('updateproduct');
    // Route::get('delete-report/{id?}', [AdminController::class,'deleteproduct'])->name('deleteproduct');


    Route::get('all-warehouse', [AdminController::class,'allwarehouse'])->name('allwarehouse');
    Route::get('add-warehouse', [AdminController::class,'createwarehouse'])->name('createwarehouse');
    Route::post('save-warehouse', [AdminController::class,'storewarehouse'])->name('storewarehouse');
    Route::get('edit-warehouse/{id?}', [AdminController::class,'editwarehouse'])->name('editwarehouse');
    Route::post('update-warehouse/{id?}', [AdminController::class,'updatewarehouse'])->name('updatewarehouse');
    Route::get('delete-warehouse/{id?}', [AdminController::class,'deletewarehouse'])->name('deletewarehouse');


// classification url

    Route::get('all-classification', [AdminController::class,'allclassification'])->name('allclassification');
    Route::get('add-classification', [AdminController::class,'createclassification'])->name('createclassification');
    Route::post('save-classification', [AdminController::class,'storeclassification'])->name('storeclassification');
    Route::get('edit-classification/{id?}', [AdminController::class,'editclassification'])->name('editclassification');
    Route::post('update-classification/{id?}', [AdminController::class,'updateclassification'])->name('updateclassification');
    Route::get('delete-classification/{id?}', [AdminController::class,'deleteclassification'])->name('deleteclassification');
});

