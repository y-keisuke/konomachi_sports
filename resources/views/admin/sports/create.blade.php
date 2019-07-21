@php($title = 'チーム登録')

@extends('layouts.app')

@section('content')
    <div class="container" id="sports-create">
        <h1>{{ $title }}</h1>
        <form action="{{ url('sports') }}" method="POST">
            @csrf

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="sport" class="col-md-4 col-form-label text-md-left">追加するスポーツ</label>
                <div class="col-md-12">
                    <input id="sport" type="text" class="form-control {{ $errors->has('sport') ? ' is-invalid' : '' }}" name="sport" value="{{ old('sport') }}" autocomplete="sports">
                    @if($errors->has('sport'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sport') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 登録ボタン --}}
            <div class="form-group row mb-0 pl-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        追加
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection