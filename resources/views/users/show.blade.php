@php($title = $user->name . 'のマイページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="button-box">
            @if(Auth::check())
                @if($user->id !== Auth::id())
                    {{--フォローボタン--}}
                    <form action="{{ url('follows') }}" method="post" class="mr-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    @if($following)
                        @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="フォローを解除する">
                    @else
                        <input type="submit" class="btn btn-primary" value="フォローする">
                    @endif
                    </form>
                    {{--メッセージ送信ボタン--}}
                    <form action="{{ url('boards') }}" method="post">
                        @csrf
                        <input type="hidden" name="from_user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                        <input type="submit" value="メッセージを送る" class="btn btn-primary">
                    </form>
                @endif
            @endif
        </div>
        {{-- ユーザーの情報 --}}
        <section>
            <h2>プロフィール</h2>
            <div class="profile-box">
                <div class="profile-list row">
                    <p class="col-md-2">名前:</p>
                    <p class="col-md-10">{{ $user->name }}</p>
                </div>
                @if(Auth::id() === $user->id)
                    <div class="profile-list row">
                        <p class="col-md-2">メールアドレス（本人のみ表示）:</p>
                        <p class="col-md-10">{{ emptyJudge($user->email, '-') }}</p>
                    </div>
                @endif
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
            @if(Auth::check())
                @if($user->id === Auth::id())
                    <div class="flex">
                        {{--編集--}}
                        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary mr-4">編集</a>
                        {{--削除--}}
                        @if(Auth::id() === 2)
                            <button class="btn btn-danger">本来のユーザーはここが削除ボタン</button>
                        @elseif($user->is_admin)
                            <button class="btn btn-danger">管理者は削除できません</button>
                        @else
                            @component('components.user-btn-del')
                                @slot('controller', 'users')
                                @slot('id', $user->id)
                                @slot('name', $user->name)
                            @endcomponent
                        @endif
                    </div>
                @elseif($user->is_admin)
                    <button class="btn btn-primary mr-4">
                        <a href="{{ url('users/' . $user->id . '/edit') }}">編集</a>
                    </button>
                    @component('components.user-btn-del')
                        @slot('controller', 'users')
                        @slot('id', $user->id)
                        @slot('name', $user->name)
                    @endcomponent
                @endif
            @endif
        </section>

        {{-- 管理人を努めているチーム--}}
        <section>
            <h2>管理人をしているチーム</h2>
            @if(count($user->teams) > 0)
                <ul>
                    @foreach($user->teams as $team)
                        <li><a href="{{ url('teams/' . $team->id) }}">{{ $team->area . 'の'. $team->sports . 'チーム' }}</a></li>
                    @endforeach
                </ul>
            @else
                <p>管理人をしているチームをしているチームはありません</p>
            @endif
        </section>

        {{--お気に入り登録しているチーム--}}
        <section>
            <h2>お気に入り登録をしているチーム（{{ count($likes) }}チーム）</h2>
            @if(count($likes) > 0)
                <ul>
                    @foreach($likes as $team)
                        <li><a href="{{ url('teams/' . $team->id) }}">{{ $team->area . 'の'. $team->sports . 'チーム' }}</a></li>
                    @endforeach
                </ul>
            @else
                <p>お気に入り登録しているチームはありません。</p>
            @endif
        </section>

        {{--フォローユーザー--}}
        <section>
            <h2 id="follow">フォロー</h2>
            <h3>{{ $user->name }}のフォローユーザー（{{ count($follow) }}人）</h3>
            @if(count($follow) > 0)
                <ol>
                    @foreach($follow as $follow_user)
                        <li><a href="{{ url('users/' . $follow_user->id) }}">{{ $follow_user->name }}</a></li>
                    @endforeach
                </ol>
            @else
                <p class="ml-4">現在フォローユーザーはいません。</p>
            @endif

            {{--フォロワーユーザー--}}
            <h3>{{ $user->name }}のフォロワーユーザー（{{ count($followed) }}人）</h3>
            @if(count($followed) > 0)
                <ol>
                @foreach($followed as $followed_user)
                    <li><a href="{{ url('users/' . $followed_user->id) }}">{{ $followed_user->name }}</a></li>
                @endforeach
                </ol>
            @else
                <p class="ml-4">現在フォロワーユーザーはいません。</p>
            @endif
        </section>

        {{--メッセージ--}}
        @if($user->id === Auth::id())
            <section>
                <h2>メッセージ</h2>
                @if(count($from_boards) > 0 | count($to_boards) > 0)
                    <ul>
                        @foreach($from_boards as $from_user)
                            <li><a href="{{ url('boards/' . $from_user->pivot->id) }}">{{ $from_user->name }}さんとのメッセージルーム</a></li>
                        @endforeach
                        @foreach($to_boards as $to_user)
                            <li><a href="{{ url('boards/' . $to_user->pivot->id) }}">{{ $to_user->name }}さんとのメッセージルーム</a></li>
                        @endforeach
                    </ul>
                @else
                    <p class="ml-4">メッセージはありません。</p>
                @endif
            </section>
        @endif


    {{-- $user->posts->links() --}}
    </div>
@endsection
