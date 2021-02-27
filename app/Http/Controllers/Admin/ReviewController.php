<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\History;
use App\Profile;
use Carbon\Carbon;


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
        
        // 素材複数選択
        $material = implode(",", $request->input('material',array()));
        $review->material = $material;
        
        unset($form['_token']);
        unset($form['image']);
        unset($form['material']);
        
        $review->fill($form);
        
        // $profile = Profile::find($review->profile()->id);
        $profile = Profile::find($review->profile->id);
        $review->profile_id = $profile->id;
         
        $review->save();
        
        
        return redirect('admin/review/create');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if($cond_title !='') {
            // $posts = Review::where('brand', $cond_title)->get();
            $posts = Review::where('brand', 'like', '%'.$cond_title.'%')->get();
        } else {
            $posts = Review::all();
        }
        return view('admin.review.index', ['posts' => $posts,'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request) {
        $review = Review::find($request->id);
        if(empty($review)) {
            abort(404);
        }
        return view('admin.review.edit', ['review' => $review]);
    }
    
    public function update(Request $request) {
        $this->validate($request, Review::$rules);
        $review = Review::find($request->id);
        $review_form = $request->all();
        if( $request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $review_form['image_path'] = basename($path);
        } else {
            $review_form['image_path'] = $review->image_path;
        }
        
        unset($review_form['image']);
        unset($review_form['_token']);
        
        $review->fill($review_form)->save();
        
        
        $history = new History;
        $history->review_id = $review->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/review');
        
    }
    
    public function delete(Request $request) {
        $review = Review::find($request->id);
        $review->delete();
        return redirect('admin/review');
    }
}
