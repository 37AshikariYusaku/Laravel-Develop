<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    //
    public function index(Request $request) {
    	$posts = Review::all()->sortByDesc('updated_at');
    	
    	if(count($posts) > 0) {
    		$headline = $posts->shift();
    	} else {
    		$headline = null;
    	}
    	
    	return view('review.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
