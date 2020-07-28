<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = Categoria::where("nombre", "muebles")->first();

        $prod = new Producto;
        $prod->nombre = "Mesa de oficina";
        $prod->precio = 470;
        $prod->cantidad = 6;
        $prod->descripcion = "Mueble";
        $prod->categoria_id = $cat->id;
        $prod->proveedor_id = 1;
        $prod->save();
    }
}
