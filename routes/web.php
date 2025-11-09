<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Category; 
use App\Models\Product; 
use App\Models\Cart; 
use Illuminate\Http\Request;

Auth::routes(['register' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [FirstController::class , 'MainPage']);

Route::get('/user', [FirstController::class ,'user'])->name('user');

Route::post('/storeuserdata', [FirstController::class ,'storeUserData'])->name('storeuserdata');

Route::get('/products/{catid?}', [FirstController::class ,'GetCategortProducts'])->name('prods');

Route::get('/category', [FirstController::class ,'GetAllCategortywithProducts'])->name('cats');

Route::get('/addproduct', [ProductController::class ,'AddProduct'])->middleware('auth');

Route::get('/reviews', [FirstController::class ,'reviews']);

Route::post('/storereview', [FirstController::class ,'storeReview']);

Route::get('/editproduct/{productid?}', [ProductController::class ,'EditProduct'])->middleware('auth');

Route::get('/removeproduct/{catid?}', [ProductController::class ,'RemoveProduct']);

Route::post('/storeProductImage', [ProductController::class ,'storeItemImage']);

Route::post('/storeproduct', [ProductController::class,'StoreProduct']);

Route::post('/search', function (Request $request) {

    $products = Product::where('name', 'like',  '%' . $request ->searchkey . '%')->paginate(6) ;

    return view('product', ['products' => $products]) ;
});

Route::get('/ProductsTable', [ProductController::class, 'ProductsTable']);

Route::get('/apitest', [ProductController::class, 'getAllProducts']);

Route::get('/single-product/{productid}', [ProductController::class, 'showProduct']);

Route::get('/AddProductImages/{productid}', [ProductController::class, 'AddProductImages']);

Route::get('/removeproductphoto/{imageid?}', [ProductController::class, 'Removeproductphoto']);

Route::get('/cart', [CartController::class, 'cart'])->middleware('auth');

Route::get('/Completeorder', [CartController::class, 'Completeorder'])->middleware('auth');

Route::get('/previousorder', [CartController::class, 'previousorder'])->middleware('auth');

Route::get('/StoreOrder', [CartController::class, 'StoreOrder']);

Route::post('/pay', [StripeController::class, 'pay']);

Route::get('/charts', function () {

    return view('Products.charts') ;

});

Route::get('/deletecartitem/{cartid}', function ($cartid) {

    Cart::find($cartid)->delete() ;

});


Route::get('/addproducttocart/{productid}', function ($productid) {

    $user_id = Auth::id();

    $result = Cart::where('user_id', $user_id)->where('product_id' , $productid)->first();
    
    if($result) {
        $result->quantity += 1 ;
        $result->save() ;
    }

    else {

        $newCart = new Cart() ;
        $newCart -> product_id = $productid ;
        $newCart -> user_id = $user_id;
        $newCart -> quantity = 1 ;
        $newCart -> save();
    }
    
    return redirect('/cart') ;

})->middleware('auth');

Route::post('/lang', function (Request $request) {

    $locale = $request->input('locale');
    
    if (in_array($locale, ['en', 'ar'])) {
        
        session()->put('locale', $locale);
    }
    
    return redirect()->back() ;
    
})->name('changeLanguage');

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle']);

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admindashboard')->middleware('useractivity');

Route::get('/admin/chart-data', [AdminController::class, 'chartData']);

Route::get('/adminsettings', [AdminController::class, 'adminSettings'])->name('adminsettings');

Route::post('/admingeneralsettings', [AdminController::class, 'generalSettings'])->name('admingeneralsettings');

Route::post('/adminpaymentsettings', [AdminController::class, 'paymentSettings'])->name('adminpaymentsettings');

Route::post('/adminshippingsettings', [AdminController::class, 'shippingSettings'])->name('adminshippingsettings');

Route::post('/adminemailsettings', [AdminController::class, 'emailSettings'])->name('adminemailsettings');

Route::post('/adminaccountsettings', [AdminController::class, 'accountSettings'])->name('adminaccountsettings');

Route::post('/adminseosettings', [AdminController::class, 'seoSettings'])->name('adminseosettings');

Route::get('/adminusers', [AdminController::class, 'adminUsers'])->name('adminusers')->middleware('useractivity');

Route::get('/adminuserprofile/{id}', [AdminController::class, 'adminUserProfile'])->name('adminuserprofile')->middleware('useractivity');

Route::get('/adminitems', [AdminController::class, 'adminItems'])->name('adminitems');

Route::get('/admincategories', [AdminController::class, 'adminCategories'])->name('admincategories');

Route::get('/adminaddimages/{itemid}', [AdminController::class, 'adminAddImages'])->name('adminaddimage');

Route::post('/adminstoreitemImage', [AdminController::class ,'storeItemImage']);

Route::get('/adminedititem/{productid?}', [AdminController::class ,'editItem'])->name('adminedititem');

Route::post('/adminstoreitem', [AdminController::class,'storeItem']);

Route::post('/adminstorecategory', [AdminController::class,'storeCategory']);

Route::get('/adminadditem', [AdminController::class,'addItem']);

Route::get('/adminaddcategory', [AdminController::class,'addCategory']);

Route::get('/admindeletecategory/{categoryid}', [AdminController::class, 'deleteCategory'])->name('admindeletecategory');

Route::get('/admineditcategory/{categoryid}', [AdminController::class, 'editCategory'])->name('admineditcategory');

Route::get('/adminreviews', [AdminController::class, 'reviews'])->name('adminreviews');

Route::get('/adminshowreviews/{productid}', [AdminController::class, 'showReviews'])->name('adminshowreviews');


Route::get('/admin/login', function () {
    return "admin login";
});

Route::get('/admin/index', function () {
    return "admin index";
})->middleware('checkrole:admin');

Route::get('/admin/charts', function () {
    return "admin charts";
})->middleware('checkrole:admin,salesman');

Route::get('/admin/bills', function () {
    return "admin bills";
})->middleware('checkrole:salesman');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

Route::get('/notifications/unread', [NotificationController::class, 'unread'])->name('notifications.unread');

Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.delete');

Route::delete('/notifications', [NotificationController::class, 'destroyAll'])->name('notifications.deleteAll');

Route::post('/notifications/mark-all-read-ajax', [NotificationController::class, 'markAllAsReadAjax'])
    ->name('notifications.readAllAjax');

Route::get('/notifications/latest', [NotificationController::class, 'latest'])
    ->name('notifications.latest');
