<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','conv_type_id','conv_value'
    ];
    //
    public static function creatProject(\Illuminate\Http\Request $request)
    {
        $project=new Project();
        $project->name=$request->input('name');
        $project->conv_type_id=$request->input('conv_type_id');
        $project->conv_value=!empty($request->input('conv_value'))?$request->input('conv_value'):1;
        $project->description=$request->input('description');
        return $project->save();
    }

    public static function updateProject(\Illuminate\Http\Request $request, int $id)
    {
        $project=Project::findOrFail($id);
        $project->name=$request->input('name');
        $project->conv_type_id=$request->input('conv_type_id');
        $project->conv_value=!empty($request->input('conv_value'))?$request->input('conv_value'):1;
        $project->description=$request->input('description');
        return $project->save();
    }
}
