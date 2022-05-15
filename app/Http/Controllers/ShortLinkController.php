<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\ShortLink;
use Auth;
use DB;
use Illuminate\Support\Str;
use URL;
use Illuminate\Support\Facades\Cache;
class ShortLinkController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    Description : list shortlinks
    Date        : 9/5/2022
    
    */
    public function index()
    {
        $id=Auth::user()->id;
        $shortLinks = ShortLink::with('users')->where('user_id',$id)->latest()->orderBy('id','desc')->get();
        return view('shorter_url.shortenLink', compact('shortLinks'));
    }
    
    /*
    Description : add new shortlinks
    Date        : 9/5/2022
    
    */
    public function new_url()
    {
    return view('shorter_url.add');
    }
    /*
    Description : store  data for short_links table
    Date        : 9/5/2022
    
    */
     public function store(Request $request)
    {
       
        $shortid=ShortLink::create([
        'title' => $request->title,
        'user_id' => Auth::user()->id,
        'url'=>$request->url,
        ]);
        if($shortid!=='')
        {
            $short_url=Str::random(6);
            $shortid->update([
                 'short_url'=>URL::to('/').'/'.$short_url
            ]);
        }
      return response()->json(['success'=>'Form is successfully submitted!']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($link)
    {
        $short_link=URL::to('/').'/'.$link;

        $find = ShortLink::where('short_url', $short_link)->first();
        $exist=isset($find)? $find:'';

        if($exist)
        {
        return redirect($find->url);
        }
        else
        {
        return 'not exists';

        }
   
    }
}