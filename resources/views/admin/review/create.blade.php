<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->

<!--        <title>MyNews</title>-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1>Myニュース作成画面</h1>-->
<!--    </body>-->
<!--</html>-->

@extends('layouts.admin')

@section('title', 'レビュー投稿')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レビュー投稿</h2>
                <form action="{{ action('Admin\ReviewController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ブランド</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">サイズ</label>    
                        <select name="size" class="col-md-3 label">
                         @foreach(config('size') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('size')) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group row">
                           <label class="col-md-2 ml-10">素材</label>
                           <div class="check col-md-6">
                               @foreach(config('material') as $key => $score)
                                   <input type="checkbox" id="{{ $key }}" name="material[]" value="{{ $score }}" class="check" @if(old('material')) selected @endif>
                                   <label for="{{ $key }}">{{ $score }}</label>
                               @endforeach
                           </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">生地の厚さ</label>    
                        <select name="thickness" class="col-md-3 label">
                         @foreach(config('thickness') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('thickness')) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2">透け感</label>    
                        <select name="sheerness" class="col-md-3 label">
                         @foreach(config('sheerness') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('sheerness')) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">その他レビュー</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="review" rows="10">{{ old('review') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
    
   
@endsection    

