@php($title = '活動状況')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        @if(count($errors) > 0)
            <p>入力エラー</p>
        @endif
        <form action="{{ url('posts') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ $user->id }}">
            <input type="hidden" value="{{ $team->id }}">

            {{-- タイトル --}}
            <div class="form-group">
                <label for="title" class="col-md-4 col-form-label text-md-left">タイトル</label>
                <div class="col-md-12">
                    <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" autocomplete="sports">
                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- 本文 --}}
            <div class="form-group">
                <label for="body" class="col-md-4 col-form-label text-md-left">本文</label>
                <div class="col-md-12">
                    <textarea type="text" id="body" name="body" class="form-control @if($errors->has('body')) is-invalid @endif">{{ old('body') }}</textarea>
                    @if($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 登録ボタン --}}
            <div class="form-group row mb-0 pl-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        投稿
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection