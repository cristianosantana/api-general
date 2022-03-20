<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concessionaire;
use App\Models\Department;
use App\Models\ConcessionaireDepartment;

class ConcessionaireDepartmentController extends Controller
{
    public function create(Request $request) {
        $concessionaireDepartments = new ConcessionaireDepartment;
        $concessionaireDepartments->id_concessionaire = $request->id_concessionaire;
        $concessionaireDepartments->id_department = $request->id_department;
        
        $concessionaireDepartments->save();

        return response()->json([
            "massage" => "Registro inserido com sucesso"
        ]);
    }
}
