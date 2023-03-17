<?php

namespace App\Http\Controllers;

use App\Models\Prouct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Test;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prod = Prouct::all();


        return response()->json([
            "result" => $prod
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $prod = new Prouct();

        if( //$request->_id !== null and
            $request->name !== null and
            $request->quantity !== null)
        {
            //$prod->_id = $request->_id;
            $prod->name = $request->name;
            $prod->quantity = $request->quantity;

            if($prod->save())
            {
                return response([
                    'message'=>'Se guardaron los datos correctamente'
                ]);
            }else{
                return response([
                    'message'=>'No se guardaron los datos'
                ]);
            }
        }else{
            return response([
                'message'=>'Campos nulos'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //dd($id);
        $prod = Prouct::where('_id', '=', $id)
                            ->first();
        if($prod != null)
        {
            return response([
                'data' => $prod
            ]);
        }else{
            return response([
                'message' => 'No se encontraron datos'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $prod = Prouct::find($id);
        
        if($prod != null){
            //$prod->_id = $request->_id;
            $prod->name = $request->name;
            $prod->quantity = $request->quantity;

            if($prod->save()){
                return response()->json([
                    'message'=>'Se editaron los registros correctamente'
                ]);
            }else{
                return response()->json([
                    'message'=>'No se pudieron editar los registros'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Datos nulos'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //dd('Hola');
        $prod = Prouct::find($id);

        if($prod != null){
            if($prod->delete()){
                return response([
                    'message'=>'Se elimino correctamente'
                ]);
            }else{
                return response([
                    'message'=>'No se pudo eliminar correctamente'
                ]);
            }
        }else{
            return response([
                'message'=>'No se encontro el producto'
            ]);
        }
    }
}
