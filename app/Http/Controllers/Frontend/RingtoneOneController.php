<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ringtone;

class RingtoneOneController extends Controller
{
    public function index(){
        echo "hello";die;
    	$ringtonesss = \App\Models\Ringtone::all();
    	//return view('welcome',$ringtonesss);
        return view('welcome', compact('ringtones'));
    }

    public function show($id,$slug){
    	$ringtone = Ringtone::where('id',$id)->where('slug',$slug)->first();
    	return view('show',compact('ringtone'));
    }
    public function downloadRingtone($id){
        $ringtone = Ringtone::find($id);
        $ringtonePath = $ringtone->file;
        $filePath = public_path('audio/').$ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return \Response::download($filePath);
    }

    public function category($id){
        $ringtones  = Ringtone::where('category_id',$id)->paginate(20);
        return view('ringtone-category',compact('ringtones'));
    }
   

   
}
