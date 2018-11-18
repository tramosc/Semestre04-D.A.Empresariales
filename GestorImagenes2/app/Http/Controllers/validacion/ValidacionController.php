<?php namespace GestorImagenes2\Http\Controllers\validacion;

use GestorImagenes2\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use GestorImagenes2\Http\Requests\IniciarSesionRequest;
use GestorImagenes2\Http\Requests\RecuperarContrasenaRequest;
use GestorImagenes2\Usuario;



class ValidacionController extends Controller {

		/**
		 * The Guard implementation.
		 *
		 * @var \Illuminate\Contracts\Auth\Guard
		 */
		protected $auth;

		/**
		 * The registrar implementation.
		 *
		 * @var \Illuminate\Contracts\Auth\Registrar
		 */
		protected $registrar;

		public function __construct(Guard $auth, Registrar $registrar)
			{
				$this->auth = $auth;
				$this->registrar = $registrar;

				$this->middleware('guest', ['except' => 'getSalida']);
			}
		/**
		 * Show the application registration form.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getRegistro()
		{
			return view('validacion.registro');
		}

		/**
		 * Handle a registration request for the application.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function postRegistro(Request $request)
		{
			$validator = $this->registrar->validator($request->all());
			if ($validator->fails())
			{
				$this->throwValidationException(
					$request, $validator
				);
			}

			$this->auth->login($this->registrar->create($request->all()));
			return redirect($this->redirectPath());
		}

		/**
		 * Show the application login form.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getInicio()
		{
			return view('validacion.inicio');
		}

		/**
		 * Handle a login request to the application.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function postInicio(IniciarSesionRequest $request)
		{

			//$this->validate($request, [
			//	'email' => 'required|email', 'password' => 'required',
			//]);

			$credentials = $request->only('email', 'password');

			if ($this->auth->attempt($credentials, $request->has('remember')))
			{
				return redirect()->intended($this->redirectPath());
			}

			return redirect($this->loginPath())
						->withInput($request->only('email', 'remember'))
						->withErrors([
							'email' => $this->getFailedLoginMessage(),
						]);
		}

		/**
		 * Get the failed login message.
		 *
		 * @return string
		 */
		protected function getFailedLoginMessage()
		{
			return 'email o contraseña incorrectos.';
		}

		/**
		 * Log the user out of the application.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getSalida()
		{
			$this->auth->logout();

			return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
		}

		/**
		 * Get the post register / login redirect path.
		 *
		 * @return string
		 */
		public function redirectPath()
		{
			if (property_exists($this, 'redirectPath'))
			{
				return $this->redirectPath;
			}

			return property_exists($this, 'redirectTo') ? $this->redirectTo : '/inicio';
		}

		/**
		 * Get the path to the login route.
		 *
		 * @return string
		 */
		public function loginPath()
		{
			return property_exists($this, 'loginPath') ? $this->loginPath : '/validacion/inicio';
		}
		public function getRecuperar(){
			return view('validacion.recuperar');
		}
		public function postRecuperar(RecuperarContrasenaRequest $request){
			$pregunta=$request->get('pregunta');
			$respuesta=$request->get('respuesta');
			$email=$request->get('email');
			$usuario=Usuario::where('email', '=', $email)->first();

			if ($pregunta===$usuario->pregunta && $respuesta ===$usuario->respuesta) {
				$contraseña=$request->get('password');
				$usuario->password=bcrypt($contraseña);
				$usuario->save();
				return redirect('/validacion/inicio')->with(['recuperada'=>'La contraseña se cambio. Inicia sesion']);
			}
			return redirect('/validacion/recuperar')->withInput($request->only('email', 'pregunta'))
			->withErrors(['pregunta'=>'La pregunta o respuesta ingresada no coinciden']);
		}

	}
