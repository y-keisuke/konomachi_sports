@php($title = $team->area . 'の'. $team->sports . 'チームのページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container" id="teams-show">
        <div class="team-head">
            <h1>{{ $title }}</h1>
            @if(Auth::check())
                <form action="{{ url('likes') }}" method="post" class="mb-2">
                    @csrf
                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                    @if($like)
                        @method('DELETE')
                        <button type="submit" class="like-button"><i class="fas fa-star"></i></button>
                    @else
                        <button type="submit" class="like-button"><i class="far fa-star"></i></button>
                    @endif
                </form>
            @endif
        </div>
        {{-- チームの情報 --}}
        <section>
            <div class="team-info-box">
                <div class="team-info-list row">
                    <p class="col-md-2">スポーツ：</p>
                    <p class="col-md-10">{{ $team->sports }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">活動地域：</p>
                    <p class="col-md-10">{{ $team->area }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">年齢層：</p>
                    <p class="col-md-10">{{ $team->age }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">募集レベル：</p>
                    <p class="col-md-10">{{ $team->level }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">活動頻度：</p>
                    <p class="col-md-10">{{ $team->frequency }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">活動曜日：</p>
                    <p class="col-md-10">{{ $team->weekday }}</p>
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">HP：</p>
                    @if($team->hp)
                        <a href="{{ $team->hp }}" class="col-md-10"><p>{{ $team->hp }}</p></a>
                    @else
                        <p class="col-md-10">-</p>
                    @endif
                </div>
                <div class="team-info-list row">
                    <p class="col-md-2">管理人：</p>
                    <p class="col-md-10"><a href="{{ url('users/' . $user->id) }}">{{ $user->name }}</a></p>
                </div>
            </div>

            {{-- 編集・削除ボタン --}}
            @if(Auth::id() === $team->user_id)
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
            @endif

        </section>

        {{--活動状況--}}
        <section>
            <div class="sec-head">
                <h2>活動状況</h2>
                @if(Auth::id() === $team->user_id)
                    <form action="{{ url('posts/create') }}" class="my-2">
                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                        <input type="submit" class="btn btn-primary" value="活動状況を投稿">
                    </form>
                @endif
            </div>
            @if(count($posts) > 0)
                <a href="{{url('posts?team_id=' . $team->id)}}">【活動状況一覧】</a>
                <div class="table-responsive mt-4">
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
            @else
                <p>まだ活動状況の投稿はありません。</p>
            @endif
        </section>

        {{--チームをお気に入り登録しているユーザー--}}
        <section>
            <div class="sec-head">
                <h2 id="like">お気に入り登録をしているユーザー</h2>
                @if(Auth::check())
                    <form action="{{ url('likes') }}" method="post">
                        @csrf
                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                        @if($like)
                            @method('DELETE')
                            <input type="submit" class="btn btn-primary" value="お気に入りを解除する">
                        @else
                            <input type="submit" class="btn btn-primary" value="お気に入り登録する">
                        @endif
                    </form>
                @endif
            </div>
            @if(count($likes) > 0)
                <ul>
                    @foreach($likes as $user)
                        <li><a href="{{ url('users/' . $user->id) }}"><p>{{ $user->name }}</p></a></li>
                    @endforeach
                </ul>
            @else
                <p class="ml-2">お気に入り登録をしているユーザーはいません</p>
            @endif
        </section>
    </div><!-- /.container -->

@endsection
