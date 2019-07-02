@php($title = $user->name . 'のマイページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        {{-- ユーザー1件の情報 --}}
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
                <p class="col-md-10">{{ $user->age }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">性別:</p>
                <p class="col-md-10">{{ $user->sex }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">活動希望地域:</p>
                <p class="col-md-10">{{ $user->area }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">メールアドレス:</p>
                <p class="col-md-10">{{ $user->email }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ①:</p>
                <p class="col-md-10">{{ $user->sports1 }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ①経験年数:</p>
                <p class="col-md-10">{{ $user->sports_years1 }}年</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ②:</p>
                <p class="col-md-10">{{ $user->sports2 }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ②経験年数:</p>
                <p class="col-md-10">{{ $user->sports_years2 }}年</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">経験スポーツ③:</p>
                <p class="col-md-10">{{ $user->sports3 }}</p>
            </div>
            <div class="profile-list row">
                <p class="col-md-2">スポーツ③経験年数:</p>
                <p class="col-md-10">{{ $user->sports_years3 }}年</p>
            </div>
        </div>

        {{-- 編集ボタン --}}
        <div class="flex">
            {{--編集--}}
            <button class="btn btn-primary mr-4">
                <a href="{{ url('users/' . $user->id . '/edit') }}">編集</a>
            </button>
        </div>


        {{-- ユーザーの記事一覧--}}
        {{--@if(count($user->posts) > 0)--}}
            {{--<h2>チーム活動一覧</h2>--}}
            {{--<table class="table-responsive">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>タイトル</th>--}}
                    {{--<th>本文</th>--}}
                    {{--<th>投稿日</th>--}}
                    {{--<th>更新日</th>--}}


                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($user->posts as $post)--}}
                    {{--<tr>--}}
                        {{--<td><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a></td>--}}
                        {{--<td>{{ $post->body }}</td>--}}
                        {{--<td>{{ $post->created_at }}</td>--}}
                        {{--<td>{{ $post->updated_at }}</td>--}}
                        {{--<td nowrap>--}}
                            {{--<a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">編集</a>--}}
                            {{--@component('components.btn-del')--}}
                                {{--@slot('controller', 'posts')--}}
                                {{--@slot('id', $post->id)--}}
                                {{--@slot('name', $post->title)--}}
                            {{--@endcomponent--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{-- $user->posts->links() --}}
@endsection
