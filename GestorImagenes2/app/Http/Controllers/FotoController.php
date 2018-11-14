<?php namespace GestorImagenes2\Http\Controllers;

class FotoController extends Controller {

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
		return 'Mostrando fotos del usuario';
	}
  public function getCrearFoto(){
    return 'Formulario de crear foto';
  }
  public function postCrearFoto(){
    return 'Almacenando foto';
  }
  public function getActualizarFoto(){
    return 'Formulario de actualizar fotos';
  }
  public function postActualizarFoto(){
    return 'Actualizar foto';
  }
  public function getEliminarFoto(){
    return 'Formulario de eliminar fotos';
  }
  public function postEliminarFoto(){
    return 'Eliminando foto';
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
