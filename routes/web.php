<?php

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

/** [FrontEnd Began] **/
Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@contactUs');
Route::post('/post-contact', 'WelcomeController@postContact');
Route::get('/contact', 'MapController@index');

//**********show product by category********************
Route::get('/product-by-category/{cat_id}', 'WelcomeController@showProductByCategory');
Route::get('/view-product/{product_id}', 'WelcomeController@productDetailsById');

/************ [ Customer Profile] ***************/
Route::get('/profile-customer/{id}', 'WelcomeController@editCustomerProfile');
Route::post('/update-customer-profile', 'WelcomeController@updateCustomerProfile');
Route::get('/my-order', 'WelcomeController@myOrder');
Route::get('/track-order/{id}', 'WelcomeController@trackOrder');

//****************cart product*****************
Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/show-cart','CartController@showCart');
Route::get('/delete-to-cart/{rowId}','CartController@deleteCartProduct');
Route::post('/update-cart','CartController@updateCart');

//***************** CheckOut **********************
Route::get('/login-check','CheckoutController@loginCheck');
Route::post('/customer-registration', 'CheckoutController@customerRegistration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@saveShippingDetails');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-order','CheckoutController@saveOrder');


//admin manage-ordered by Customer
Route::get('/manage-order','OrderDetailsController@manageOrder');
Route::get('/view-order/{id}','OrderDetailsController@viewOrder');
Route::get('/edit-order/{id}', 'OrderDetailsController@editOrder');
Route::post('/update-order', 'OrderDetailsController@updateOrder');

Route::get('/generate-pdf/{id}','PdfController@generatePdf');




//########## CUSTOMER LOGIN & LOGOUT ################sss
Route::post('/customer-login','CheckoutController@customerLogin');
Route::get('/customer-logout','CheckoutController@customerLogout');





/** [BackEnd Began] **/
/** [BackEnd ADMIN] **/
Route::get('/xyz', 'AdminController@index');
Route::post('/admin-login', 'AdminController@adminLogin');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');


/** [category] **/
Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/save-category', 'CategoryController@saveCategory');
Route::get('/manage-category', 'CategoryController@manageCategory');
Route::get('/unpublished-category/{id}', 'CategoryController@unpublishedCategory');
Route::get('/published-category/{id}', 'CategoryController@publishedCategory');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@editCategory');
Route::post('/update-category', 'CategoryController@updateCategory');

/**[manufacturer]**/
Route::get('/add-manufacturer', 'ManufacturerController@addManufacturer');
Route::post('/save-manufacturer', 'ManufacturerController@saveManufacturer');
Route::get('/manage-manufacturer', 'ManufacturerController@manageManufacturer');
Route::get('/unpublished-manufacturer/{id}', 'ManufacturerController@unpublishedManufacturer');
Route::get('/published-manufacturer/{id}', 'ManufacturerController@publishedManufacturer');
Route::get('/delete-manufacturer/{id}', 'ManufacturerController@deleteManufacturer');
Route::get('/edit-manufacturer/{id}', 'ManufacturerController@editManufacturer');
Route::post('/update-manufacturer', 'ManufacturerController@updateManufacturer');

/**********[product]***************/
Route::get('/add-product', 'ProductController@addProduct');
Route::post('/save-product', 'ProductController@saveProduct');
Route::get('/manage-product', 'ProductController@manageProduct');
Route::get('/unpublished-product/{id}', 'ProductController@unpublishedProduct');
Route::get('/published-product/{id}', 'ProductController@publishedProduct');
Route::get('/delete-product/{id}', 'ProductController@deleteProduct');
Route::get('/edit-product/{id}', 'ProductController@editProduct');
Route::post('/update-product', 'ProductController@updateProduct');

Route::get('/top-product/{id}', 'ProductController@topProduct');
Route::get('/remove-top-product/{id}', 'ProductController@removeTopProduct');


//##########################alter Images##############
Route::get('/add-alt-images/{id}', 'ProductController@addAlterImages');
Route::post('/save-alt-image', 'ProductController@saveAlterImages');
Route::get('/delete-altImg/{id}', 'ProductController@deleteAlterImages');
Route::get('/unpublished-alt-image/{id}', 'ProductController@unpublishedAltImage');
Route::get('/published-alt-image/{id}', 'ProductController@publishedAltImage');




/*********************[slider image]************************/
Route::get('/add-slider', 'SliderController@addSlider');
Route::post('/save-slider', 'SliderController@saveSlider');
Route::get('/manage-slider', 'SliderController@manageSlider');
Route::get('/unpublished-slider/{id}', 'SliderController@unpublishedSlider');
Route::get('/published-slider/{id}', 'SliderController@publishedSlider');
Route::get('/delete-slider/{id}', 'SliderController@deleteSlider');


/*********************[social media]************************/
Route::get('/social', 'SocialController@social');
Route::post('/save-social', 'SocialController@saveSocialContact');





Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
