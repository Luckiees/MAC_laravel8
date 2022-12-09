@extends('layout')
@section('content')
    <form method="POST" action="/show">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <h1>{{ $PostModel->title }}</h1>
        <article>
            {{ $PostModel->content }}
        </article>
        <article>
           <a href="<?php echo route('show', ['id' =>1]); ?>"></a>       
           {{-- /show/{id}를 ->name('show.show')를 통해 라우터 이름 지정. 클릭 시 해당 id값이 url에 출력되게 된다. --}}
        </article>
        <div>
            <h3>
              <a href="{{ route('edit', $PostModel->id) }}" class="">글 수정하기</a>  
              <form method="POST" action="{{ route('destroy', $post->id) }}">
                <input type="hidden" name="token" value="{{ csrf_token() }}">
                <input type="hidden" name="method" value="delete">
                <button class="btn">글 삭제하기</button>
              </form>
              <a href="{{ route('index') }}" class="btn">목록으로</a>
            </h3>
        </div>
    </form>