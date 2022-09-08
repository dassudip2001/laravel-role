<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use App\Models\CreateUser;
use Exception;
//use Illuminate\Support\Facades\DB;

class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        DB::table('create_users')
//            ->join('faculties','faculties.id',"=",'create_users.id')
//            ->join('users','users.id',"=",'create_users.id')
//            ->join('departments','departments.id','=','create_users.id')
//            ->get();
        $data=Department::all();
       return view('user.create',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
//               dd($request->all());
            $this->validate($request, [

                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'fac_code' => 'required|unique:faculties|max:50',
                'fac_title' => 'required',
                'fac_join' => 'required',

                'fac_retirement'=>'required',
                'fac_designtion' => 'required',
                'fac_phone' => 'required',
                'fac_status' => 'required',
                'fac_description' => 'required',
            ]);
            $fields=$request->only(['name','email','password'
              ,'fac_code','fac_title','fac_join','fac_retirement',
               'fac_designtion','fac_phone','fac_status','fac_description',
                'department_id',
            ]);
            $user = new User([
                'name'=>$fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
            $user->save();

            $faculty = new Faculty([

//                'fac_name' => $fields['fac_name'],
                'fac_code' => $fields['fac_code'],
                'fac_title' => $fields['fac_title'],
                'fac_designtion' => $fields['fac_designtion'],
                'fac_join' => $fields['fac_join'],
                'fac_retirement' => $fields['fac_retirement'],
                'fac_phone' => $fields['fac_phone'],

                'fac_status' => $fields['fac_status'],
                'fac_description' => $fields['fac_description'],

            ]);
            $faculty->save();

            $pivot=new CreateUser();
            $pivot->user_id=$user->id;
            $pivot->faculty_id=$faculty->id;
            $pivot->department_id=$fields['department_id'];
            $pivot->save();
            return redirect(route('usercreate.index'));
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
        return view('user.edit');
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
    }
}
