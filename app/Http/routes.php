<?php

Route::get('/', 'GalleriesController@index');
Route::get('getGallery/{gallery}', 'GalleriesController@getGallery');
Route::post('uploadImages', 'GalleriesController@store');
Route::resource('gallery', 'GalleriesController');
