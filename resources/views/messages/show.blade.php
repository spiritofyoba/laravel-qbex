@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection