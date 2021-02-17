@extends('layouts.admin')
@section('title', 'レビュー一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>レビュー一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ReviewController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ReviewController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ブランド</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">ブランド</th>
                                <th width="20%">商品名</th>
                                <th width="50%">レビュー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $review)
                                <tr>
                                    <th>{{ $review->id }}</th>
                                    <td>{{ \Str::limit($review->brand, 100) }}</td>
                                    <td>{{ \Str::limit($review->title, 100) }}</td>
                                    <td>{{ \Str::limit($review->review, 250) }}</td>
                                    <td>
                                    	<div>
                                    		<a href="{{ action('Admin\ReviewController@edit', ['id' => $review->id]) }}">編集</a>
                                    	</div>
                                    	<div>
                                    		<a href="{{ action('Admin\ReviewController@delete', ['id' => $review->id]) }}">削除</a>
                                    	</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection