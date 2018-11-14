@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Мои Заявки</strong></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($messages as $message)
                            <div class="messages row align-items-center">
                                <div class="col-12">
                                    <p class="mb-0"><strong>{{$message->subject}}</strong></p>
                                    <p>{{$message->body}}</p>
                                </div>
                                <div class="col-6 text-left">
                                    <p class="mb-0">{{$message->created_at}}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <p class="text-right mb-0">
                                        <a class="btn btn-outline-primary messages-answer" href="{{ route('message', $message->id) }}">
                                            Ответы
                                            <span class="badge badge-primary">{{ \App\Comment::where('message_id', $message->id)->count() }}</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <span><strong>Новая Заявка</strong></span>
                    </div>
                    <div class="card-body">
                        @include('messages/request')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
