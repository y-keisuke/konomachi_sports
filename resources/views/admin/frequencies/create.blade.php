@php($title = '活動頻度登録')

@extends('layouts.admin')

@section('content')
    <div class="container" id="ages-create">
        <h1>{{ $title }}</h1>
        <a href="{{ url('admin') }}" class="mt-2 mb-2">→管理者ページへ戻る</a>
        <form action="{{ url('frequencies') }}" method="POST">
            @csrf

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="frequency" class="col-md-4 col-form-label text-md-left">追加する活動頻度</label>
                <div class="col-md-12">
                    <input id="frequency" type="text" class="form-control {{ $errors->has('frequency') ? ' is-invalid' : '' }}" name="frequency" value="{{ old('frequency') }}">
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
                        追加
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
