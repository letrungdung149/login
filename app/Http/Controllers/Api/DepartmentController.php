<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class DepartmentController extends Controller
{
    private $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->department->all();
        return response()->json([
            'code' => 200,
            'data' => $departments,
            'message' => 'success'
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'root' => 'required',
        ]);
        $departmentCreate = Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'root' => $request->root,
        ]);
        Department::where('id', $departmentCreate->id)->update([
            'root' => $request->root . '/' . $departmentCreate->id
        ]);
        return response()->json([
            'code' => 200,
            'data' => $departmentCreate,
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        try {
            $this->department->where('id', $department->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'root' => $request->root,
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $departments = Department::where("root", 'like', $department->root . '%')->get();
        $departments->each->delete();
        return \response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
