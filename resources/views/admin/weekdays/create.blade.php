@php($title = '活動曜日登録')

@extends('layouts.app')

@section('content')
    <div class="container" id="ages-create">
        <h1>{{ $title }}</h1>
        <a href="{{ url('admin') }}" class="mt-2 mb-2">→管理者ページへ戻る</a>
        <form action="{{ url('weekdays') }}" method="POST">
            @csrf

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="weekday" class="col-md-4 col-form-label text-md-left">追加する活動曜日</label>
                <div class="col-md-12">
                    <input id="weekday" type="text" class="form-control {{ $errors->has('weekday') ? ' is-invalid' : '' }}" name="weekday" value="{{ old('weekday') }}">
                    @if($errors->has('weekday'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('weekday') }}</strong>
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