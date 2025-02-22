<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('parent')
            // ->whereNull('parent_id')
            ->get();
        $data = DepartmentResource::collection($departments);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name           = $request->name;
        $department->parent_id      = $request->parent_id;
        $department->level          = $request->level;
        $department->employee_count = $request->employee_count;
        $department->ambassador_name = $request->ambassador_name;
        $department->created_at     = now();
        $department->updated_at     = now();
        $department->save();
        response()->json([
            'code' => 201,
            'message' => 'Departamento creado correctamente'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Department::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::find($id);
        $department->name           = $request->name;
        $department->parent_id      = $request->parent_id;
        $department->level          = $request->level;
        $department->employee_count = $request->employee_count;
        $department->ambassador_name = $request->ambassador_name;
        $department->updated_at     = now();
        $department->save();
        response()->json([
            'code' => 201,
            'message' => 'Departamento actualizado correctamente'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        if (!$department) return response()->json([
            'code' => 500,
            'message' => 'Departamento No encontrado'
        ]);

        $department->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Departamento eliminado correctamente'
        ]);
    }
}
