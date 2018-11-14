<?php namespace GestorImagenes2\Services;

use GestorImagenes2\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'pregunta' => 'required|max:255',
			'respuesta' => 'required|max:255',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */

	 public function create(array $data)
	 	{
	 		return User::create([
	 			'name' => $data['name'],
	 			'email' => $data['email'],
	 			'password' => bcrypt($data['password']),
	 			'pregunta' => $data['pregunta'],
	 			'respuesta' => $data['respuesta'],
	 		]);
	 	}

}
