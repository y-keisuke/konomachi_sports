@extends('layouts.app')

@section('content')
<div class="container user-create">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('register') }}">
                        @csrf

                        {{-- 名前--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">名前（最大10文字） ※必須 </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="ニックネーム可">
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
                                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- パスワード --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">パスワード ※必須、8文字以上 </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        {{-- スポーツ1 --}}
                        <div class="form-group row">
                            <label for="sports1" class="col-md-4 col-form-label text-md-left">探したいスポーツ①</label>
                            <div class="col-md-6">
                                <select name="sports1" id="sports1" class="form-control {{ $errors->has('sports1') ? ' is-invalid' : '' }}">
                                    <option value="">選択してください</option>
                                    @foreach($sports_list as $sport)
                                        <option value="{{ $sport->sport }}" @if(old('sports1') === $sport->sport) selected @endif>{{ $sport->sport }}</option>
                                    @endforeach
                                </select>
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
                                <input id="sports-years1" type="number" class="form-control {{ $errors->has('sports_years1') ? ' is-invalid' : '' }}" name="sports_years1" value="{{ old('sports-years1') }}" placeholder="（例）3">
                                @if($errors->has('sports_years1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sports_years1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- スポーツ2 --}}
                        <div class="form-group row">
                            <label for="sports2" class="col-md-4 col-form-label text-md-left">探したいスポーツ②</label>
                            <div class="col-md-6">
                                <select name="sports2" id="sports2" class="form-control {{ $errors->has('sports2') ? ' is-invalid' : '' }}">
                                    <option value="">- 選択してください</option>
                                    @foreach($sports_list as $sport)
                                        <option value="{{ $sport->sport }}" @if(old('sports2') === $sport->sport) selected @endif>{{ $sport->sport }}</option>
                                    @endforeach
                                </select>
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
                                <input id="sports-years2" type="number" class="form-control {{ $errors->has('sports_years2') ? ' is-invalid' : '' }}" name="sports_years2" value="{{ old('sports_years2') }}" placeholder="（例）0">
                                @if($errors->has('sports_years2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sports_years2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- スポーツ3 --}}
                        <div class="form-group row">
                            <label for="sports3" class="col-md-4 col-form-label text-md-left">探したいスポーツ③</label>
                            <div class="col-md-6">
                                <select name="sports3" id="sports3" class="form-control {{ $errors->has('sports3') ? ' is-invalid' : '' }}">
                                    <option value="">- 選択してください</option>
                                    @foreach($sports_list as $sport)
                                        <option value="{{ $sport->sport }}" @if(old('sports3') === $sport->sport) selected @endif>{{ $sport->sport }}</option>
                                    @endforeach
                                </select>
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
                                <input id="sports-years3" type="number" class="form-control {{ $errors->has('sports_years3') ? ' is-invalid' : '' }}" name="sports_years3" value="{{ old('sports_years3') }}" placeholder="（例）10">
                                @if($errors->has('sports_years3'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sports_years3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 年齢 --}}
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-left">年齢</label>
                            <div class="col-md-6">
                                <select name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}">
                                    <option value="">- 選択してください</option>
                                    @foreach($ages_list as $age)
                                        <option value="{{ $age }}" @if(old('age') === $age) selected @endif>{{ $age }}</option>
                                    @endforeach
                                </select>
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
                                <select name="sex" id="sex" class="form-control {{ $errors->has('sex') ? ' is-invalid' : '' }}">
                                    <option value="">- 選択してください</option>
                                    @foreach($sex_list as $s)
                                        <option value="{{ $s->sex }}" @if(old('sex') === $s->sex) selected @endif>{{ $s->sex }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('sex'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- エリア --}}
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-left">地域（市町村まで）</label>
                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" autocomplete="area" placeholder="（例）北海道札幌市">
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
