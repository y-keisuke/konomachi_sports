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
                <label for="image">活動写真</label>
                @if(!empty($image))
                    <figure>
                        <img src="{{ $image }}" alt="">
                    </figure>
                @endif
                <p class="mb-0">↓写真を投稿or変更する↓</p>
                <p class="mb-0" style="font-size: .7rem;">※写真は一枚までです。新しく投稿したら、古い写真は表示されません</p>
                <input id="image" type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} form-cont-none" name="image" value="{{ old('image', $post->image) }}">
                @if($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            <button class="btn btn-primary mb-2" type="submit">活動内容を更新</button>
        </form>
        <div class="back-link">
            <a href="{{ url('posts/' . $post->id) }}">→記事ページに戻る</a>
            <a href="{{ url('teams/' . $post->team_id) }}">→チームページに戻る</a>
        </div>
    </div>
@endsection
