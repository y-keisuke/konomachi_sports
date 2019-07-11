@php($title = $other_user->name . 'さんとのメッセージルーム')

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="post-title">{{ $title }}</h1>
        <section class="message-area-wrap">
            <h1>メッセージエリア</h1>
            <div class="message-area-box">
                @foreach($messages as $message)
                    @if($message->user_id === $user->id)
                        <div class="message-area user-message-area">
                            <p class="message">{{ $message->message }}</p>
                            <p class="name">{{ $user->name }}</p>
                            <p class="time">{{ $message->created_at }}</p>
                        </div>
                    @elseif($message->user_id === $other_user->id)
                        <div class="message-area other-user-message-area">
                            <p class="message">{{ $message->message }}</p>
                            <p class="name">{{ $other_user->name }}</p>
                            <p class="time">{{ $message->created_at }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <section class="message-form">
            <h1>メッセージ送信フォーム</h1>
            <form action="{{ url('messages') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="board_id" value="{{ $board->id }}">
                <label for="message">メッセージを入力</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <input type="submit" value="送信" class="btn btn-primary">
            </form>
        </section>
    </div>

@endsection