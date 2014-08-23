<?php

class UserController extends BaseController {

//Listar
	public function index()
	{   
        //Si el usuario que esta logeado es administrador muestra la lista de usuarios.
        if(Auth::user()->tipo == 'Administrador')
        {
            $usuarios = User::orderBy('nombre','asc')
                ->paginate();
            
            return View::make('usuarios.lista', compact('usuarios'));
        }
        //Sino muestra la informacion del usuario logeado.
        else
            return Redirect::route('verUsuario', array(Auth::user()->id));
	}

//Crear usuario
	public function crearUsuario()
	{
		$usuario = new User;
        //tipos de usuario
        $tipos = array(
            '' => '',
            '1' => 'Administrador',
            '2' => 'Asesor',
            '3' => 'Compras'
        );
        
        return View::make('usuarios.formulario', compact('usuario'), compact('tipos'));
	}

//Guardar
	public function guardarUsuario()
	{
        $usuario = new User;
        //Recogemos todos los datos del formulario el la variable datos
        $datos = Input::all();
        
        if($usuario->guardar($datos,'1'))// 1 = Accion crear bitacora
            return Redirect::route('usuarios');
        else
            return Redirect::back()->withInput()->withErrors($usuario->errores);
	}

//Ver
	public function verUsuario($id)
	{
        //Buscamos el usuario y lo guardamos en la variable $user
        $usuario = User::find($id);

        //Si no existe mandamos un 404
        if(is_null($usuario)) 
            App::abort(404);
        //Si existe lo mostramos
        return View::make('usuarios.ver', compact('usuario'));
	}

//Editar
	public function editarUsuario($id)
	{
        //Buscamos el usuario y lo guardamos en la variable $user
        $usuario = User::find($id);
        //Si no existe montramos un 404
        if(is_null($usuario)) 
            App::abort(404);
        //Verificamos si el usuario es admin para mostrarle las opciones de cambio de tipo
        if(Auth::user()->tipo == 'Administrador')
        {
            $tipos = array(
                '1' => 'Administrador',
                '2' => 'Asesor',
                '3' => 'Compras'
            );
        }
        //Si no es admin llenamos el campo de tipo de manera fija.
        elseif(Auth::user()->tipo == 'Compras')
            $tipos = array('3' => 'Compras');    
        
        elseif(Auth::user()->tipo == 'Asesor')
            $tipos = array('2' => 'Asesor');
        //Creamos la vista con los datos del usuario
        return View::make('usuarios.formulario', compact('usuario'), compact('tipos'));
	}

//Actualizar
	public function actualizarUsuario($id)
	{
        //Buscamos el usuario
        $usuario = User::find($id);
        
        if(is_null($usuario)) 
            App::abort(404);

        $datos = Input::all();

        if($usuario->guardar($datos,'2')) // 2 :Modificar para la bitacora.
            return Redirect::route('usuarios');
        else 
            return Redirect::back()->withInput()->withErrors($usuario->errores);
	}

//Eliminar
	public function eliminarUsuario($id)
    {

        //Buscamos el usuario
        $usuario = User::find($id);
        
        if (is_null($usuario))
        {
            App::abort(404);
        }
            //Se elimina el usuario
            $usuario->delete();
            //Creamos un nuevo registro en la bitacora
            $bitacora = new Bitacora;
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 1,
                'tabla_id' => $id,
                'accion' => 3
            );
            $bitacora->guardar($campos);

            return Redirect::route('usuarios');
    }

}