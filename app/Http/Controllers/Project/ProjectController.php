<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Exceptions;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project=Project::all();
        return view('project.create',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function create(Request $request)
    {
        abort_unless(auth()->user()->can('create_project'),403,'you dont have required authorization to this resource');

        try {
            $project=new Project;
            $project->project_no=$request->project_no;
            $project->project_title=$request->project_title;
            $project->project_scheme=$request->project_scheme;
            $project->project_duration=$request->project_duration;
            $project->project_total_cost=$request->project_total_cost;
            $project->save();
            return redirect(route('project.index'));


        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
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
        $project=Project::find($id);
        return view('project.edit',compact('project'));
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
        abort_unless(auth()->user()->can('edit_project'),403,'you dont have required authorization to this resource');

        try {
            $project=Project::find($id);
            $project->project_no=$request->project_no;
            $project->project_title=$request->project_title;
            $project->project_scheme=$request->project_scheme;
            $project->project_duration=$request->project_duration;
            $project->project_total_cost=$request->project_total_cost;
            $project->save();
            return redirect(route('project.index'));

        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
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
        abort_unless(auth()->user()->can('delete_project'),403,'you dont have required authorization to this resource');

        Project::destroy($id);
        return redirect(route('project.index'));

    }
}
