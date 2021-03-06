<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\EstadoCotizacion;

class EstadoCotizacionController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = EstadoCotizacion::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editEstadoCotizacion"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteEstadoCotizacion"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('estadocotizacion.index');
    }


    public function store(Request $request)
    {
        EstadoCotizacion::updateOrCreate(['id' => $request->estadoCotizacion_id],
                ['estado_cotizacion' => $request->estado_cotizacion]);

        return response()->json(['success'=>'Estado de cotizacion guardado correctamente.']);
    }

    public function edit($id)
    {
        $estadoCotizacion = EstadoCotizacion::find($id);
        return response()->json($estadoCotizacion);
    }

    public function destroy($id)
    {
        try
        {
            $estadoCotizacion = EstadoCotizacion::find($id);
            if (empty($estadoCotizacion)) {
                Flash::error('Estado Cotización no encontrado');

                return redirect('/EstadoCotizacion');
            }

            $estadoCotizacion->delete($id);

            return response()->json(["ok"=>true]);
            // Flash::success("Se eliminó el tipo contacto");
            // return redirect("/tipocontacto");
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
            // Flash::success("No se puede eliminar tipo contacto");
            // return redirect("/tipocontacto");
        }

    }
    /* public function destroy($id)
    {
        $estadoCotizacion = EstadoCotizacion::find($id);
        $estadoCotizacion->delete();
        return response()->json(['success'=>'Estado de cotizacion eliminado correctamente.']);

        // EstadoCotizacion::find($id)->delete();
        // return response()->json(['success'=>'Estado de cotizacion eliminado correctamente.']);
    } */
}
