@extends('layout')
@section('content')
    <form method="POST" action="{{ route('update',['id' => $Post->id]) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <textarea name="content" rows="4">{{ $Post->content}}</textarea>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <input type="submit" value="수정하기"/>
        <input type="button" value="삭제하기" onclick="location.href='alert('해당 글을 삭제하시겠습니까?');'"/>
    </form>
@endsection