<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Cache;
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

      $id=Auth::user()->id;
      $count_list=DB::table('short_links')->where('user_id',$id)->count();
      $count=isset($count_list)? $count_list:'';
      $shortLinks = ShortLink::with('users')->where('user_id',$id)->latest()->orderBy('id','desc')->get();
      return view('shorter_url.dashboard.list',compact('count','shortLinks'));

    }
}
