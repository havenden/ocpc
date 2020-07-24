<?php

namespace App\Http\Controllers;

use App\ConvType;
use App\Count;
use App\Http\Requests\storeProjectRequest;
use App\Project;
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
        return view('project.index',[
            'conv_types'=>ConvType::select('id','name')->pluck('name','id')->toArray(),
            'projects'=>Project::select('id','name','conv_type_id','conv_value','description')->paginate(18)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create',[
            'conv_types'=>ConvType::select('id','name')->pluck('name','id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProjectRequest $request)
    {
        if (Project::creatProject($request)) {
            return redirect()->route('project.index')->with('success', '添加成功！');
        }
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
        return view('project.update',[
            'conv_types'=>ConvType::select('id','name')->pluck('name','id')->toArray(),
            'project'=>Project::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeProjectRequest $request, $id)
    {
        if (Project::updateProject($request,$id)) {
            return redirect()->route('project.index')->with('success', '更新成功！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request,$id)
    {
        if (Project::destroy($id)) {
            return redirect($request->headers->get('referer'))->with('success', '删除成功！');
        }
    }
}
