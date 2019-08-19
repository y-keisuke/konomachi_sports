@php($title = '募集対象登録')

@extends('layouts.app')

@section('content')
    <div class="container" id="ages-create">
        <h1>{{ $title }}</h1>
        <a href="{{ url('admin') }}" class="mt-2 mb-2">→管理者ページへ戻る</a>
        <form action="{{ url('levels') }}" method="POST">
            @csrf

            {{-- スポーツ --}}
            <div class="form-group">
                <label for="level" class="col-md-4 col-form-label text-md-left">追加する募集対象</label>
                <div class="col-md-12">
                    <input id="level" type="text" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}">
                    @if($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
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