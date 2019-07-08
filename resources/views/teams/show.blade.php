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

        <h2>活動状況</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>タイトル</th>
                    <th>本文</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ Str::limit($post->body, 100 )}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{--チームに所属しているメンバー--}}
        <h2>チームメンバー</h2>
        @foreach($users as $user)
            <a href="{{ 'users/' . $user->id }}"><p>{{ $user->name }}</p></a>
        @endforeach

        {{--チームにいいねをしているユーザー--}}
        <h2 id="like">お気に入り登録をしているユーザー</h2>
        @if($like)
            <form action="{{ url('likes') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="team_id" value="{{ $team->id }}">
                <input type="submit" class="btn btn-primary" value="お気に入りを解除する">
            </form>
        @else
            <form action="{{ url('likes') }}" method="post">
                @csrf
                <input type="hidden" name="team_id" value="{{ $team->id }}">
                <input type="submit" class="btn btn-primary" value="お気に入り登録する">
            </form>
        @endif
        @foreach($likes as $user)
            <a href="{{ url('users/' . $user->id) }}"><p>{{ $user->name }}</p></a>
        @endforeach
    </div><!-- /.container -->

@endsection
