<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Profile;

class ReviewController extends Controller
{
    //
    
    
    public function index(Request $request) {
        $keyword = $request->keyword;
        if($keyword !='') {
            $posts = Review::where('brand', 'like', '%'.$keyword.'%')->orWhere('review', 'like', '%'.$keyword.'%')->orWhere('title', 'like', '%'.$keyword.'%')->orWhere('size', 'like', '%'.$keyword.'%')->orWhere('material', 'like', '%'.$keyword.'%')->orWhere('sheerness', 'like', '%'.$keyword.'%')->orWhere('thickness', 'like', '%'.$keyword.'%')->get();
        } else {
            $posts = Review::all()->sortByDesc('updated_at');
        }
        
        if(count($posts) > 0) {
    		$headline = $posts->shift();
    	} else {
    		$headline = null;
    	}
    	
    	
         
        return view('review.index', ['posts' => $posts, 'keyword' => $keyword, 'headline' => $headline]);
    }
}
