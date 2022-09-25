<?php header('Access-Control-Allow-Origin: *'); ?>
@extends('layouts.app')

@section('content')
    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5>Users</h5>
                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach($users as $user)
                            <li class="chat-user-list">
                                <a href="{{route('message.conversation', $user->id)}}">
                                    <div class="chat-image">
                                        {!! makeImageFromName($user->name) !!}
                                        <i class="fa fa-circle user-status-icon" title="status"></i>
                                    </div>
                                    <div class="chat-name">
                                        {{$user->name}}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <h1>Message Section</h1>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
            let user_id = "{{ auth()->user()->id }}"
            let ip_address = '127.0.0.1';
            let socket_port = '3000';
            let socket = io(ip_address + ':' + socket_port);
            socket.on('connect', function(){
                alert("Iam here");
                socket.emit('user_connected', user_id);
            });
        });
    </script>
@endpush
