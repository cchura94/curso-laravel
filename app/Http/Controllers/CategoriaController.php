<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Categoria;
use PDF;

class CategoriaController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->q){
            $categorias = Categoria::where("nombre", "like", "%".$request->q."%")->paginate(10);
        }else{
        // Listar
        //$categorias = DB::select("select * from categorias");
        //$categorias = DB::table("categorias")->where('nombre',"=",'ropa')->get();
        $categorias = Categoria::paginate(3);
        }
        
        
        //return view("admin.categoria.listar", ["categorias" => $categorias]);
        //return view("admin.categoria.listar")->with('categorias', $categorias);
        return view("admin.categoria.listar", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cargar el formulario (GET)
        return view("admin.categoria.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardar un recurso (POST)

        //Validacion el lado del servidor
        $request->validate([
            "nombre" => "required|min:2|max:100|unique:categorias"
        ]);

        //Guardar la información
        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return redirect("/admin/categoria")->with("ok", "Categoria Registrada");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Cargar datos por id (GET)
        $categoria = Categoria::find($id);
        return view("admin.categoria.mostrar", compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // cargar un formulario con un recurso (GET)
        $categoria = Categoria::find($id);
        return view("admin.categoria.editar", compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Modificar un recurso (PUT)
        //validar
        //mofificar
        $cat = Categoria::find($id);
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->descripcion;
        $cat->save();
        return redirect("/admin/categoria")->with('ok', "Categoria Modificada");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un recurso (DELETE)
        $cat = Categoria::find($id);
        $cat->delete();
        return redirect("/admin/categoria")->with("ok", "Categoria Eliminada");
    }

    
    public function reporte_pdf()
    {
        $categorias = Categoria::All();
              PDF::SetTitle('Reporte de Lista de Categorias');
              PDF::AddPage();
            
              PDF::SetFont('courier', 'B', 10);
		PDF::Cell(0, 1,'Sistema de Inventarios categorias',0,1,'C');	
		PDF::Cell(0, 2,'"Lista de Categorias"',0,1,'C');	
        PDF::SetFont('courier', 'B', 15);
        //PDF::SetTextColor(0,0,255);
        PDF::Cell(0, 15,'REPORTE LISTADO DE CATEGORIAS',0,1,'C');		
        	
        PDF::SetDrawColor(0,255,0);	
        PDF::Line(6,30,210,30);

        PDF::SetX(10);//inicio posicion del contenido
		PDF::SetY(55);//inicio posicion del contenido
		//PDF::writeHTML($html, true, false, true, false, '');
		PDF::SetFont('courier', 'B', 12);
		//PDF::Cell(0, 5,'DATOS PERSONALES',0,1,'L');
        PDF::SetFont('courier', 'B', 10);
        PDF::SetTextColor(0,0,0);
		PDF::Cell(0, 10,'Gestion: '. (date('Y')),0,1,'L');
        PDF::Cell(0, 5,'Fecha Actual: '. (date('d-m-Y H:i:s')),0,1,'L');
        
        PDF::SetXY(10, 80);
    $html='<table width="100%" border="1" style="padding:3px;">
    <thead>
    <tr>
    <th width="100px"><b>COD.</b></th>
    <th width="200px"><b>NOMBRE</b></th>
    <th width="250px"><b>DESCRIPCION</b></th>
    </tr>
    </thead>
    <tbody>';
    foreach($categorias as $cat){

            $html.='<tr>
            <td width="100px">'. $cat->id .'</td>
            <td width="200px">'. $cat->nombre .'</td>
            <td width="250px">'. $cat->descripcion .'</td>
            </tr>';
    }
         

    $html.='</tbody></table>';


    PDF::writeHTML($html, true, false, true, false, '');

    PDF::lastPage();
        //PDF::Output('my_file.pdf', 'D');
        
        PDF::setFooterCallback(function($pdf){

            PDF::Image('img/productos/python.png',10,8,50,20);
            PDF::Image('fondo.jpg',160,8,50,20);
			$pdf->SetY(-15);
			$pdf->SetFont('courier', 'I', 7);
		    /* establecemos el color del texto */
          	$pdf->SetTextColor(0,0,0);
            $pdf->SetX(10);
            $pdf->Cell(0, 10, 'El documento solo es valido si cuenta con las firmas y sellos correspondientes.',
                             0, false, 'L', 0, '', 0, false, 'T', 'M');

            $pdf->SetFont('courier', 'I', 10);
            $pdf->Cell(0, 10, 'Pag. '.$pdf->getAliasNumPage().
                             ' de '.
                             $pdf-> getAliasNbPages(),
                             0, false, 'R', 0, '', 0, false, 'T', 'M');

            $pdf->SetFont('courier', 'B', 6);
            $pdf->SetXY(10,262);
            //$pdf->Cell(0, 5, "[0, false, 'R', 0, '', 0, false, 'T', 'M');

            $pdf->SetDrawColor(0,0,255);
            /* dibujamos una linea roja delimitadora del pie de página */
          	$pdf->Line(10,266,205,266);

        });

        $style = array(
		    'border' => false,//borde 2
		    'vpadding' => 'auto',
		    'hpadding' => 'auto',
		    'fgcolor' => array(0,0,0),
		    'bgcolor' => false, //array(255,255,255)
		    'module_width' => 1, // width of a single module in points
		    'module_height' => 1 // height of a single module in points
		);
		PDF::SetFont('courier', 'B', 10);

        PDF::Ln();
		PDF::write2DBarcode('EMPRESA', 'QRCODE,H', 180, 45, 30, 30, $style, 'N');


              
              PDF::Output('Lista_categorias.pdf');
    }
}
