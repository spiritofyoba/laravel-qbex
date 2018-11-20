@extends('layouts.app')

{{ \App\Http\Controllers\MessageController::setMessageCookie($message) }}

@section('content')
    <div class="container">
        <div class="wrap_result container">
            <div class="alert"></div>
        </div>
        <div class="row justify-content-between">
            <div class="col-6">
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary mb-2">Назад</a>
            </div>
            <div class="col-4">
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'manager')
                    <form method="post" class="d-flex justify-content-center align-items-center">
                        {{ method_field('PATCH') }}

                        {{ csrf_field() }}
                        <span class="font-weight-bold">Статус:</span>
                        <select name="message-status" class="form-control h-100 mx-3">
                            @if($message->status == '1')
                                <option value="1" selected>Открыта</option>
                                <option value="0">Закрыта</option>
                            @else
                                <option value="1">Открыта</option>
                                <option value="0" selected>Закрыта</option>
                            @endif
                        </select>
                        <button type="submit" class="h-100 btn btn-primary">Сохранить</button>
                    </form>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header container">
                        <div class="row">
                            <div class="col-6 text-left">
                                <strong>{{ $message->subject }}</strong>
                                @if($message->status == '1')
                                    <span class="badge badge-success ml-1">Открыта</span>
                                @else
                                    <span class="badge badge-danger ml-1">Закрыта</span>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                <span>{{ $message->created_at->format('d.m.Y H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body container">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-8 col-sm-6 col-12">
                                <p>{{ $message->body }}</p>
                            </div>
                            @if($message->attachment)
                                <div class="attachment col-xl-2 col-lg-2 col-md-4 col-sm-6 col=12">
                                    <div class="attachment-hover">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                    <img class="img-thumbnail rounded float-left"
                                         src="{{ url('messages/img/') }}/{{ $message->attachment }}" alt="">
                                </div>
                            @endif
                        </div>
                        <hr>
                        @include('comments.comments_block', ['essence' => $message])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection