<?php

use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Route::get('website/aboutus',[ FrontController::class ,'aboutus'])->name('app.aboutus');
Route::get('index', [FrontController::class,'index']);
Route::get('aboutus', [FrontController::class,'aboutus']);
Route::get('products', [FrontController::class,'ourProducts']);
Route::get('product/details/{id}', [FrontController::class,'productDetails']);
Route::get('contactus', [FrontController::class,'contactUsIndex']);
Route::post('contact/store', [FrontController::class,'contactUsStore']);
// Route::get('post', [FrontController::class, 'post'])->name('post');
Route::get('loadmore', [FrontController::class, 'index_load_more']);
Route::post('loadmore/load_data', [FrontController::class, 'load_data'])->name('load');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    // Contact Field
    Route::delete('contact-fields/destroy', 'ContactFieldController@massDestroy')->name('contact-fields.massDestroy');
    Route::resource('contact-fields', 'ContactFieldController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductsController');

    // Contact Us
    Route::delete('contactuses/destroy', 'ContactUsController@massDestroy')->name('contactuses.massDestroy');
    Route::resource('contactuses', 'ContactUsController');

    // Partners
    Route::delete('partners/destroy', 'PartnersController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnersController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnersController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnersController');

    // Portfolio
    Route::delete('portfolios/destroy', 'PortfolioController@massDestroy')->name('portfolios.massDestroy');
    Route::post('portfolios/media', 'PortfolioController@storeMedia')->name('portfolios.storeMedia');
    Route::post('portfolios/ckmedia', 'PortfolioController@storeCKEditorImages')->name('portfolios.storeCKEditorImages');
    Route::resource('portfolios', 'PortfolioController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// Route::prefix('website/')->group( function(){
    // Route::get('index', [ IndexController::class ,'index'])->name('app.home');
    // route::get('apartments' , [ ApartmentController::class ,'index'])->name('app.apartments');
    // route::get('apartmentsingle' , [ ApartmentController::class ,'index'])->name('app.apartmentsingle');
    // route::view('blog-grid' , 'front.bloggrid')->name('app.bloggrid');
// });