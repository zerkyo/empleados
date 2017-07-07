<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Empleados;
use App\Domicilios;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	

	/**
	* Consulta los Empleados
	* @return json
	**/
	public function empleados_json() {
				
		$empleados = DB::select('select * from empleados');

		$datos = array();		
		foreach ($empleados as $dato) {

			$datos[] = array('id' => $dato->id, 
							'nombre' => $dato->nombre,
							'email' => $dato->email,
							'codigo' => $dato->cod_domicilio,
							'botones' => '
								<button onclick="agregadom('.$dato->id.')"  type="button" class="btn btn-info btn-xs" style="margin:3px;"><i class="fa fa-check" aria-hidden="true"></i>Agrega Domicilio</button>
								<button type="button" onclick="ver('.$dato->id.')" class="btn ver btn-info btn-xs" style="margin:3px;"><i class="fa fa-remove" aria-hidden="true"></i>Ver</button>'
						);

		}		
		return json_encode($datos);		
	}

	/**
	*Crea el empleado
	* @return mensaje
	**/
	public function crea_empleado(Request $request){

				try{
			       $empleados = new Empleados;
							
				    $empleados->nombre = $request->input('nombre');
				    $empleados->email = $request->input('email');
				    $empleados->cod_domicilio = $request->input('codigo');		    				  
				    $empleados->save();
				    return 'Empleados Creado';						
			    }
			    catch(Exception $e){			   
			       echo $e->getMessage(); 
			    }														
	}	

	/**
	 * Muestra la información del empleado
	 *
	 * @return array
	 */
	public function informacion($id_empleado)
	{
		$empleado = Empleados::find($id_empleado);
				
		return view('datos', array('empleado' => $empleado));
				
	}

	/**
	*Crea el domicilio del empleado
	*@return mensaje
	**/
	public function agrega_domicilio(Request $request, $id){
			try{
			$domicilios = new Domicilios;
			$domicilios->empleado_id = $id;							
		    $domicilios->calle = $request->input('calle');
		    $domicilios->numero_exterior = $request->input('num_ext');
		    $domicilios->numero_interior = $request->input('num_int');
		    $domicilios->colonia = $request->input('colonia');
		    $domicilios->cp = $request->input('cp');		  
		    $domicilios->estado = $request->input('estado');  				  

		    $domicilios->save();
		    }
			    catch(Exception $e){			   
			}		   
		
			return 'Domicilio Creado';
	}


	/**
	*Consulta los domicilios del Empleado
	* @return json
	**/
	public function domicilio_json($id_empleado) {
				
		$domicilio = DB::select('select * from domicilios Where empleado_id = '. $id_empleado);

		$datos = array();		
		foreach ($domicilio as $dato) {

			$datos[] = array('calle' => $dato->calle, 
							'numero_exterior' => $dato->numero_exterior,
							'numero_interior' => $dato->numero_interior,
							'colonia' => $dato->colonia,
							'cp' => $dato->cp,
							'estado' => $dato->estado
						);

		}		
		return json_encode($datos);		
	}


}
