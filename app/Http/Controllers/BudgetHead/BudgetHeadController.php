<?php

namespace App\Http\Controllers\BudgetHead;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BudgetHead;
use Mosquitto\Exception;

class BudgetHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budget=BudgetHead::all();
        return view('budget.create',compact('budget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $budget=new BudgetHead;
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('budget.index'));
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
        $budget=BudgetHead::find($id);
        return view('budget.edit',compact('budget'));
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
        try {
            $budget=BudgetHead::find($id);
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('budget.index'));

        } catch (Exception $e)
        {
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
        BudgetHead::destroy($id);
        return redirect(route('budget.index'));
    }
}
