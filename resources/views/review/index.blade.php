@extends('layouts.front')

@section('content')
　　<div class="row">
　　    <div class="col-md-11">
            <div class="col-md-4 ml-auto serch">
                <form action="{{ action('ReviewController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
        
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                        <img src="{{ $headline->image_path }}">
                                </div>
                                <div class="brand p-2">
                                    <h1>ブランド：{{ str_limit($headline->brand, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title p-2">
                                <h1>商品名：{{ str_limit($headline->title, 70) }}</h1>
                            </div>
                            <div>
                                <h2 class="review mt-4">サイズ：{{ str_limit($headline->size, 10) }}</h2>
                                <h2 class="review">素材：{{ str_limit($headline->material, 100) }}</h2>
                                <h2 class="review">生地の厚さ：{{ str_limit($headline->thickness, 10) }}</h2>
                                <h2 class="review">透け感：{{ str_limit($headline->sheerness, 10) }}</h2>
                                <h2 class="review mt-4">レビュー：</h2>
                                <p class="review mx-auto mt-2">{{ str_limit($headline->review, 650) }}</p>
                                <div class="bottom">
                                <div class="point-box">    
                                <h2 class="review headline-point-title">投稿者プロフィール</h2>
                                
                                <p class="mx-auto mt-2 font-size">アカウント：{{ str_limit($headline->profile->name, 50) }}</p>
                                <p class="mx-auto mt-2 font-size">性別：{{ str_limit($headline->profile->gender, 50) }}</p>
                                <p class="mx-auto mt-2 font-size">身長：{{ str_limit($headline->profile->height, 50) }}cm</p>
                                <p class="mx-auto mt-2 font-size">体型：{{ str_limit($headline->profile->shape, 50) }}</p>
                                
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6 parent">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="brand p-2">
                                    {{ str_limit($post->brand, 150) }}
                                </div>
                                <div class="title mt-2">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="review">
                                <h2 class="review mt-4">サイズ：{{ str_limit($post->size, 10) }}</h2>
                                <h2 class="review">素材：{{ str_limit($post->material, 100) }}</h2>
                                <h2 class="review">生地の厚さ：{{ str_limit($post->thickness, 10) }}</h2>
                                <h2 class="review">透け感：{{ str_limit($post->sheerness, 10) }}</h2>
                                <h2 class="review mt-4">レビュー：</h2>
                                <p class="review mx-auto mt-2">{{ str_limit($post->review, 650) }}</p>
                                <div class="bottom">
                                <div class="point-box">    
                                <h2 class="review post-point-title">投稿者プロフィール</h2>
                                <p class="mx-auto mt-2 font-size">アカウント：{{ str_limit($post->profile->name, 50) }}</p>
                                <p class="mx-auto mt-2 font-size">性別：{{ str_limit($post->profile->gender, 50) }}</p>
                                <p class="mx-auto mt-2 font-size">身長：{{ str_limit($post->profile->height, 50) }}cm</p>
                                <p class="mx-auto mt-2 font-size">体型：{{ str_limit($post->profile->shape, 50) }}</p>
                                </div>
                                </div>
                                

                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                
                                    <img src="{{ $post->image_path }}">
                            
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection