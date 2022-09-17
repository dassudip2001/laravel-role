<?php

namespace App\Http\Controllers\ProjectDetails;

use App\Http\Controllers\Controller;
use App\Models\BudgetHead;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\FundingAgency;
use App\Models\CreateUser;
use Illuminate\Support\Facades\DB;
use Exception;
class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

       $data2=DB::table('create_users')
            ->join('faculties','faculties.id',"=",'create_users.faculty_id')
            ->join('users','users.id',"=",'create_users.user_id')
            ->join('departments','departments.id','=','create_users.department_id')
            ->get();
        $budget=BudgetHead::all();
        $data=FundingAgency::all();
        return view('projectdetails.create',compact('data','data2','budget'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        try {
            $this->validate($request,[
                 'project_no'=>'required',
                 'project_title'=>'required',
                 'project_scheme'=>'required',
                 'project_duration'=>'required',
                 'project_total_cost'=>'required',

            ]);
            $fields=$request->only(['project_no','project_title','project_scheme',
                'project_duration','project_total_cost',
               'funding_agency_id','create_user_id','budget_id',

            ]);
            $project=new Project([
                'project_no'=>$fields['project_no'],
                 'project_title'=>$fields['project_title'],
                'project_scheme'=>$fields['project_scheme'],
                'project_duration'=>$fields['project_duration'],
                'project_total_cost'=>$fields['project_total_cost'],
            ]);
            $project->save();
            $pivot=new ProjectDetails();
            $pivot->project_id=$project->id;
            $pivot->funding_agency_id=$fields['funding_agency_id'];
            $pivot->create_user_id=$fields['create_user_id'];
            $pivot->budget_id=$fields['budget_id'];
            $pivot->save();
            return redirect(route('projectdetail.index'));

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
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {



        try {
            $pc=ProjectDetails::find($id);
            return view('projectdetails.edit',compact('pc'));
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
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request,[
                'project_no',
                'project_title',
                'project_scheme',
                'project_duration',
                'project_total_cost',
            ]);
//            $fields=$request->only([
//                'project_no',
//                'project_title',
//                'project_scheme',
//                'project_duration',
//                'project_total_cost',
//            ]);
            $pc=ProjectDetails::find($id);
            $fc=Project::find($pc->id);
            if ($pc==null){
                abort(501,"There no record found!!");
            }
            $fc->project_no=$request->project_no;
            $fc->project_title=$request->project_title;
            $fc->project_scheme=$request->project_scheme;
            $fc->project_duration=$request->project_duration;
            $fc->project_total_cost=$request->project_total_cost;
            $fc->save();
            return redirect(route('projectdetail.index'));
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
        try {
            $pc=ProjectDetails::find($id)->project_id;
            ProjectDetails::find($id)->delete();
            Project::find($pc)->delete();
            return redirect(route('projectdetail.index'))->with('success', 'Data Deleted Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
        //
    }
}
