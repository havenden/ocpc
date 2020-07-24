<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvType extends Model
{
    protected $fillable = [
        'id', 'name','description'
    ];
    //
    public static function creatConvType(\Illuminate\Http\Request $request)
    {
        return ConvType::create([
            'id'=>$request->input('id'),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);

    }

    public static function updateConvType(\Illuminate\Http\Request $request, int $id)
    {
        $conv_type=ConvType::findOrFail($id);
        $conv_type->id=$request->input('id');
        $conv_type->name=$request->input('name');
        $conv_type->description=$request->input('description');
        return $conv_type->save();
    }
}
