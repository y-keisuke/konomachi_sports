@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー登録を完了してください</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            ユーザー登録の確認用のメールを送信しました。
                        </div>
                    @endif

                    メールに記載されているリンクをクリックして、登録手続きを完了してください。
                    メールが届いていなければ、 <a href="{{ route('verification.resend') }}">こちらをクリックして再送信してください</a>。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
