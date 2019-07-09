@php($title = '掲示板一覧')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        {{$boards}}
        {{-- $users->links() --}}
    </div>
@endsection