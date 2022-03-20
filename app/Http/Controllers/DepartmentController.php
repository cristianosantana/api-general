<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function getAllDepartments() {
        $departments = Department::get()->toJson(JSON_PRETTY_PRINT);
        return response($departments, 200);
    }

    public function createDepartment(Request $request) {
        $department = new Department;
        $department->name = $request->name;
        $department->acronym = $request->acronym;
        
        $department->save();

        return response()->json([
            "massage" => "Registro inserido com sucesso"
        ]);
    }

    public function getDepartment($acronym) {
        if(Department::where('acronym', $acronym)->exists()) {
            $department = Department::where('acronym', $acronym)->get()->toJson(JSON_PRETTY_PRINT);
            return response($department, 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }
    }

    public function updateDepartment(Request $request, $id) {
        if (Department::where('id', $id)->exists()) {
            $department = Department::find($id);
            $department->name = is_null($request->name) ? $department->name : $request->name;
            $department->acronym = is_null($request->acronym) ? $department->acronym : $request->acronym;
            
            $department->save();
    
            return response()->json([
                "message" => "Registro alterado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);            
        }
    }

    public function deleteDepartment($id) {
        if(Department::where('id', $id)->exists()) {
            $department = Department::find($id);
            $department->delete();

            return response()->json([
                "message" => "Registro deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }    
    }

    public function getConcessionairesByDepartment($acronym) {
        if(Department::where('acronym', $acronym)->exists()) {
            $department = Department::where('acronym', $acronym)->get();
            $result = Department::find($department[0]->id);
            
            if($result->getDepartments()->get()->toJson(JSON_PRETTY_PRINT) != "[]") {
                $links = $result->getDepartments()->get()->toJson(JSON_PRETTY_PRINT);
            } else {
                return response()->json([
                    "message" => "Não há Concessionárias"
                ], 404);    
            }
                        
            return response($links, 200);
        } else {
            return response()->json([
                "message" => "Registro não encontrado"
            ], 404);
        }
    }
}
