@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="text-center top-box">
                <p>「スポーツクラブを探す個人」</p>
                <p>「メンバーを探すスポーツクラブ」</p>
                <p>を結ぶマッチングサイトです。</p>
                <div class="">
                    <button class="btn btn-primary mr-4"><a href="{{ url('users/create') }}" class="center">個人登録</a></button>
                    <button class="btn btn-primary"><a href="" class="center">チーム登録</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection