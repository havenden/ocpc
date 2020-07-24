<?php

namespace App\Http\Controllers;

use App\ConvType;
use App\Http\Requests\storeConvTypeRequest;
use Illuminate\Http\Request;

class ConvTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('conv_type.index',[
            'convTypes'=>ConvType::select('id','name','description')->paginate(18)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conv_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeConvTypeRequest $request)
    {
        if (ConvType::creatConvType($request)) {
            return redirect()->route('conv_type.index')->with('success', '添加成功！');
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
        return view('conv_type.update',[
            'conv_type'=>ConvType::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeConvTypeRequest $request, $id)
    {
        if (ConvType::updateConvType($request,$id)) {
            return redirect()->route('conv_type.index')->with('success', '更新成功！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if (ConvType::destroy($id)) {
            return redirect($request->headers->get('referer'))->with('success', '删除成功！');
        }
    }
}
