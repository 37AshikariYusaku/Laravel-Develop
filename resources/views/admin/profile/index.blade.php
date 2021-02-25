@extends('layouts.admin')
@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール</h2>
        </div>
        
        <div class="row spacetop">
            <div class="list-news col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="30%">アカウント名</th>
                                <th width="15%">性別</th>
                                <th width="15%">身長</th>
                                <th width="15%">体型</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ \Str::limit($profile->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->gender, 20) }}</td>
                                    <td>{{ \Str::limit($profile->height, 20) }}　cm</td>
                                    <td>{{ \Str::limit($profile->shape, 20) }}</td>
                                    <td>
                                    	<div>
                                    		<a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                    	</div>
                                    	<div>
                                    		<a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
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