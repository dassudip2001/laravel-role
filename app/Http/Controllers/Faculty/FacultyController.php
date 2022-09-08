<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty=Faculty::all();
        return view('faculty.create',compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function create(Request $request)
   {
       try {
           $faculty=new Faculty;
//          $faculty->fac_name=$request->fac_name;
           $faculty->fac_code=$request->fac_code;
           $faculty->fac_title=$request->fac_title;
           $faculty->fac_designtion=$request->fac_designtion;
           $faculty->fac_join=$request->fac_join;
           $faculty->fac_retirement=$request->fac_retirement;            $faculty->fac_phone=$request->fac_phone;            $faculty->fac_status=$request->fac_status;
           $faculty->fac_description=$request->fac_description;
           $faculty->save();
           return redirect(route('faculty.index'));
           return [
               "message" => "Record created successfully.",

               "status" => 201,
               ];
           }catch (Exception $e)
           {
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
        $faculty=Faculty::find($id);
        return view('faculty.editform',compact('faculty'));

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
        $faculty= Faculty::find($id);
//        $faculty->fac_name=$request->fac_name;
        $faculty->fac_code=$request->fac_code;
        $faculty->fac_title=$request->fac_title;
        $faculty->fac_designtion=$request->fac_designtion;
        $faculty->fac_join=$request->fac_join;
        $faculty->fac_retirement=$request->fac_retirement;
        $faculty->fac_phone=$request->fac_phone;
        $faculty->fac_status=$request->fac_status;
        $faculty->fac_description=$request->fac_description;
        $faculty->save();
        return redirect(route('faculty.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::destroy($id);
        return redirect(route('faculty.index'));
    }
}
