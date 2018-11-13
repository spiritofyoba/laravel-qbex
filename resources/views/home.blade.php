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
                            <div class="messages">
                                <p><a href="/message/{{ $message->id }}">{{$message->subject}}</a></p>
                                <p>{{$message->body}}</p>
                                <p>{{$message->created_at}}</p>
                                <hr>
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
