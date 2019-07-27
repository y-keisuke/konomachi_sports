@php($title = 'チームを探す')

@extends('layouts.app')

@section('content')
    <div class="container" id="search">
        <h1>{{ $title }}</h1>
        <section>
            <form action="{{ url('search') }}" method="GET">

                {{-- スポーツ --}}
                <div class="form-group">
                    <label for="sports" class="col-md-4 col-form-label text-md-left">スポーツ</label>
                    <div class="col-md-12">
                        {{$sports}}
                        <select name="sports" id="sports" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($sports_list as $s)
                                <option value="{{ $s->id }}" @if((int)$sports === $s->id) selected @endif>{{ $s->sport }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sports'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sports') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- 地域 --}}
                <div class="form-group">
                    <label for="area" class="col-md-4 col-form-label text-md-left">地域</label>
                    <div class="col-md-12">
                        <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $area }}" autocomplete="area">
                        @if($errors->has('area'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- 年齢層 --}}
                <div class="form-group">
                    <label for="age" class="col-md-4 col-form-label text-md-left">年齢層</label>
                    <div class="col-md-12">
                        <select name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($ages_list as $a)
                                <option value="{{ $a->id }}" @if((int)$age === $a->id) selected @endif>{{ $a->age }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ages'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- レベル --}}
                <div class="form-group">
                    <label for="level" class="col-md-4 col-form-label text-md-left">募集対象</label>
                    <div class="col-md-12">
                        <select name="level" id="level" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($levels_list as $l)
                                <option value="{{ $l->id }}" @if((int)$level === $l->id) selected @endif>{{ $l->level }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('level'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- 活動頻度 --}}
                <div class="form-group">
                    <label for="frequency" class="col-md-4 col-form-label text-md-left">活動頻度</label>
                    <div class="col-md-12">
                        <select name="frequency" id="frequency" class="form-control  {{ $errors->has('frequency') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($frequencies_list as $f)
                                <option value="{{ $f->id }}" @if((int)$frequency === $f->id) selected @endif>{{ $f->frequency }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('frequency'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('frequency') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                {{-- 活動曜日 --}}
                <div class="form-group">
                    <label for="weekday" class="col-md-4 col-form-label text-md-left">活動曜日</label>
                    <div class="col-md-12">
                        <select name="weekday" id="weekday" class="form-control {{ $errors->has('weekday') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($weekdays_list as $w)
                                <option value="{{ $w->id }}" @if((int)$weekday === $w->id) selected @endif>{{ $w->weekday }}</option>
                            @endforeach
                        </select>
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
                            チームを探す
                        </button>
                    </div>
                </div>
            </form>
            <form action="{{ url('search') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">検索情報をリセット</button>
            </form>
        </section>
{{$teams}}
        <section>
            @if(!empty($teams))
                <div class="table-responsive">
                    <h2>検索結果</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>スポーツ</th>
                            <th>地域</th>
                            <th>年齢層</th>
                            <th>募集対象</th>
                            <th>活動頻度</th>
                            <th>活動曜日</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            {{$s_sport->teams()->get()}}
                            <tr>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $s_sport->where('id', $team->sports) }}</a></td>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $team->area }}</a></td>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $s_age->where($team->age) }}</a></td>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $s_level->where($team->level) }}</a></td>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $s_frequency->where($team->frequency) }}</a></td>
                                <td><a href="{{ url('teams/' . $team->id) }}">{{ $s_weekday->where($team->weekday) }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
@endsection