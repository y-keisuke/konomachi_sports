@php($title = $post->title . 'の編集ページ')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ url('posts/' . $post->id) }}" method="post">
            @csrf
            @method('PUT')
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
                <textarea name="body" id="body" rows="10" class="form-control @if($errors->has('body')) is-invalid @endif">{{ old('body', $post->body) }}</textarea>
                @if($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('body') }}
                    </span>
                @endif
            </div>
            <button class="btn btn-primary" type="submit">活動内容を更新</button>
        </form>
    </div>
@endsection