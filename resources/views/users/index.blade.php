@php($title = 'ユーザー一覧')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

            <div class="mb-2">
                <a href="{{ url('users/create') }}" class="btn btn-primary">ユーザー作成</a>
            </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ユーザー名</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ url('users/' . $user->id) }}">{{ $user->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- $users->links() --}}
    </div>
@endsection