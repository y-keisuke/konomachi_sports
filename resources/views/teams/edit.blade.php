@php($title = $team->area . 'の'. $team->sports . 'の編集ページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ url('teams/' .$team->id) }}" method="post">
            @csrf
            @method('PUT')
            {{-- スポーツ --}}
            <div class="form-group">
                <label for="sports">活動しているスポーツ</label>
                <select name="sports" id="sports" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}">
                    <option value="">- 選択してください</option>
                    @foreach($sports_list as $sport)
                        <option value="{{ $sport->sport }}" @if($team->sports === $sport->sport) selected @endif>{{ old('sports', $sport->sport) }}</option>
                    @endforeach
                </select>
                @if($errors->has('sports'))
                    <p class="text-danger">{{ $errors->first('sports') }}</p>
                @endif
            </div>

            {{-- 活動地域 --}}
            <div class="form-group">
                <label for="area">活動地域</label>
                <input id="area" type="text" class="form-control" name="area" value="{{ old('area', $team->area) }}">
                @if($errors->has('area'))
                    <p class="text-danger">{{ $errors->first('area') }}</p>
                @endif
            </div>

            {{-- 年齢層 --}}
            <div class="form-group">
                <label for="age">年齢層</label>
                <select name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}">
                    <option value="">- 選択してください</option>
                    @foreach($ages_list as $age)
                        <option value="{{ $age->age }}" @if($team->age === $age->age) selected @endif>{{ old('age', $age->age) }}</option>
                    @endforeach
                </select>
                @if($errors->has('age'))
                    <p class="text-danger">{{ $errors->first('age') }}</p>
                @endif
            </div>

            {{-- 募集対象--}}
            <div class="form-group">
                <label for="level">募集対象</label>
                <select name="level" id="level" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}">
                    <option value="">- 選択してください</option>
                    @foreach($levels_list as $level)
                        <option value="{{ $level->level }}" @if($team->level === $level->level) selected @endif>{{ old('level', $level->level) }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <p class="text-danger">{{ $errors->first('level') }}</p>
                @endif
            </div>

            {{-- 活動頻度 --}}
            <div class="form-group">
                <label for="frequency">活動頻度</label>
                <select name="frequency" id="frequency" class="form-control {{ $errors->has('frequency') ? ' is-invalid' : '' }}">
                    <option value="">- 選択してください</option>
                    @foreach($frequencies_list as $frequency)
                        <option value="{{ $frequency->frequency }}" @if($team->frequency === $frequency->frequency) selected @endif>{{ old('frequency', $frequency->frequency) }}</option>
                    @endforeach
                </select>
                @if($errors->has('frequency'))
                    <p class="text-danger">{{ $errors->first('frequency') }}</p>
                @endif
            </div>

            {{-- 活動曜日 --}}
            <div class="form-group">
                <label for="weekday">活動曜日</label>
                <select name="weekday" id="weekday" class="form-control {{ $errors->has('weekday') ? ' is-invalid' : '' }}">
                    <option value="">- 選択してください</option>
                    @foreach($weekdays_list as $weekday)
                        <option value="{{ $weekday->weekday }}" @if($team->weekday === $weekday->weekday) selected @endif>{{ old('weekday', $weekday->weekday) }}</option>
                    @endforeach
                </select>
                @if($errors->has('weekday'))
                    <p class="text-danger">{{ $errors->first('weekday') }}</p>
                @endif
            </div>

            {{-- ホームページ --}}
            <div class="form-group">
                <label for="hp">ホームページ</label>
                <input id="hp" type="text" class="form-control" name="hp" value="{{ old('hp', $team->hp) }}">
                @if($errors->has('hp'))
                    <p class="text-danger">{{ $errors->first('hp') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mb-2">送信</button>
        </form>
        <a href="{{ url('teams/' . $team->id) }}">→チームページに戻る</a>
    </div>
@endsection