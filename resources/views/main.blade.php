@extends('layout')
@section('content')

    <input type="button" value="write" onclick="location.href='/create'">
        <div>
            <h3>목록</h3>
            {{ $data = $request => $id, $title }} {{-- 왜 안먹히는가? 못찾겠다 꾀꼬리 --}}
            @foreach ($posts as $post)
                Title : {{ $post -> title }}
            @endforeach
            <input type="button" onclick="location.href=''" value="edit">
            <input type="button" onclick="location.href=''" value="delete">
        </div>
@endsection