@php($title = '活動状況')

@extends('layouts.app')

@section('content')
    <div class="container post-create">
        <h1>{{ $title }}</h1>
        @if(count($errors) > 0)
            <p>入力エラー</p>
        @endif
        <form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="team_id" value="{{ $team_id }}">

            {{-- タイトル --}}
            <div class="form-group">
                <label for="title" class="col-md-4 col-form-label text-md-left">タイトル ※必須</label>
                <div class="col-md-12">
                    <input id="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 活動写真 --}}
            <div class="form-group">
                <label for="image" class="col-md-4 col-form-label text-md-left">活動写真</label>
                <div class="col-md-12">
                    <input id="image" type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} form-cont-none" name="image" value="{{ old('image') }}">
                    @if($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 本文 --}}
            <div class="form-group">
                <label for="body" class="col-md-4 col-form-label text-md-left">本文 ※必須</label>
                <div class="col-md-12">
                    <textarea type="text" id="body" name="body" class="form-control @if($errors->has('body')) is-invalid @endif" rows="20">{{ old('body') }}</textarea>
                    @if($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 投稿ボタン --}}
            <div class="form-group row mb-3 pl-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        投稿
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ url('teams/' . $team_id) }}">▶チームページへ戻る</a>
    </div>
@endsection
