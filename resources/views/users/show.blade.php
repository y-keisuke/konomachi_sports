@php($title = $user->name . 'のマイページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        {{-- ユーザー1件の情報 --}}
        <h2>プロフィール</h2>
        <div class="profile-box">
            <div class="profile-list row">
                <p class="col-md-2">User ID:</p>
                <p class="col-md-10">{{ $user->id }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">名前:</p>
                <p class="col-md-10">{{ $user->name }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">年齢:</p>
                <p class="col-md-10">{{ emptyJudge($user->age, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">性別:</p>
                <p class="col-md-10">{{ emptyJudge($user->sex, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">活動希望地域:</p>
                <p class="col-md-10">{{ emptyJudge($user->area, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">メールアドレス:</p>
                <p class="col-md-10">{{ emptyJudge($user->email, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ①:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports1, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ①経験年数:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports_years1, '- ') }}年</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ②:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports2, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ②経験年数:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports_years2, '- ') }}年</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ③:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports3, '-') }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ③経験年数:</p>
                <p class="col-md-10">{{ emptyJudge($user->sports_years3, '- ') }}年</p>
            </div>
        </div>

        {{-- 編集ボタン --}}
        <div class="flex">
            {{--編集--}}
            <button class="btn btn-primary mr-4">
                <a href="{{ url('users/' . $user->id . '/edit') }}">編集</a>
            </button>
        </div>

        {{--ユーザーの所属するチーム--}}
        <h2>所属チーム</h2>
        @if($teams)
            @foreach($teams as $team)
                <a href="{{ url('teams/' . $team->id) }}"><p>{{ $team->area . 'の'. $team->sports . 'チーム' }}</p></a>
            @endforeach
        @else
            <p>-</p>
        @endif

        {{--お気に入り登録しているチーム--}}
        <h2>お気に入り登録をしているチーム</h2>
        @foreach($likes as $team)
            <a href="{{ url('teams/' . $team->id) }}"><p>{{ $team->area . 'の'. $team->sports . 'チーム' }}</p></a>
        @endforeach

        {{--フォローユーザー--}}
        <h2 id="follow">フォロー</h2>
        {{$following}}
        @if($following)
            <form action="{{ url('follows') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="submit" class="btn btn-primary" value="フォローを解除する">
            </form>
        @else
            <form action="{{ url('follows') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="submit" class="btn btn-primary" value="フォローする">
            </form>
        @endif

        <h3>{{ $user->name }}のフォローユーザー</h3>
        @foreach($follow as $follow_user)
            <a href="{{ 'users/' . $follow_user->id }}"><p>{{ $follow_user->name }}</p></a>
        @endforeach

        {{--フォロワーユーザー--}}
        <h3>{{ $user->name }}のフォロワーユーザー</h3>
        @foreach($followed as $followed_user)
            <a href="{{ 'users/' . $followed_user->id }}"><p>{{ $followed_user->name }}</p></a>
        @endforeach


    {{-- $user->posts->links() --}}
    </div>
@endsection
