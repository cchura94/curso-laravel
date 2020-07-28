<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /*
    //Nombre de Tablas
    protected $table = "categorias";

    //Llave primaria
    protected $primaryKey = "id_cat";
    // Autoincrement
    public $incrementing = false;
    //Tipo de dato
    protected $keyType = 'string';

    // desctivar el timestamp de las tablas
    public $timestamps = false;
    */



    public function productos()
    {
        return $this->hasMany("App\Producto");
    }
}
