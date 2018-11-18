<?php

Route::get('home', 'HomeController@index');

Route::controllers([
	'validacion' => 'validacion\ValidacionController',
	'validado/fotos' => 'FotoController',
	'validado/albumes' => 'AlbumController',
	'validado/usuario' => 'usuarioController',
	'validado' => 'InicioController',
	'/' => 'BienvenidaController'
]);
