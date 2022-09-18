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
        $createUser= CreateUser::all();
//        $faculty=Faculty::all();
        $data=Department::all();
       return view('user.create',compact('data','createUser'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
       abort_unless(auth()->user()->can('create_user'),403,'you dont have required authorization to this resource');
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
            return redirect(route('usercreate.index'))->with('success','User Created Successfully');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $createUser= CreateUser::with(
                [
                    'user' => function ($q) {
                        $q->select(['id', 'name', 'email',]);
                    },
                    'faculty' => function ($q) {
                        $q->select(['id', 'fac_code', 'fac_title','fac_designtion',
                            'fac_join','fac_retirement','fac_phone','fac_status','fac_description']);
                    },
                    'department' => function ($q) {
                $q->select(['id',  'dept_code']);
            }
                ]
            )->get();
//             return CreateUser::where('user_id',$id)->first();
//            User::where('id',$fc['user_id'])->get();
//            Faculty::where('id',$fc['faculty_id'])->get();
//            CreateUser::where('id',$fc['id'])->get();
//            $user_pivot= CreateUser::find($id);
//            Faculty::where('id',$user_pivot['faculty_id'])->get();
//            $fc=CreateUser::find($id)->faculty_id;
//            $uc=CreateUser::find($id)->user_id;
//            create user delete
//            return CreateUser::find($id);
//           echo "$user_pivot";
//          faculty Delete
//          return Faculty::find($fc)->get();
//            user delete
//            User::find($uc)->get();

//            return DB::table('create_users')->find($id);
//            ->join('faculties','faculties.id',"=",'create_users.faculty_id')
//            ->join('users','users.id',"=",'create_users.user_id')
//            ->join('departments','departments.id','=','create_users.id')
//            ->get($id);
            return view('user.edit',compact('createUser'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {

        dd($request->all());

        $user_pivot=CreateUser::find($id);
        if ($user_pivot==null){
            return response()->json("user not found ",404);
        }
        // $this->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'password' => 'required|string|confirmed|min:8',
        //     'fac_phone'=>'required' ,
        //     'fac_description'=>'required' ,
        //     ]);
        //     $fields=$request->only(['name','password',
        //         'fac_phone','fac_description',
        //     ]);
        try {
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

            


////            update users
//           $user->name=$fields['name'];
//           $user->password=
//           $user->save();
//            'email' => $fields['email'],
//            'password' => bcrypt($fields['password']),

//            $user = User::find([
//                'name'=>$fields['name'],
//                'email' => $fields['email'],
//                'password' => bcrypt($fields['password']),
//            ]);
//            $user->save();
//            $faculty = Faculty::find([
//
////                'fac_name' => $fields['fac_name'],
//                'fac_code' => $fields['fac_code'],
//                'fac_title' => $fields['fac_title'],
//                'fac_designtion' => $fields['fac_designtion'],
//                'fac_join' => $fields['fac_join'],
//                'fac_retirement' => $fields['fac_retirement'],
//                'fac_phone' => $fields['fac_phone'],
//
//                'fac_status' => $fields['fac_status'],
//                'fac_description' => $fields['fac_description'],
//
//            ]);
//            $faculty->save();
//            $pivot=CreateUser::find($id);
//            $pivot->user_id=$user->id;
//            $pivot->faculty_id=$faculty->id;
//            $pivot->department_id=$fields['department_id'];
//            $pivot->save();
            return redirect(route('usercreate.index'))->with('success','User Update Successfully');
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
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
//        $fc = CreateUser::find($id)->user_id;
//        Account::find($id)->delete();
//        Contact::find($fc)->delete();
////        $data2=DB::table('create_users')
////            ->join('faculties','faculties.id',"=",'create_users.faculty_id')
////            ->join('users','users.id',"=",'create_users.user_id')
////            ->join('departments','departments.id','=','create_users.department_id')
////            ->get();
//        $data =DB::table('create_users')
//            ->join('faculties','faculties.id',"=",'create_users.faculty_id')
//             ->join('users','users.id',"=",'create_users.user_id')
//             ->join('departments','departments.id','=','create_users.department_id')
//            ->where('create_users.id', $id);
//            DB::table('faculties')->where('faculty_id', $id)->delete();
//            DB::table('users')->where('user_id', $id)->delete();
////            DB::table('departments')->where('department_id', $id)->delete();
//            $data->delete();
        try {
//            create user and faculty
//            $createUser = CreateUser::where('user_id',$id)->first();
//            User::where('id',$createUser['user_id'])->delete();
//            Faculty::where('id',$createUser['faculty_id'])->delete();
//            CreateUser::where('id',$createUser['id'])->delete();
////            create user and user
             $fc=CreateUser::find($id)->faculty_id;
            $uc=CreateUser::find($id)->user_id;
//            create user delete
            CreateUser::find($id)->delete();
//            faculty Delete
            Faculty::find($fc)->delete();
//            user delete
            User::find($uc)->delete();
            return redirect(route('usercreate.index'))->with('success', 'User Deleted Successfully');

        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
