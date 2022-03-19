<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ApiController extends Controller
{
    public function getAllUsers() {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function createUser(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            "massage" => "Registro inserido com sucesso"
        ]);
    }

    public function getUser($id) {
        if(User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }
    }

    public function updateUser(Request $request, $id) {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;

            $user->save();
    
            return response()->json([
                "message" => "Registro alterado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
            
        }
    }

    public function deleteUser($id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

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
