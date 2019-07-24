@php($title = $team->area . 'の'. $team->sports . 'チームのページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
    <h1>{{ $title }}</h1>
        {{-- ユーザー1件の情報 --}}
        <div class="team-info-box">
            <div class="team-info-list row">
                <p class="col-md-2">活動エリア：</p>
                <p class="col-md-10">{{ emptyJudge($team->area, '-') }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">年齢層：</p>
                <p class="col-md-10">{{ emptyJudge($team->age, '-') }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">募集レベル：</p>
                <p class="col-md-10">{{ emptyJudge($team->level, '-') }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">活動頻度：</p>
                <p class="col-md-10">{{ emptyJudge($team->frequency, '-') }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">活動曜日：</p>
                <p class="col-md-10">{{ emptyJudge($team->weekday, '-') }}</p>
            </div>
            <div class="team-info-list row">
                <p class="col-md-2">HP：</p>
                <p class="col-md-10">{{ emptyJudge($team->hp, '-') }}</p>
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

        <form action="{{ url('posts/create') }}" class="my-2">
            <input type="hidden" name="team_id" value="{{ $team->id }}">
            <input type="submit" class="btn btn-primary" value="活動状況を投稿">
        </form>

        {{--活動状況--}}
        <section>
            <h2 class="mt-4">活動状況</h2>
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
                        @if($loop->iteration < 6)
                            <tr>
                                <td><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ Str::limit($post->body, 100 )}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{url('posts?team_id=' . $team->id)}}">【活動状況一覧】</a>
        </section>

        {{--チームに所属しているメンバー--}}
        <h2 class="mt-4">チームメンバー</h2>
        @if(count($users) > 0)
            <ul>
                @foreach($users as $user)
                    <li><a href="{{ 'users/' . $user->id }}"><p>{{ $user->name }}</p></a></li>
                @endforeach
            </ul>
        @else
            <p class="ml-2">チームーメンバーはいません</p>
        @endif

        {{--チームにいいねをしているユーザー--}}
        <h2 id="like" class="mt-4">お気に入り登録をしているユーザー</h2>
        <form action="{{ url('likes') }}" method="post" class="mb-2">
            @csrf
            <input type="hidden" name="team_id" value="{{ $team->id }}">
            @if($like)
                @method('DELETE')
                <input type="submit" class="btn btn-primary" value="お気に入りを解除する">
            @else
                <input type="submit" class="btn btn-primary" value="お気に入り登録する">
            @endif
        </form>
        @if(count($likes) > 0)
            <ul>
                @foreach($likes as $user)
                    <li><a href="{{ url('users/' . $user->id) }}"><p>{{ $user->name }}</p></a></li>
                @endforeach
            </ul>
        @else
            <p class="ml-2">お気に入り登録をしているユーザーはいません</p>
        @endif
    </div><!-- /.container -->

@endsection
