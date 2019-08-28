@php($title = $post->title . 'の編集ページ')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ url('posts/' . $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="team_id" value="{{ $post->team_id }}">
            @if($errors->has('user_id'))
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_id') }}</strong>
                        </span>
            @endif
            @if($errors->has('team_id'))
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('team_id') }}</strong>
                        </span>
            @endif
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" id="title" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title', $post->title) }}">
                @if($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('title') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="body">本文</label>
                <textarea name="body" id="body" rows="20" class="form-control @if($errors->has('body')) is-invalid @endif">{{ old('body', $post->body) }}</textarea>
                @if($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('body') }}
                    </span>
                @endif
            </div>
            {{-- 活動写真 --}}
            <div class="form-group">
                <label for="image" class="col-md-4 col-form-label text-md-left">活動写真</label>
                <div class="col-md-12">
                    @if(!empty($image))
                        <figure>
                            <img src="{{ $image }}" alt="">
                        </figure>
                    @endif
                    <input id="image" type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} form-cont-none" name="image" value="{{ old('image', $post->image) }}">
                    @if($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <button class="btn btn-primary mb-2" type="submit">活動内容を更新</button>
        </form>
        <a href="{{ url('posts/' . $post->id) }}">→記事ページに戻る</a>
    </div>
@endsection
