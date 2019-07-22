@php($title = '管理者ページ')

@extends('layouts.admin')

@section('content')
    <div class="container mb-3" id="admin-index">
        <h1>{{ $title }}</h1>
        <ul class="nav nav-tab">
            <li class="nav-item"><a href="#tab1" class="nav-link" data-toggle="tab">スポーツ</a></li>
            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">年齢層</a></li>
            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">募集対象</a></li>
            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">地域</a></li>
            <li class="nav-item"><a href="#tab5" class="nav-link" data-toggle="tab">活動頻度</a></li>
            <li class="nav-item"><a href="#tab6" class="nav-link" data-toggle="tab">活動曜日</a></li>
        </ul>

        <div class="tab-content">
            {{--スポーツsport--}}
            <div class="tab-pane active" id="tab1">
                <h2>スポーツ一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('sports/create') }}" class="btn btn-primary">スポーツを追加</a>
                </div>
                @foreach($sports_list as $sport)
                    <div class="form-wrap flex">
                        <form action="{{ url('sports/' . $sport->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $sport->id }}">
                            <input type="text" class="form-control" name="sport" value="{{ $sport->sport }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('sports/' . $sport->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $sport->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
            {{-- 年齢層age --}}
            <div class="tab-pane" id="tab2">
                <h2>年齢層一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('ages/create') }}" class="btn btn-primary">年齢層を追加</a>
                </div>
                @foreach($ages_list as $age)
                    <div class="form-wrap flex">
                        <form action="{{ url('ages/' . $age->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $age->id }}">
                            <input type="text" class="form-control" name="age" value="{{ $age->age }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('ages/' . $age->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $age->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
            {{--募集対象level--}}
            <div class="tab-pane" id="tab3">
                <h2>募集対象一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('levels/create') }}" class="btn btn-primary">募集対象を追加</a>
                </div>
                @foreach($levels_list as $level)
                    <div class="form-wrap flex">
                        <form action="{{ url('levels/' . $level->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $level->id }}">
                            <input type="text" class="form-control" name="level" value="{{ $level->level }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('levels/' . $level->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $level->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
            {{--地域--}}
            <div class="tab-pane" id="tab4">
                <h2>地域一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('sports/create') }}" class="btn btn-primary">地域を追加</a>
                </div>
                @foreach($sports_list as $sport)
                    <div class="form-wrap flex">
                        <form action="{{ url('sports/' . $sport->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $sport->id }}">
                            <input type="text" class="form-control" name="sport" value="{{ $sport->sport }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('sports/' . $sport->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $sport->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
            {{--活動頻度frequency--}}
            <div class="tab-pane" id="tab5">
                <h2>活動頻度一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('frequencies/create') }}" class="btn btn-primary">活動頻度を追加</a>
                </div>
                @foreach($frequencies_list as $frequency)
                    <div class="form-wrap flex">
                        <form action="{{ url('frequencies/' . $frequency->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $frequency->id }}">
                            <input type="text" class="form-control" name="frequency" value="{{ $frequency->frequency }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('frequencies/' . $frequency->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $frequency->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
            {{--活動曜日weekday--}}
            <div class="tab-pane" id="tab6">
                <h2>活動頻度一覧・編集</h2>
                <div class="mb-3">
                    <a href="{{ url('weekdays/create') }}" class="btn btn-primary">活動頻度を追加</a>
                </div>
                @foreach($weekdays_list as $weekday)
                    <div class="form-wrap flex">
                        <form action="{{ url('weekdays/' . $weekday->id) }}" method="post" class="col-md-8 flex mb-3 p-0">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $weekday->id }}">
                            <input type="text" class="form-control" name="weekday" value="{{ $weekday->weekday }}">
                            <input type="submit" value="更新" class="btn btn-primary ml-2">
                        </form>
                        <form action="{{ url('weekdays/' . $weekday->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $weekday->id }}">
                            <input type="submit" value="削除" class="btn btn-danger ml-2">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- $users->links() --}}
    </div>
@endsection