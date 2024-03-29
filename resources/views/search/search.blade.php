@php($title = 'チームを探す')

@extends('layouts.app')

@section('content')
    <div class="container" id="search">
        <h1>{{ $title }}</h1>
        <section class="form-sec">
            <form action="{{ url('search') }}" method="GET">

                {{-- スポーツ --}}
                <div class="form-group">
                    <label for="sports" class="col-md-4 col-form-label text-md-left">スポーツ</label>
                    <div class="col-md-12">
                        <select name="sports" id="sports" class="form-control {{ $errors->has('sports') ? ' is-invalid' : '' }}">
                            <option value="">- 選択してください</option>
                            @foreach($sports_list as $s)
                                <option value="{{ $s->sport }}" @if($sports === $s->sport) selected @endif>{{ $s->sport }}</option>
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
                    <label for="area" class="col-md-4 col-form-label text-md-left">地域（都道府県名や市町村名のみでも検索可能）</label>
                    <div class="col-md-12">
                        <input id="area" type="text" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $area }}" placeholder="（例）札幌">
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
                                <option value="{{ $a->age }}" @if($age === $a->age) selected @endif>{{ $a->age }}</option>
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
                                <option value="{{ $l->level }}" @if($level === $l->level) selected @endif>{{ $l->level }}</option>
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
                                <option value="{{ $f->frequency }}" @if($frequency === $f->frequency) selected @endif>{{ $f->frequency }}</option>
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
                                <option value="{{ $w->weekday }}" @if($weekday === $w->weekday) selected @endif>{{ $w->weekday }}</option>
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
                <div class="form-group row mb-0 pl-3 mt-4">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            チームを探す
                        </button>
                    </div>
                </div>
            </form>
            <form action="{{ url('search') }}" method="POST" class="reset-btn">
                @csrf
                <button type="submit" class="btn btn-danger">検索情報をリセット</button>
            </form>
        </section>
        <section id="search">
            @if(count($teams) > 0)
                <h2>検索結果（{{ $teams->total() }}件）</h2>
                <div class="search-table">
                    <div class="search-table-header">
                        <ul class="search-list">
                            <li class="search-list-item">スポーツ</li>
                            <li class="search-list-item">地域</li>
                            <li class="search-list-item">年齢層</li>
                            <li class="search-list-item">募集対象</li>
                            <li class="search-list-item">活動頻度</li>
                            <li class="search-list-item">活動曜日</li>
                        </ul>
                    </div>
                    <div class="search-table-body">
                        @foreach($teams as $team)
                            <a href="{{url('teams/' . $team->id)}}">
                                <ul class="search-list">
                                    <li class="search-list-item">{{ $team->sports }}</li>
                                    <li class="search-list-item">{{ $team->area }}</li>
                                    <li class="search-list-item">{{ $team->age }}</li>
                                    <li class="search-list-item">{{ $team->level }}</li>
                                    <li class="search-list-item">{{ $team->frequency }}</li>
                                    <li class="search-list-item">{{ $team->weekday }}</li>
                                </ul>
                            </a>
                        @endforeach
                    </div>
                </div>
                {{ $teams->appends(request()->input())->links() }}
            @endif
        </section>
    </div>
@endsection