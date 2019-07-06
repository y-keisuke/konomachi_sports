@php($title = '掲示板一覧')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>相手</th>
                    <th>作成日</th>
                </tr>
                </thead>
                <tbody>
                @foreach($boards as $board)
                    <tr>
                        <td><a href="{{ url('board/' . $board->id) }}">{{ $board->to_user_id }}</a></td>
                        <td><a href="{{ url('board/' . $board->id) }}">{{ $board->created_at }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- $users->links() --}}
    </div>
@endsection