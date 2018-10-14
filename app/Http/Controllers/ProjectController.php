<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects']=project::where('user_id',auth()->user()->id)->get();
        if (auth()->user()->isAdmin()){
            $data['projects']=project::all();
        }

        return view('project.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()){
            $data['users']=User::all();
            return view('project.create',$data);
        }
        return redirect('project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        if (auth()->user()->isAdmin()){
            project::create($request->all());
            return redirect('project')->with(['success'=>'Done Create Project']);
        }
        return redirect('project');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        if (auth()->user()->isAdmin() || $project->user_id === auth()->user()->id) {
            return view('project.show',compact('project'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        if (auth()->user()->isAdmin()){
            $data['users']=User::all();
            $data['project']=$project;

            return view('project.edit',$data);
        }
        return redirect('project');

    }

    /**
     * @param ProjectRequest $request
     * @param project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProjectRequest $request, project $project)
    {
        if (auth()->user()->isAdmin()){
            $project->update($request->all());
            return redirect('project')->with(['success'=>'Done update Project']);
        }
        return redirect('project');

    }

    /**
     * @param project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(project $project)
    {
        if (auth()->user()->isAdmin()){
            $project->delete();
            return redirect('project')->with(['success'=>'Done delete Project']);
        }
        return redirect('project');
    }
}
