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
    return view('inicio');
    //return view('welcome');
})->name("inicio");

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
})->name("acerca");

Route::get("/contactos", function(){
    return view("contacto");
})->name('contacto');

Route::get("/servicios", function(){
    return view("servicios");
})->name("servicio");


Route::get("/admin/categoria/reporte", "CategoriaController@reporte_pdf")->name("reporte_pdf");

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get("/", function(){
        return view("home");
    });
// Ruta con Controladores

Route::get("/persona", "PersonaController@listar")->name("lista_persona");
Route::get("/persona/crear", "PersonaController@crear");
Route::post("/persona", "PersonaController@guardar");
Route::get("/persona/{id}", "PersonaController@mostrar");
Route::get("/persona/{id}/editar", "PersonaController@editar");
Route::put("/persona/{id}", "PersonaController@modificar");
Route::delete("/persona/{id}", "PersonaController@eliminar");

//Crear 3 controladore
// 1. CategoriaController
// 2. ProductoController
// 3. ProveedorController
//-----
// php artisan make:controller CategoriaController -r

Route::resource("categoria", "CategoriaController");
Route::resource("producto", "ProductoController")->middleware("auth");
Route::resource("proveedor", "ProveedorController");
Route::resource("usuario", "UsuarioController");

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
