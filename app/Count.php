<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $fillable = [
        'name', 'password','description'
    ];
    //
    public static function creatCount(\Illuminate\Http\Request $request)
    {
        $count=new Count();
        $count->name=$request->input('name');
        $count->password=$request->input('password');
        $count->description=$request->input('description');
        return $count->save();
    }

    public static function updateCount(\Illuminate\Http\Request $request, int $id)
    {
        $count=Count::findOrFail($id);
        $count->name=$request->input('name');
        $count->password=$request->input('password');
        $count->description=$request->input('description');
        return $count->save();
    }
}
