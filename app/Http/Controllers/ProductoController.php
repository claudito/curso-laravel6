<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;


class ProductoController extends Controller
{
    //

	function index(Request $request){

	 try {
	 		

	 	if($request->ajax()){

	 	$result = Producto::all();

	 	return array('data'=>$result);


	 	}

	 	//Carga de la vista
	 	return view('producto.index');


	 } catch (\Illuminate\Database\QueryException $e) {


	 	return  "Error:".$e->getMessage();
	 	
	 }



	}


	function agregar(Request $request){




	}

	function actualizar(Request $request){

		


	}


	function eliminar(Request $request){

		try {

	    Producto::where('id',$request->id)
	    ->delete();

		return array(

			'title' => 'Buen Trabajo',
			'text'  => 'Registro Eliminado',
			'icon'  => 'success'
 
		);

			
		} catch (\Illuminate\Database\QueryException $e) {

				
		return array(

			'title' => 'Error',
			'text'  => $e->getMessage(),
			'icon'  => 'error'
 
		);


		}
	
	}


	function consultar(Request $request){

		


	}












}
