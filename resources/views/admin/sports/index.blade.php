@php($title = 'スポーツ一覧')

@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container sports-index">
        <h1>{{ $title }}</h1>

        <div class="mb-3">
            <a href="{{ url('sports/create') }}" class="btn btn-primary">スポーツを追加</a>
        </div>

            @foreach($sports as $sport)
                <div class="form-wrap flex">
                    <form action="{{ url('sports/' . $sport->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $sport->id }}">
                        <input type="text" class="form-control" name="sport" value="{{ $sport->sport }}">
                        <input type="submit" value="更新" class="btn btn-primary ml-2">
                    </form>
                    <form action="{{ url('sports/' . $sport->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $sport->id }}">
                        <input type="submit" value="削除" class="btn btn-danger ml-2">
                    </form>
                </div>
            @endforeach
        {{-- $users->links() --}}
    </div>
@endsection