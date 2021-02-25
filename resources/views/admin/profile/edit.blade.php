@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">アカウント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>    
                        <select name="gender" class="col-md-3 label">
                         @foreach(config('gender') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('gender') == $profile->gender) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="height">身長</label>
                        <div class="col-md-3 height">
                            <div>
                                <input type="number" step="0.1" class="form-control" name="height" value="{{ $profile->height }}">
                            </div>    
                            <div class="cm">cm</div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">体型</label>    
                        <select name="shape" class="col-md-3 label">
                         @foreach(config('shape') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('shape') == $score) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection