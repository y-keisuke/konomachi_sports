@php($title = '年齢層登録')

@extends('layouts.admin')

@section('content')
    <div class="container" id="ages-create">
        <h1>{{ $title }}</h1>
        <a href="{{ url('admin') }}" class="mt-2 mb-2">→管理者ページへ戻る</a>
        <form action="{{ url('ages') }}" method="POST">
            @csrf

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="age" class="col-md-4 col-form-label text-md-left">追加する年齢層</label>
                <div class="col-md-12">
                    <input id="age" type="text" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}">
                    @if($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
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
