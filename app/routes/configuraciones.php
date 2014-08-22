<?php


Route::get('configuraciones', ['as' => 'configuraciones', 'uses' => 'ConfiguracionController@index']);
Route::get('configuraciones{id}', ['as' => 'actualizarConfiguraciones', 'uses' => 'ConfiguracionController@actualizarConfiguraciones']);