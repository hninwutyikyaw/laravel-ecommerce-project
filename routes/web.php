<?php

Auth::routes();
    // Route::get('/home','HomeController@index');
    // Route::get('/main','FrontController@products')->name('home');
    // Route::get('/list','FrontController@newArrival');
    Route::get('/home','FrontController@indexproduct');
    Route::get('/allproducts','FrontController@allproducts');
    Route::get('/category/{id}','FrontController@showCates');
    Route::get('/productDetail/{id}','FrontController@detailPro');
    Route::get('/blogDetail/{id}','FrontController@detailBlog');
    Route::get('/brand/{id}','FrontController@showBrands');
    Route::get('/categorysort','FrontController@category');
    Route::resource('address','AddressController');
    Route::get('order','CheckoutController@storeOrder')->name('checkout.payment');
    Route::get('/blogs','FrontController@allBlog');
    Route::get('/compare','FrontController@compareSearch');
    Route::get('search','FrontController@search');
    Route::get('blog_search','FrontController@blog_search');


    Route::get('/contact',function(){
        return view('frontend.contact');
    });
     
//Middleware//
    Route::group(['middleware' => ['auth','admin']], function (){
        
        Route::get('/dashboard','Admin\DashboardController@dashboard')->name('admin.dashboard');
        Route::resource('brand','BrandController');
        Route::resource('product','ProductsController');
        Route::get('productSearch','ProductsController@productSearch');
        Route::resource('category','CategoriesController');
        Route::resource('blog','BlogController');
        Route::resource('adminorder','OrderController');
        Route::resource('inventory','InventoryController');
        Route::get('inventory_stock','Admin\DashboardController@total_stock');
//user-profile//
        Route::get('/role-register','Admin\DashboardController@registered');
//user-profile edit//
        Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
//user-profile update//
        Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
//user-profile delete//
        Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');
   
});  

    Route::group(['middleware'=>'auth'],function(){
        
        Route::get('/profile','ProfileController@index');
        Route::get('/orders','ProfileController@orders');
        Route::get('/address','ProfileController@address');
        Route::post('/updateAddress','ProfileController@updateAddress');
        Route::get('/password','ProfileController@password');
        Route::post('/updateimage','ProfileController@updateimage');
        Route::get('/Image','ProfileController@Image');

        Route::get('/userimage_edit/{id}','ProfileController@userImage_edit');


 Route::put('/user_image-update/{id}','ProfileController@updateimage');

        Route::post('/updatePassword','ProfileController@updatepassword');
        Route::get('/cart','FrontController@view_cart');
        Route::get('/addToCart','FrontController@addcardItem')->name('addToCard');
        Route::put('/addTocart','FrontController@updateItem')->name('updateCard');
        Route::get('/order','FrontController@storeOrder')->name('storeOrder');
        Route::get('/removecardslist/{id}','FrontController@removecardslist');
        Route::get('/wishlist','FrontController@view_wishlist');
        Route::get('/addToWishlist','FrontController@addWishlist')->name('addToWishlist');
        Route::get('/removeWishlist/{id}','FrontController@removeWishlist');
        Route::get('/orderConfirm','FrontController@orderConfirm');
        Route::resource('comment','CommentController');
        Route::resource('reply','ReplyController');
        Route::resource('review','ReviewController');
        Route::get('shipping_info','CheckoutController@shipping')->name('checkout.shipping');
      
    });
     