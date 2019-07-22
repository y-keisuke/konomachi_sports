@php($title = 'チームを探す')

@extends('layouts.app')

@section('content')
    <div class="container" id="user-register">
        <h1>{{ $title }}</h1>
        @if(count($errors) > 0)
            <p>入力エラー</p>
        @endif
        <form action="{{ url('search') }}" method="GET">
            {{-- スポーツ --}}
            <div class="form-group">
                <label for="sports" class="col-md-4 col-form-label text-md-left">スポーツ</label>
                <div class="col-md-12">
                    <input id="sports" type="text" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}" name="sports" value="{{ $sports }}" autocomplete="sports">
                    @if($errors->has('sports'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- エリア --}}
            <div class="form-group">
                <label for="area" class="col-md-4 col-form-label text-md-left">地域</label>
                <div class="col-md-12">
                    <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $area }}" autocomplete="area">
                    @if($errors->has('area'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 年齢層 --}}
            <div class="form-group">
                <label for="age" class="col-md-4 col-form-label text-md-left">年齢層</label>
                <div class="col-md-12">
                    <input id="age" type="text" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $age }}" autocomplete="age">
                    @if($errors->has('ages'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- レベル --}}
            <div class="form-group">
                <label for="level" class="col-md-4 col-form-label text-md-left">募集対象</label>
                <div class="col-md-12">
                    <input id="level" type="text" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ $level }}" autocomplete="level">
                    @if($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 活動頻度 --}}
            <div class="form-group">
                <label for="frequency" class="col-md-4 col-form-label text-md-left">活動頻度</label>
                <div class="col-md-12">
                    <input id="frequency" type="text" class="form-control {{ $errors->has('frequency') ? ' is-invalid' : '' }}" name="frequency" value="{{ $frequency }}" autocomplete="frequency">
                    @if($errors->has('frequency'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('frequency') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 登録ボタン --}}
            <div class="form-group row mb-0 pl-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        チームを探す
                    </button>
                </div>
            </div>
        </form>

        @if(!empty($teams))
            <div class="table-responsive">
                <h2>検索結果</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>スポーツ</th>
                        <th>地域</th>
                        <th>年齢層</th>
                        <th>募集対象</th>
                        <th>活動頻度</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->sports }}</a></td>
                            <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->area }}</a></td>
                            <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->age }}</a></td>
                            <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->level }}</a></td>
                            <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->frequency }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection