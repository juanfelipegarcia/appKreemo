<?php

namespace App\Http\Controllers;
use Flash;
use DataTables;

use Illuminate\Http\Request, Response;

use App\Models\Obra;



class ObraController extends Controller
{
    public function index()
    {
        return view('obra.index');
    }

    public function listar(Request $request){

        $obra = Obra::all();
        //dd($obra);

        return DataTables::of($obra)
        ->addColumn('editar', function ($obra) {
            return '<a class="btn btn-primary btn-sm" href="/obra/editar/'.$obra->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('ver', function ($obra) {
            return '<a class="btn btn-secondary btn-sm" href="/obracontacto/">Ver Contactos</a>';
        })
        ->rawColumns(['editar','ver'])
        ->make(true);
    }

    public function create(){

        $obra = Obra::all();

        return view('obra.create', compact('obra'));
    }

    public function save(Request $request){
        //dd('ruta ok');

        $request->validate(Obra::$rules);
        $input = $request->all();

        try {

            Obra::create([
                "nombre" => $input["nombre"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],

            ]);

            Flash::success("Registro éxitoso de obra");
            return redirect("/obra");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/obra/crear");
        }
    }

    public function edit($id){

        

        $obra = Obra::find($id);

        if ($obra==null) {

            Flash::error("Obra no encontrada");
            return redirect("/obra");
        }
        //else{
            return view("obra.edit", compact("obra"));
        // }

        // $where = array('id' => $id);
        // dd($where);
        // $obra = Obra::where($where)->first();
        // //Flash::success("Se modifico el cliente.");
        // return Response::json($obra);

    }

    public function update(Request $request){

        $request->validate(Obra::$rules);
        $input = $request->all();

        try {

            $obra = Obra::find($input["id"]);

            if ($obra==null) {
                Flash::error("Obra no encontrada");
                return redirect("/obra");
            }

            $obra->update([
                "nombre" => $input["nombre"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],
            ]);

            Flash::success("Se modifico la obra");
            return redirect("/obra");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/obra");
        }
    }

    public function destroy($id){

        // SELECT id FROM `obracontacto` WHERE idobra = 1

        //dd($id);

        try
        {
            $obra = Obra::find($id);

            if (empty($obra)) {
                Flash::error('Obra no encontrada');
                return redirect('/obracontacto/listar');
            }

            $obra->delete($id);
            return response()->json(["ok"=>true]);
            //Flash::success('Obra ('.$obra->nombre. ') eliminada.');
            // return redirect('/cliente');
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
            //Flash::success('No puedes eliminar este cliente.');
            // return redirect("/cliente");
        }
    }

}
