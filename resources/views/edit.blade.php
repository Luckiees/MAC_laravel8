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
        <input type="submit" value="업데이트"/>
        <input type="button" value="뒤로가기" onclick="location.href='{{ route('index')}}'"/>
    </form>
@endsection