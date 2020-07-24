<?php

namespace App\Http\Controllers;

use App\Conv;
use App\Count;
use App\Project;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AidenController extends Controller
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ocpcUp(Request $request)
    {
        $click_id=$request->input('clickid');
        $project_id=$request->input('project_id');
        $conv_type_id=$request->input('conv_type_id');
        if (!empty($click_id)&&!empty($project_id)&&!empty($conv_type_id)){
            $conv=new Conv();
            $project=Project::findOrFail($project_id);
            $convdate=Carbon::now()->toDateString();
            $conv->date=$convdate;
            $conv->click_id=$click_id;
            $conv->conv_type_id=$conv_type_id;
            $conv->conv_name=$project->name;
            $conv->conv_value=$project->conv_value;
            $conv->keyword=$request->input('keyword');
            $conv->url=$request->header('referer');
            $conv->device=$request->input('device');
            //存入数据库
            $res=$conv->save();
            if ($res){
                $count=Count::findOrFail(1);
                $client = new Client();
                $responseDate = $client->request('POST', ' https://e.sm.cn/api/uploadConversions', [
                    'form_params' => [
                        'header' => [
                            'username' => $count->name,
                            'password' => $count->password,
                        ],
                        'body'=>[
                            'source'=>'0',
                            'data'=>[
                                'date'=>$convdate,
                                'click_id'=>$click_id,
                                'conv_type'=>$conv_type_id,
                                'conv_name'=>$conv->conv_name,
                                'conv_value'=>$conv->conv_value,
                            ]
                        ]
                    ]
                ]);
                return response()->json([
                    'status'=>1,
                    'header'=>$responseDate->getHeaders(),
                    'body'=>$responseDate->getBody(),
                ]);
            }
        }else{
            return response()->json(['status',0]);
        }


    }
}
