<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;


class ReviewController extends Controller
{
    //
    public function add() {
    	return view('admin.review.create');
    }
    
    public function create(Request $request) {
        
        $this->validate($request, Review::$rules);
        
        $review = new Review;
        $form = $request->all();
        
        // 画像投稿
        $path = $request->file('image')->store('public/image');
        $review->image_path = basename($path);
        
        unset($form['_token']);
        unset($form['image']);
        
        $review->fill($form);
        $review->save();
        
        
        return redirect('admin/news/create');
    }
}
