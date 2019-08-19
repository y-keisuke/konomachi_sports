@php($title = 'チーム登録')

@extends('layouts.app')

@section('content')
    <div class="container" id="user-register">
        <h1>{{ $title }}</h1>
        <form action="{{ url('teams') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ Auth::id() }}">

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="sports" class="col-md-4 col-form-label text-md-left">活動しているスポーツ ※必須</label>
                <div class="col-md-12">
                    <select name="sports" id="sports" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}">
                        <option value="">- 選択してください</option>
                        @foreach($sports_list as $sport)
                            <option value="{{ $sport->sport }}" @if(old('sports') === $sport->sport) selected @endif>{{ $sport->sport }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('sports'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 地域 --}}
            <div class="form-group">
                <label for="area" class="col-md-4 col-form-label text-md-left">地域（市町村まで） ※必須</label>
                <div class="col-md-12">
                    <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" placeholder="（例）北海道札幌市">
                    @if($errors->has('area'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 年齢層 --}}
            <div class="form-group">
                <label for="age" class="col-md-4 col-form-label text-md-left">年齢層 ※必須</label>
                <div class="col-md-12">
                    <select name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}">
                        <option value="">- 選択してください</option>
                        @foreach($ages_list as $age)
                            <option value="{{ $age->age }}" @if(old('age') === $age->age) selected @endif>{{ $age->age }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- レベル --}}
            <div class="form-group">
                <label for="level" class="col-md-4 col-form-label text-md-left">募集対象 ※必須</label>
                <div class="col-md-12">
                    <select name="level" id="level" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}">
                        <option value="">- 選択してください</option>
                        @foreach($levels_list as $level)
                            <option value="{{ $level->level }}" @if(old('level') === $level->level) selected @endif>{{ $level->level }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 活動頻度 --}}
            <div class="form-group">
                <label for="frequency" class="col-md-4 col-form-label text-md-left">活動頻度 ※必須</label>
                <div class="col-md-12">
                    <select name="frequency" id="frequency" class="form-control  {{ $errors->has('frequency') ? ' is-invalid' : '' }}">
                        <option value="">- 選択してください</option>
                        @foreach($frequencies_list as $frequency)
                            <option value="{{ $frequency->frequency }}" @if(old('frequency') === $frequency->frequency) selected @endif>{{ $frequency->frequency }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('frequency'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('frequency') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 活動曜日 --}}
            <div class="form-group">
                <label for="weekday" class="col-md-4 col-form-label text-md-left">活動曜日 ※必須</label>
                <div class="col-md-12">
                    <select name="weekday" id="weekday" class="form-control {{ $errors->has('weekday') ? ' is-invalid' : '' }}">
                        <option value="">- 選択してください</option>
                        @foreach($weekdays_list as $weekday)
                            <option value="{{ $weekday->weekday }}" @if(old('weekday') === $weekday->weekday) selected @endif>{{ $weekday->weekday }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('weekday'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('weekday') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- ホームページ --}}
            <div class="form-group">
                <label for="hp" class="col-md-4 col-form-label text-md-left">ホームページ</label>
                <div class="col-md-12">
                    <input id="hp" type="text" class="form-control {{ $errors->has('hp') ? ' is-invalid' : '' }}" name="hp" value="{{ old('hp') }}" autocomplete="hp">
                    @if($errors->has('hp'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('hp') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 登録ボタン --}}
            <div class="form-group row mb-0 pl-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection