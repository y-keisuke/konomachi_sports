@php($title = '投稿一覧')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

            <div class="mb-2">
                <a href="{{ url('posts/create') }}" class="btn btn-primary">活動状況を投稿</a>
            </div>

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
        {{-- $users->links() --}}
    </div>
@endsection