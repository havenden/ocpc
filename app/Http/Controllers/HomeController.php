<?php

namespace App\Http\Controllers;

use App\Conv;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $convsCount['all']=Conv::select('id')->count();
        $convsCount['today']=Conv::select('id')->where('date',Carbon::now()->toDateString())->count();
        $convsCount['yesterday']=Conv::select('id')->where('date',Carbon::yesterday()->toDateString())->count();
        $convsCount['thisweek']=Conv::select('id')->where([
           [ 'date','>=',Carbon::now()->startOfWeek()->toDateString()],
           [ 'date','<=',Carbon::now()->endOfWeek()->toDateString()],
        ])->count();
        $convsCount['lastweek']=Conv::select('id')->where([
            [ 'date','>=',(new Carbon('last week'))->startOfWeek()->toDateString()],
            [ 'date','<=',(new Carbon('last week'))->endOfWeek()->toDateString()],
        ])->count();
        $convsCount['thismonth']=Conv::select('id')->where([
                [ 'date','>=',Carbon::now()->startOfMonth()->toDateString()],
                [ 'date','<=',Carbon::now()->endOfMonth()->toDateString()],
            ])->count();
        $convsCount['lastmonth']=Conv::select('id')->where([
            [ 'date','>=',(new Carbon('last month'))->startOfMonth()->toDateString()],
            [ 'date','<=',(new Carbon('last month'))->endOfMonth()->toDateString()],
        ])->count();
        return view('home',[
            'convsCount'=>$convsCount
        ]);
    }

    public function password(Request $request)
    {
        $user=Auth::user();
        if (!empty($request->input('password'))){
            $user->password=Hash::make($request->input('password'));
            $user->save();
        }
        return redirect()->back()->with('success','修改成功');
    }
}
