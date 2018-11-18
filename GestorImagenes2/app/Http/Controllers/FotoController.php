<?php namespace GestorImagenes2\Http\Controllers;

use GestorImagenes2\Album;
use GestorImagenes2\Foto;
use GestorImagenes2\Http\Requests\MostrarFotosRequest;

class FotoController extends Controller {
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
	public function getIndex(MostrarFotosRequest $request){

		$id=$request->get('id');
		$album=Album::find($id);
		$fotos=$album->fotos;
		return view('fotos.mostrar',['fotos'=>$fotos]);
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
