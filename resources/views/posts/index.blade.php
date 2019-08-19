@php($title = '投稿一覧')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <form action="{{ url('posts/create') }}" class="mb-2">
            <input type="hidden" name="team_id" value="{{ $team_id }}">
            <input type="submit" class="btn btn-primary" value="活動状況を投稿">
        </form>

        <a href="{{ url('teams/' . $team_id) }}">→チーム情報に戻る</a>

        @if(count($posts) > 0)
            <div class="table-responsive mt-2">
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
        @else
            <p class="mt-2 ml-2">投稿はありません</p>
        @endif
        {{ $posts->links() }}
    </div>
@endsection