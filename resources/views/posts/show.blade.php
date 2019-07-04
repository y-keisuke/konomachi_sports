@php($title = $post->title)

@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="post-title">{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    <div class="edit">
        <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">編集</a>
        @component('components.btn-del')
            @slot('controller', 'posts')
            @slot('id', $post->id)
            @slot('name', $post->title)
        @endcomponent
    </div>

    {{-- 記事内容 --}}
    <dl class="row mt-3">
        <dt class="col-md-1">投稿日</dt>
        <dd class="col-md-3">
            <time itemprop="dateCreated" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
        </dd>
        <dt class="col-md-1">更新日</dt>
        <dd class="col-md-3">
            <time itemprop="dateCreated" datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
        </dd>
    </dl>
    <h2>活動内容</h2>
    <div class="post-body">
        {{ $post->body }}
    </div>

    {{-- <a href="{{ url('teams/' . $team->id) }}">> チーム情報に戻る</a> --}}

@endsection
