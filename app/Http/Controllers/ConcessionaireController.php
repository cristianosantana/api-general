<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concessionaire;

class ConcessionaireController extends Controller
{
    public function getAllConcessionaires() {
        $concessionaires = Concessionaire::get()->toJson(JSON_PRETTY_PRINT);
        return response($concessionaires, 200);
    }

    public function createConcessionaire(Request $request) {
        $concessionaire = new Concessionaire;
        $concessionaire->name = $request->name;
        $concessionaire->cnpj = $request->cnpj;
        
        $concessionaire->save();

        return response()->json([
            "massage" => "Registro inserido com sucesso"
        ]);
    }

    public function getConcessionaire($cnpj) {
        if(Concessionaire::where('cnpj', $cnpj)->exists()) {
            $concessionaire = Concessionaire::where('cnpj', $cnpj)->get()->toJson(JSON_PRETTY_PRINT);
            return response($concessionaire, 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }
    }

    public function updateConcessionaire(Request $request, $id) {
        if (Concessionaire::where('id', $id)->exists()) {
            $concessionaire = Concessionaire::find($id);
            $concessionaire->name = is_null($request->name) ? $concessionaire->name : $request->name;
            $concessionaire->cnpj = is_null($request->cnpj) ? $concessionaire->cnpj : $request->cnpj;
            
            $concessionaire->save();
    
            return response()->json([
                "message" => "Registro alterado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);            
        }
    }

    public function deleteConcessionaire($id) {
        if(Concessionaire::where('id', $id)->exists()) {
            $concessionaire = Concessionaire::find($id);
            $concessionaire->delete();

            return response()->json([
                "message" => "Registro deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }    
    }
}
