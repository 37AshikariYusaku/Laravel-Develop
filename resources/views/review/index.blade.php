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
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
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
                                <h2 class="review mt-4">その他レビュー：</h2>
                                <p class="review mx-auto mt-2">{{ str_limit($headline->review, 650) }}</p>
                                
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
                            <div class="text col-md-6">
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
                                    <p class="mt-4">その他レビュー：</p>
                                    <p>{{ str_limit($post->review, 1500) }}</p>
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                            
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