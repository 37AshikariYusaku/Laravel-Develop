@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">アカウント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>    
                        <select name="gender" class="col-md-3 label">
                         @foreach(config('gender') as $score)
                           <option value="" hidden>選択してください</option>  
                           <option value="{{ $score }}" @if(old('gender')) selected @endif>{{ $score }}</option>
                         @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="col-md-8 height">
                            <div>
                                <input type="number" step="0.1" class="form-control" name="height" value="{{ old('height') }}">
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
                    
                    
                    
                    
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="保存">
                </form>
            </div>
        </div>
    </div>
@endsection    