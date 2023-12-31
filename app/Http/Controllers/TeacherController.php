<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Meeting;
use Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $meet=Meeting::orderby('id','desc')->get();
      $id=Auth::user()->id;
      $t = Teacher::find($id);
      return view('teacher',compact('t','meet'));
    }
}
