<?php

Route::get('home', 'HomeController@index');

Route::controllers([
	'validacion' => 'validacion\ValidacionController',
	'validado/fotos' => 'FotoController',
	'validado/albunes' => 'AlbumController',
	'validado/usuario' => 'UsuarioController',
	'validado' => 'InicioController',
	'/' => 'BienvenidaController'
]);
