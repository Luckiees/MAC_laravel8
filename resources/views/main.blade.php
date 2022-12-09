@extends('layout')
@section('content')

    <input type="button" value="write" onclick="location.href='/create'">
        <div>
            <h3>목록</h3>
           <div>
            @foreach ($PostModel as $post)
            @foreach ($spectification->specification->title)
            {{ $specification->id }}
            <p>{{$post->title}}</p>
            <p>{{ $post->content }}</p>
            @endforeach
            <p>{{ $PostModel->userable_id }}</p>
            <p>{{ $PostModel->userable_type }}</p>
           </div>
            <input type="button" onclick="location.href='/edit'" value="edit">
            <input type="button" onclick="location.href=''" value="delete">
        </div>
@endsection