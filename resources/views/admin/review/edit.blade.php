@extends('layouts.admin')
@section('title', 'レビューの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レビュー編集</h2>
                <form action="{{ action('Admin\ReviewController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="brand">ブランド</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brand" value="{{ $review->brand }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $review->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="review">レビュー</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="review" rows="20">{{ $review->review }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $review->image_path }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($review->histories !=NULL)
                                @foreach ($review->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection