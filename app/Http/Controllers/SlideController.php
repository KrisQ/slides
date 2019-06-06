<?php

namespace App\Http\Controllers;
use App\Slide;

use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function store(Request $request){
        // return $request;
        $slide = new Slide;
        $slide->markdown = $request->markdown;
        $slide->save();
        return response([
            'status' => 'success',
            'data' => $slide
           ], 200);
    }
    public function read(){
        $slides = Slide::where('id', '>', 0)->paginate(1);
        return $slides;
    }
    
}
