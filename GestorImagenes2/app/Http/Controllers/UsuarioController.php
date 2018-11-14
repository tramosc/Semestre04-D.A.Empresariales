<?php namespace GestorImagenes2\Http\Controllers;

class UsuarioController extends Controller {
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
	public function getEditarPerfil(){
		return 'Mostrando formulario';
	}
  public function postEditarPerfil(){
    return 'Generando actualizacion de perfil';
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
