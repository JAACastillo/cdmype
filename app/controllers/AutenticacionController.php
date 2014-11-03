<?php

class AutenticacionController extends BaseController {


	//Mostramos el formulario de ingreso al sistema
    public function get_login()
    {
        if(Auth::check())
            return Redirect::to('/');

        else
            return View::make('login');
    }


    //Comprobamos los datos del usuario
    public function post_login()
    {

        //Optenemos los datos del formulario
        $datos = array(
            'email' => Input::get('correo'),
            'password' => Input::get('contrasena')
        );

        if(Auth::attempt($datos, Input::get('remember-me', 0)))
            return Redirect::to('/');
        else
            return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();

    }


    //CERRAR SESION
    public function get_logOut()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}
