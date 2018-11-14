@extends('layouts.app')

{{ \App\Http\Controllers\MessageController::setMessageCookie($message) }}

@section('content')
    <div class="container">
        <div class="wrap_result container">
            <div class="alert"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-2">Назад</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header container">
                        <div class="row">
                            <div class="col-6 text-left">
                                <strong>{{ $message->subject }}</strong>
                            </div>
                            <div class="col-6 text-right">
                                <span>{{ $message->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>{{ $message->body }}</p>
                        <hr>
                        @include('comments.comments_block', ['essence' => $message])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection