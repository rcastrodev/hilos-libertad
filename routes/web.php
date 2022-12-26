<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/servicios', 'PagesController@servicios')->name('servicios');
Route::get('/colores', 'PagesController@colores')->name('colores');
Route::get('/solicitar-prosupuesto', 'PagesController@solicitudPresupuesto')->name('solicitar-prosupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::get('/cordon', 'PagesController@cordon')->name('cordon');
Route::get('/cinta', 'PagesController@cinta')->name('cinta');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::get('/producto/color/{id}', 'ProductController@getColor');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@storeHomeGenericSection')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@updateHomeGenericSection')->name('home.content.generic-section.update');
    Route::delete('home/content/{id}', 'HomeController@destroyHomeGenericSection')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-ribbon', 'CompanyController@updateRibbon')->name('company.content.updateRibbon');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'HomeController@destroyHomeGenericSection')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/
    /** Page Category */
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::post('category/content', 'CategoryController@update')->name('category.content.update');
    /** Fin category*/
    /** Page Service */
    Route::get('service/content', 'ServiceController@content')->name('service.content');
    Route::get('service/content/slider/get-list', 'ServiceController@sliderGetList')->name('service.content.get-list');
    Route::post('service/content', 'ServiceController@updateService')->name('service.content.update');
    Route::post('service/content-bag', 'ServiceController@updateBag')->name('service.content.update-bag');
    /** Fin category*/
    /** Page Color */
    Route::get('color/content', 'ColorController@content')->name('color.content');
    Route::post('color/content/store', 'ColorController@store')->name('color.content.store');
    Route::post('color/content', 'ColorController@update')->name('color.content.update');
    Route::delete('color/content/{id}', 'ColorController@destroy')->name('color.content.destroy');
    Route::get('color/content/slider/get-list', 'ColorController@getList')->name('color.content.get-list');
    Route::get('color/content/find-color/{id?}', 'ColorController@find')->name('color.content.find-color');
    /** Fin color*/
    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/

    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    /** Fin product variable*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    /** Page newsletter */
    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');
    /** Fin newsletter*/

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
