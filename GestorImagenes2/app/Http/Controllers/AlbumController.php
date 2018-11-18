<?php namespace GestorImagenes2\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use GestorImagenes2\Http\Requests\CrearAlbumRequest;
class AlbumController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function getIndex(){
		$usuario=Auth::user();
		$albumes=$usuario->albumes;
		return view('albumes.mostrar',['albumes'=>$albumes]);
	}
  public function getCrearAlbum(){
    return view('albumes.crear-album');
  }
  public function postCrearAlbum(CrearAlbumRequest $request){
    $usuario=Auth::user();
		Album::create
		(
			[
				'nombre'=>$request->get('nombre'),
				'descripcion'=>$request->get('descripcion'),
				'usuario_id'=>$usuario->id,
			]
		);
		return redirect('/validado/albumes')->with('creado', 'El album ha sido creado');
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
