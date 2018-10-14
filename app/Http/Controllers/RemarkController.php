<?php

namespace App\Http\Controllers;

use App\remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "project_id" => 'required|exists:projects,id',
            "body" => "required|string"
        ])->validate();
        $request['user_id']=auth()->user()->id;
        remark::create($request->all());
    return  redirect()->back()->with(['success'=>'Done create remake on project']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function show(remark $remark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function edit(remark $remark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $remarkid)
    {

        $validator=Validator::make($request->all(),[
            'updateRemark'=>'required|string',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->first()]);
        }
        $remark=remark::find($remarkid);

        $remark->update([
            'body'=>$request->updateRemark,
            'user_id'=>auth()->user()->id
        ]);
        return response()->json(['success'=>$remark->body],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function destroy($remarkId)
    {
        remark::findOrfail($remarkId)->delete();
        return redirect()->back()->with(['success'=>'Done Delete remark from project']);
    }
}
