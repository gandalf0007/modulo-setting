<?php

/*----------------------------------CONFIGURACIONES-----------------------------------*/
Route::get('settings','AdminController@Config');

/*--------------------------------CATEGORIA Y SUB CATEGORIAS---------------------------------------*/
Route::get('categoria','CategoriaController@index');
Route::get('categoria-create','CategoriaController@create');
Route::post('categoria-store','CategoriaController@store');
Route::put('categoria-update/{id}','CategoriaController@update');
Route::delete('categoria-destroy/{id}','CategoriaController@destroy');


Route::get('categoriasub','CategoriaSubController@index');
Route::get('categoriasub-create','CategoriaSubController@create');
Route::post('categoriasub-store','CategoriaSubController@store');
Route::put('categoriasub-update/{id}','CategoriaSubController@update');
Route::delete('categoriasub-destroy/{id}','CategoriaSubController@destroy');
/*--------------------------------CATEGORIA Y SUB CATEGORIAS--------------------------------------*/


/*--------------------------------------PROVEDORES------------------------------------------------*/
Route::get('provedor','ProvedoreController@index');
Route::get('provedor-create','ProvedoreController@create');
Route::post('provedor-store','ProvedoreController@store');
Route::put('provedor-update/{id}','ProvedoreController@update');
Route::delete('provedor-destroy/{id}','ProvedoreController@destroy');
/*--------------------------------------PROVEDORES------------------------------------------------*/



Route::get('marcas','MarcaController@index');
Route::get('marcas-create','MarcaController@create');
Route::post('marcas-store','MarcaController@store');
Route::put('marcas-update/{id}','MarcaController@update');
Route::delete('marcas-destroy/{id}','MarcaController@destroy');


Route::get('banner','BannerController@index');
Route::get('banner-create','BannerController@create');
Route::post('banner-store','BannerController@store');
Route::put('banner-update/{id}','BannerController@update');
Route::delete('banner-destroy/{id}','BannerController@destroy');

Route::get('informacion','InformationController@index');
Route::get('informacion-create','InformationController@create');
Route::post('informacion-store','InformationController@store');
Route::put('informacion-update/{id}','InformationController@update');
Route::delete('informacion-destroy/{id}','InformationController@destroy');

Route::get('transporte','TransporteController@index');
Route::get('transporte-create','TransporteController@create');
Route::get('transporte-edit/{id}','TransporteController@edit');
Route::post('transporte-store','TransporteController@store');
Route::post('transporte-update','TransporteController@update');
Route::delete('transporte-destroy/{id}','TransporteController@destroy');


Route::get('blog-settings', 'BlogController@BlogSettingsIndex');
Route::post('blog-settings-disqus-store','BlogController@BlogSettingsDisqusStore');
Route::put('blog-settings-disqus-update/{id}','BlogController@BlogSettingsDisqusUpdate');
Route::post('blog-settings-imagen-store','BlogController@BlogSettingsImagenStore');
Route::put('blog-settings-imagen-update','BlogController@BlogSettingsImagenUpdate');


Route::get('puntos','PuntosController@index');
Route::put('puntos-update','PuntosController@update');
Route::delete('puntos-destroy','PuntosController@destroy');
Route::put('puntos-agregar-puntos/{id}','PuntosController@AgregarPuntos');


Route::get('mercadopago','MercadoPagoController@index');
Route::post('mercadopago-store','MercadoPagoController@store');
Route::put('mercadopago-update/{id}','MercadoPagoController@update');

Route::get('recaptcha','RecaptchaController@index');
Route::post('recaptcha-store','RecaptchaController@store');
Route::put('recaptcha-update/{id}','RecaptchaController@update');

Route::get('facebook','FacebookController@index');
Route::get('facebook-create','FacebookController@create');
Route::post('facebook-store','FacebookController@store');
Route::put('facebook-update/{id}','FacebookController@update');
Route::delete('facebook-destroy/{id}','FacebookController@destroy');

/*BACKUP*/
Route::get('backup','BackupController@index');
Route::get('backup-create','BackupController@BackupCreate');
Route::delete('backup-delete/{id}', 'BackupController@delete');
/*BACKUP*/


/*CONFIGURACIONES GENERALES*/
Route::post('logo-store','LogoController@store');
Route::put('logo-update','LogoController@update');
Route::delete('logo-destroy','LogoController@destroy');

Route::post('favicon-store','LogoController@faviconStore');
Route::put('favicon-update','LogoController@faviconUpdate');
Route::delete('favicon-destroy','LogoController@faviconDestroy');

Route::post('sociallink-store','SocialLinksController@store');
Route::put('sociallink-update/{id}','SocialLinksController@update');
Route::delete('sociallink-destroy/{id}','SocialLinksController@destroy');

Route::post('settings-store','SettingsController@store');
Route::put('settings-update/{id}','SettingsController@update');
Route::delete('settings-destroy/{id}','SettingsController@destroy');
/*CONFIGURACIONES GENERALES*/
/*----------------------------------CONFIGURACIONES-----------------------------------*/