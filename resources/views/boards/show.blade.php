@php($title = $other_user->name . 'さんとのメッセージルーム')

@extends('layouts.app')

@section('content')
    <div class="container" id="boards-show">
        <h1 class="post-title">{{ $title }}</h1>
        <section class="message-area-wrap">
            <h2>メッセージエリア</h2>
            @if(count($messages) > 0)
                <div class="message-area-box">
                    @foreach($messages as $message)
                        @if($message->user_id === $user->id)
                            <div class="message-area user-message-area">
                                <p class="message">{{ $message->message }}</p>
                                <p class="name">- {{ $user->name }}</p>
                                <p class="time">- {{ $message->created_at }}</p>
                            </div>
                        @elseif($message->user_id === $other_user->id)
                            <div class="message-area other-user-message-area">
                                <p class="message">{{ $message->message }}</p>
                                <p class="name">- {{ $other_user->name }}</p>
                                <p class="time">- {{ $message->created_at }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p>まだメッセージはありません。</p>
            @endif
        </section>
        <section class="message-form">
            <h2>メッセージ送信フォーム</h2>
            <form action="{{ url('messages') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="board_id" value="{{ $board->id }}">
                <label for="message">メッセージを入力</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"></textarea>
                @if($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
                <input type="submit" value="送信" class="btn btn-primary">
            </form>
        </section>
    </div>

@endsection
