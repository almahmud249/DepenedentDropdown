<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $dt=DB::table('departments')->get();
        return view('home',compact('dt'));
    }

 public function getDepartment(Request $request){

    // if($request->has('dpt_id')){
    //     return DB::table('doctors')->where('dpt_id',$request->input('dpt_id'));
    // }
    $id=$request->dpt_id;
    return DB::table('doctors')->where('dpt_id',$id)->get();

 }
}
