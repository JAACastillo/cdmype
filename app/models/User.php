 <?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	protected $table = 'users';
    public $errores;
    protected $perPage = 8;
    protected $softDelete = true;
    protected $hidden = array('password');
    protected $fillable = array(
    	'nombre',
    	'email',
    	'password',
    	'tipo'
    );
		
	/* Metodos Get */
		public function getAuthIdentifier()
		{
			return $this->getKey();
		}
		public function getAuthPassword()
		{
			return $this->password;
		}
		public function getReminderEmail()
		{
			return $this->email;
		}

		public function getRememberToken()
		{
		    return $this->remember_token;
		}

		public function setRememberToken($value)
		{
		    $this->remember_token = $value;
		}

		public function getRememberTokenName()
		{
		    return 'remember_token';
		}

	/* Guardar */
	
    	//Recibe dos parametros: los datos del usuario y la accion realizada para registrarla en la bitacora 
	    public function guardar($datos,$accion) 
	    {
	        //revisamos si datos son validos
	        if($this->validar($datos)) 
	        {
	        	//Se encripta la contraseña antes de guardarla
	            $datos['password'] = Hash::make($datos['password']);
	            //Si los datos son validos se llena el usuario y se guarda en la BD
	            $this->fill($datos);
	            $this->save();
	           
	            //Se capturar el Id del usuario guardado para registrarlo en la bitacora
	            $id = $this->id;

	            //Creamos la bitacora y guardamos los datos
	            $bitacora = new Bitacora;
	            $campos = array(
	                'usuario_id' => Auth::user()->id, //Recupera el Id del usuario logeado
	                'tabla' => 1,
	                'tabla_id' => $id,
	                'accion' => $accion
	            );
	            
	            //Se guarda la bitacora
	            $bitacora->guardar($campos);
	            return true;
	        }
	        
	        return false;
	    }

	/* Validación de Campos */

	    public function validar($datos) 
	    {
	        $reglas = array(
	            'nombre' => 'required|max:100',
	            'email' => 'email|required|max:75|unique:users',
	            'password' => 'required|min:6|confirmed',
	            'tipo' => 'required'
	        );        
	        
	        //Verificamos si el correo ya existe
	        if ($this->exists)

	            $reglas['email'] .= ',email,' . $this->id;
	    
	        else 
	            $reglas['password'] .= '|required';
	        
	        //Aplicamos las reglas
	        $validador = Validator::make($datos, $reglas);
	        
	        //Comprobamos la validacion
	        if ($validador->passes()) 
	            return true;
	        
	        //Si reglas que no se cumplen los almacenamos en la variable errores
	        $this->errores = $validador->errors();
	        return false;
	    }


	/* Relaciones */

		public function movimientos() 
	    {
			return $this->hasMany('Movimiento','usuario_id');
		}

		public function bitacoras() 
	    {
			return $this->hasMany('Bitacora','usuario_id');
		}

		public function capTerminos() 
	    {
			return $this->hasMany('CapTermino','usuario_id');
		}    

		public function atterminos() 
	    {
			return $this->hasMany('AtTermino','usuario_id');
		}

		public function atenciones() 
	    {
			return $this->hasMany('Atencion','usuario_id');
		}

	    public function historia() 
	    {
			return $this->hasMany('Historia', 'usuario_id');
		}

		public function asesorias(){
			return $this->hasMany('Asesoria', 'user_id');
		}

}