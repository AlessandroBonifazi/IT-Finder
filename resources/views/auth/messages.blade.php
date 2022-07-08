@extends('layouts.app')

@section('content')
    {{-- Messages --}}
    <div class="col-sm-10 order-sm-2 offset-sm-2 col-md-8 order-md-1 offset-md-1 col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="itf-card">
                    {{-- title --}}
                    <div class="itf-card-header">
                        <h5 class="itf-card-title">Messages</h5>
                    </div>
                    <div class="itf-card-body py-5">
                        @foreach ($messages as $message)
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">
                                    <h5>{{ $message->user_name }}</h5>
                                    <span>{{ $message->created_at }}</span>
                                </li>
                                <li class="list-group-item w-75">{{ $message->content }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
