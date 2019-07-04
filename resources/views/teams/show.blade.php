@php($title = $team->area . 'の'. $team->sports . 'チームのページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
    <h1>{{ $title }}</h1>
        {{-- ユーザー1件の情報 --}}
        <div class="team-info-box">
            <div class="team-info-list row">
                <p class="col-md-2">活動エリア:</p>
                <p class="col-md-10">{{ $team->area }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">年齢層:</p>
                <p class="col-md-10">{{ $team->age }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">募集レベル:</p>
                <p class="col-md-10">{{ $team->level }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">活動頻度:</p>
                <p class="col-md-10">{{ $team->frequency }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">HP:</p>
                <p class="col-md-10">{{ $team->hp }}</p>
            </div>
        </div>

        {{-- 編集・削除ボタン --}}
        <div class="flex mb-3">
            {{--編集--}}
            <button class="btn btn-primary mr-4">
                <a href="{{ url('teams/' . $team->id . '/edit') }}">編集</a>
            </button>

            {{--削除--}}
            @component('components.btn-del')
                @slot('controller', 'teams')
                @slot('id', $team->id)
                @slot('name', $team->area . 'の' . $team->sports . 'チーム')
            @endcomponent
        </div>

        <a href="{{ url('teams') }}">> チーム一覧に戻る</a>

        <div class="my-2">
            <a href="{{ url('posts/create') }}" class="btn btn-primary">活動状況を投稿</a>
        </div>

    </div><!-- /.container -->

@endsection
