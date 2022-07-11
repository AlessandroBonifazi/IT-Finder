@extends('layouts.app')

@section('content')
    {{-- Messages --}}
    <div class="col-12">
        <div class="itf-card">
            {{-- title --}}
            <div class="itf-card-header">
                <h5 class="itf-card-title">{{ $messages->total_messages }} received messages</h5>
            </div>
            @if (!$is_premium)
                <div class="itf-card-info-bar">
                    <a href="{{ route('user.checkin') }}" class="itf-card-title itf-card-title-small">Upgrade
                        your profile to receive
                        more messages</a>
                </div>
            @endif
            {{-- body --}}
            <div class="itf-card-body">
                @if ($messages->count() > 0)
                    @foreach ($messages as $message)
                        <div class="itf-message-item">
                            <div class="itf-message-item-header">
                                @if ($message->user_name)
                                    <h5 class="itf-message-name">{{ $message->user_name }}</h5>
                                @else
                                    <h5 class="itf-message-name">Anonymous</h5>
                                @endif
                                @if ($message->created_at)
                                    <span class="itf-message-date">{{ $message->created_at->diffForHumans() }}</span>
                                @endif
                            </div>
                            <div class="itf-message-item-body">
                                <p class="itf-message-content">
                                    {{ $message->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="itf-message-item">
                        <div class="itf-message-item-body">
                            <p class="itf-message-content">
                                No messages yet.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
