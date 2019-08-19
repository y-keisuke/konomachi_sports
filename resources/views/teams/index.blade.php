@php($title = 'チーム一覧')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

            <div class="mb-2">
                <a href="{{ url('teams/create') }}" class="btn btn-primary">チーム作成</a>
            </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>地域 + スポーツ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->area }}の{{ $team->sports }}チーム</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- $users->links() --}}
    </div>
@endsection