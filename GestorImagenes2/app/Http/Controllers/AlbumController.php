<?php namespace GestorImagenes2\Http\Controllers;

class AlbumController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex(){
		return 'Mostrando albumes del usuario';
	}
  public function getCrearAlbum(){
    return 'Formulario de crear Album';
  }
  public function postCrearAlbum(){
    return 'Almacenando Album';
  }
  public function getActualizarAlbum(){
    return 'Formulario de actualizar Album';
  }
  public function postActualizarAlbum(){
    return 'Actualizar Album';
  }
  public function getEliminarAlbum(){
    return 'Formulario de eliminar Album';
  }
  public function postEliminarAlbum(){
    return 'Eliminando Album';
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
