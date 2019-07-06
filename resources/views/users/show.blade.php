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
        {{ $user->teams }}

    {{-- $user->posts->links() --}}
    </div>
@endsection
