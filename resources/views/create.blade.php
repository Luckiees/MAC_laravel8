@extends('layout')
@section('content')
    <form method="POST" action="/list">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        {{-- <label for="uid">닉네임</label>
        <p><input type="text" name="uid" id="uid" placeholder="4~16자 이내로 쓰세요."></p> --}}
        <label for="title">제목</label>
        <p><input type="text" name="title" id="title"></p>
        <p><label for="content">내용</label></p>
        <p><textarea name="content" cols="30" rows="10"></textarea></p>
        <input type="submit" value="글쓰기">
        <input type="reset" value="초기화">
    </form>
@endsection