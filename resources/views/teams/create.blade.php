@php($title = 'チーム登録')

@extends('layouts.app')

@section('content')
    <div class="container" id="user-register">
        <h1>{{ $title }}</h1>
        @if(count($errors) > 0)
            <p>入力エラー</p>
        @endif
        <form action="{{ url('teams') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ Auth::id() }}">

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="sports" class="col-md-4 col-form-label text-md-left">活動しているスポーツ ※必須</label>
                <div class="col-md-12">
                    <input id="sports" type="text" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}" name="sports" value="{{ old('sports') }}" autocomplete="sports">
                    @if($errors->has('sports'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 年齢層 --}}
            <div class="form-group">
                <label for="age" class="col-md-4 col-form-label text-md-left">年齢層 ※必須</label>
                <div class="col-md-12">
                    <input id="age" type="text" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" autocomplete="age">
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
                    <input id="level" type="text" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" autocomplete="level">
                    @if($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- エリア --}}
            <div class="form-group">
                <label for="area" class="col-md-4 col-form-label text-md-left">エリア ※必須</label>
                <div class="col-md-12">
                    <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" autocomplete="area">
                    @if($errors->has('area'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 活動頻度 --}}
            <div class="form-group">
                <label for="frequency" class="col-md-4 col-form-label text-md-left">活動頻度 ※必須</label>
                <div class="col-md-12">
                    <input id="frequency" type="text" class="form-control {{ $errors->has('frequency') ? ' is-invalid' : '' }}" name="frequency" value="{{ old('frequency') }}" autocomplete="frequency">
                    @if($errors->has('frequency'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('frequency') }}</strong>
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