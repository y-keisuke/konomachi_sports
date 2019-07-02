@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- 名前--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">名前 ※必須 </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- メールアドレス --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">メールアドレス ※必須 </label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- パスワード --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">パスワード ※必須 </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- パスワード再入力 --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-left">パスワード（確認） ※必須 </label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- スポーツ1 --}}
                        <div class="form-group row">
                            <label for="sports1" class="col-md-4 col-form-label text-md-left">探したいスポーツ①</label>
                            <div class="col-md-6">
                                <input id="sports1" type="text" class="form-control {{ $errors->has('sports1') ? ' is-invalid' : '' }}" name="sports1" value="{{ old('sports1') }}" autocomplete="sports">
                                @if($errors->has('sports1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sports1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- スポーツ経験年数1 --}}
                        <div class="form-group row">
                            <label for="sports-years1" class="col-md-4 col-form-label text-md-left">経験年数①</label>
                            <div class="col-md-6">
                                <input id="sports-years1" type="number" class="form-control {{ $errors->has('sports-years1') ? ' is-invalid' : '' }}" name="sports-years1" value="{{ old('sports-years1') }}" autocomplete="sports-years1">
                                @if($errors->has('sports-years1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sports-years1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- スポーツ2 --}}
                        <div class="form-group row">
                            <label for="sports2" class="col-md-4 col-form-label text-md-left">探したいスポーツ②</label>
                            <div class="col-md-6">
                                <input id="sports2" type="text" class="form-control {{ $errors->has('sports2') ? ' is-invalid' : '' }}" name="sports2" value="{{ old('sports2') }}" autocomplete="sports2">
                                @if($errors->has('sports2'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports2') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        {{-- スポーツ経験年数2 --}}
                        <div class="form-group row">
                            <label for="sports-years2" class="col-md-4 col-form-label text-md-left">経験年数②</label>
                            <div class="col-md-6">
                                <input id="sports-years2" type="number" class="form-control {{ $errors->has('sports-years2') ? ' is-invalid' : '' }}" name="sports-years2" value="{{ old('sports-years2') }}" autocomplete="sports-years2">
                                @if($errors->has('sports-years2'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports-years2') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        {{-- スポーツ3 --}}
                        <div class="form-group row">
                            <label for="sports3" class="col-md-4 col-form-label text-md-left">探したいスポーツ③</label>
                            <div class="col-md-6">
                                <input id="sports3" type="text" class="form-control {{ $errors->has('sports3') ? ' is-invalid' : '' }}" name="sports3" value="{{ old('sports3') }}" autocomplete="sports3">
                                @if($errors->has('sports3'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports3') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        {{-- スポーツ経験年数3 --}}
                        <div class="form-group row">
                            <label for="sports-years3" class="col-md-4 col-form-label text-md-left">経験年数③</label>
                            <div class="col-md-6">
                                <input id="sports-years3" type="number" class="form-control {{ $errors->has('sports-years3') ? ' is-invalid' : '' }}" name="sports-years3" value="{{ old('sports-years3') }}" autocomplete="sports-years3">
                                @if($errors->has('sports-years3'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports-years3') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        {{-- 年齢 --}}
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-left">年齢</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" autocomplete="age">
                                @if($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 性別 --}}
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-left">性別</label>
                            <div class="col-md-6">
                                <input id="sex" type="text" class="form-control {{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex" value="{{ old('sex') }}" autocomplete="sex">
                                @if($errors->has('sex'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- エリア --}}
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-left">エリア</label>
                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" autocomplete="area">
                                @if($errors->has('area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 登録ボタン --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
