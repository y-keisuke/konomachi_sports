@php($title = $user->name . 'の編集ページ')

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ url('users/' .$user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">名前</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
                @if($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports1">スポーツ①</label>
                <select name="sports1" id="sports1" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->sport }}">{{ $sport->sport }}</option>
                    @endforeach
                </select>
                @if($errors->has('sports1'))
                    <p class="text-danger">{{ $errors->first('sports1') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports-years1">スポーツ経験年数①</label>
                <input id="sports-years1" type="text" class="form-control" name="sports-years1" value="{{ $user->sports_years1 }}">
                @if($errors->has('sports-years1'))
                    <p class="text-danger">{{ $errors->first('sports-years1') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports2">スポーツ②</label>
                <select name="sports2" id="sports2" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->sport }}">{{ $sport->sport }}</option>
                    @endforeach
                </select>
                @if($errors->has('sports2'))
                    <p class="text-danger">{{ $errors->first('sports2') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports-years2">スポーツ経験年数②</label>
                <input id="sports-years2" type="text" class="form-control" name="sports-years2" value="{{ $user->sports_years2 }}">
                @if($errors->has('sports-years2'))
                    <p class="text-danger">{{ $errors->first('sports-years2') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports3">スポーツ③</label>
                <select name="sports3" id="sports3" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->sport }}">{{ $sport->sport }}</option>
                    @endforeach
                </select>
                @if($errors->has('sports3'))
                    <p class="text-danger">{{ $errors->first('sports3') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sports-years3">スポーツ経験年数③</label>
                <input id="sports-years3" type="text" class="form-control" name="sports-years3" value="{{ $user->sports_years3 }}">
                @if($errors->has('sports-years3'))
                    <p class="text-danger">{{ $errors->first('sports-years3') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="age">年齢</label>
                <select name="age" id="age" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($age_list as $a)
                        <option value="{{ $a }}">{{ $a }}</option>
                    @endforeach
                </select>
                @if($errors->has('age'))
                    <p class="text-danger">{{ $errors->first('age') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sex">性別</label>
                <select name="sex" id="sex" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($sex as $s)
                        <option value="{{ $s->sex }}">{{ $s->sex }}</option>
                    @endforeach
                </select>
                @if($errors->has('sex'))
                    <p class="text-danger">{{ $errors->first('sex') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="area">地域</label>
                <input id="area" type="text" class="form-control" name="area" value="{{ $user->area }}">
                @if($errors->has('area'))
                    <p class="text-danger">{{ $errors->first('area') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
@endsection