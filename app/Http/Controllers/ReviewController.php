<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    //
    // public function index(Request $request) {
    // 	$posts = Review::all()->sortByDesc('updated_at');
    	
    // 	if(count($posts) > 0) {
    // 		$headline = $posts->shift();
    // 	} else {
    // 		$headline = null;
    // 	}
    	
    // 	return view('review.index', ['headline' => $headline, 'posts' => $posts]);
    // }
    
    // public function index(Request $request) {
    //     $cond_title = $request->cond_title;
    //     if($cond_title !='') {
    //         // $posts = Review::where('brand', $cond_title)->get();
    //         $posts = Review::where('brand', 'like', '%'.$cond_title.'%')->get();
    //     } else {
    //         $posts = Review::all();
    //     }
    //     return view('admin.review.index', ['posts' => $posts,'cond_title' => $cond_title]);
    // }
    
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
