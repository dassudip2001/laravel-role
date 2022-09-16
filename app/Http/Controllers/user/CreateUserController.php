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


class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//

//         return DB::table('create_users')
//            ->Join('faculties','create_users.id', '=','create_users.faculty_id')
//            ->join('users','create_users.id','=','create_users.user_id')
//            ->join('departments','create_users.id','=','create_users.department_id')->get();

        $data=Department::all();
       return view('user.create',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
               'fac_designtion','fac_phone','fac_status','fac_description','department_id',

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $createUser=CreateUser::find($id);
        return view('user.edit',compact('createUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request,[
                'name',
                'email',
                'password',
                'fac_code' ,
                'fac_title' ,
                'fac_join' ,
                'fac_retirement',
                'fac_designtion' ,
                'fac_phone' ,
                'fac_status' ,
                'fac_description' ,
            ]);
            $fields=$request->only(['name','email','password'
                ,'fac_code','fac_title','fac_join','fac_retirement',
                'fac_designtion','fac_phone','fac_status','fac_description','department_id',

            ]);
            $user = User::find([
                'name'=>$fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
            $user->save();
            $faculty = Faculty::find([

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
            $pivot=CreateUser::find($id);
            $pivot->user_id=$user->id;
            $pivot->faculty_id=$faculty->id;
            $pivot->department_id=$fields['department_id'];
            $pivot->save();
            return redirect(route('usercreate.index'));
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
//        CreateUser::destroy($id);
        return redirect(route('usercreate.index'));
    }
}
