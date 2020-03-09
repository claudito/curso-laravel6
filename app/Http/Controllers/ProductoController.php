<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;


class ProductoController extends Controller
{
    //

	function index(Request $request){

	 try {
	 		

	 //Crear
	 	/*
	  Producto::create([

	 	'codigo'		=>'0002',
	 	'descripcion' 	=>'Galletas Soda',
	 	'cantidad'	    =>'10'

	 ]);*/

	 /*
	 Actualizar
	 Producto::where('id',2)
	 ->update([

	 	'codigo'	 =>'0002',
	 	'descripcion'=>'Galletas de Chocolate'

	 	]);*/

	 //Eliminar
	// Producto::where('id',2)->delete();

	 //return 'okey';

	 	//$result  = Producto::all();

	 	//$result  = Producto::find(4);

	 	//return $result;


	 	if($request->ajax()){

	 	$result = Producto::all();

	 	return array('data'=>$result);


	 	}

	 	return view('producto.index');


	 } catch (\Illuminate\Database\QueryException $e) {


	 	return  "Error:".$e->getMessage();
	 	
	 }

	




	// return 'Página de Registro de Productos';


	}



}
