@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="text-center top-box">
                <p>「スポーツクラブを探す個人」</p>
                <p>「メンバーを探すスポーツクラブ」</p>
                <p>を結ぶマッチングサイトです。</p>
                <div>
                    <a href="{{ url('users/create') }}" class="center btn btn-primary mr-4">個人登録</a>
                    <a href="{{ url('teams/create') }}" class="center btn btn-primary">チーム登録</a>
                </div>
                <p class="mt-2">※チーム登録は個人登録後に行えます</p>
                @if(!Auth::check())
                    <form action="{{ route('login') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="email" value="test@example.com">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" class="btn btn-success">テストユーザーでログイン</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection