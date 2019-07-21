@php($title = $team->area . 'の'. $team->sports . 'の編集ページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ url('teams/' .$team->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="area">活動エリア</label>
                <input id="area" type="text" class="form-control" name="area" value="{{ $team->area }}">
                @if($errors->has('area'))
                    <p class="text-danger">{{ $errors->first('area') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="age">年齢層</label>
                <input id="age" type="text" class="form-control" name="age" value="{{ $team->age }}">
                @if($errors->has('age'))
                    <p class="text-danger">{{ $errors->first('age') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="level">募集対象</label>
                <input id="level" type="text" class="form-control" name="level" value="{{ $team->level }}">
                @if($errors->has('level'))
                    <p class="text-danger">{{ $errors->first('level') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="frequency">活動頻度</label>
                <input id="frequency" type="text" class="form-control" name="frequency" value="{{ $team->frequency }}">
                @if($errors->has('frequency'))
                    <p class="text-danger">{{ $errors->first('frequency') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="hp">ホームページ</label>
                <input id="hp" type="text" class="form-control" name="hp" value="{{ $team->hp }}">
                @if($errors->has('hp'))
                    <p class="text-danger">{{ $errors->first('hp') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mb-2">送信</button>
        </form>
        <a href="{{ url('teams/' . $team->id) }}">→チームページに戻る</a>
    </div>
@endsection