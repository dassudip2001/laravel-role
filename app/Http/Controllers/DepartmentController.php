<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Department::all();
        return view('department.create',['department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $department=new Department;
        $department->name=$request->name;
        $department->code =$request->code;

        $department->description=$request->description;
        $department->save();
        return redirect(route('index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Department::find($id);
        return view('department.editform',['department'=>'$department']);
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
//        $department=Department::find($id);
//        $department->name=$request->name;
//        $department->code =$request->code;
//
//        $department->description=$request->description;
//        $department->save();
//        return redirect(route('index'));
        $reqData = $request->only(['name', 'description', 'code']);

        $pc =  Department::find($id);
        if ($pc == null) {
            abort(501, "Opps! There no record associate with this id $id");
        }
        if (array_key_exists('name', $reqData))
            $pc->name = $reqData['name'];
        if (array_key_exists('description', $reqData))
            $pc->description = $reqData['description'];
        if (array_key_exists('code', $reqData))
            $pc->code = $reqData['code'];
        try {
            $pc->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect(route('index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);
        return redirect(route('index'));
    }
}