<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas con Funcion Cerrada (Closhures)
Route::get("/hola", function(){
    echo "Hola Mundo desde las rutas de Laravel";
});

Route::get("/hola2", function(){
    return "Saludo dos";
});

Route::get("/nombres", function(){
    $nombres = ["Juan", "Cristian", "Ana", "Pedro"];
    return $nombres;
});

Route::get("/nombre", function(){
    return ["nombre" => 'Cristian', 'edad' => 25];
});

Route::get("/nombre/{nom}", function($n){

    return ["nombre" => $n, 'edad' => 25];

});

Route::get("/nombre/{nom}/edad/{ed}", function($n, $ed){

    return ["nombre" => $n, 'edad' => $ed];
    
});

//Rutas con Vistas
Route::get("/nosotros", function(){
    return view("acerca");
});

Route::get("/contactos", function(){
    return view("contacto");
});

Route::get("/servicios", function(){
    return view("servicios");
});


