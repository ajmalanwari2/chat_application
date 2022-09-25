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
                                        <i class="fa fa-circle user-status-icon user-icon-{{ $user->id }}"
                                           title="status"></i>
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
        $(document).ready(function () {
            $(function () {
                let user_id = "{{ auth()->user()->id }}"
                let ip_address = '127.0.0.1';
                let socket_port = '3000';
                let socket = io(ip_address + ':' + socket_port);
                socket.on('connection', function () {
                    socket.emit('user_connected', user_id);
                });
                socket.on('updateUserStatus', (data) => {
                    console.log('Iam here', data);
                    $.each(data, function (key, val) {
                        if (val !== null && val !== 0) {
                            console.log(key);
                            let $userIcon = $(".user-icon-" + key);
                            $userIcon.addClass('text-success');
                            $userIcon.attr('title', 'Online');
                        }
                    });
                });
            });
        });
    </script>
    {{--    <script>--}}
    {{--        $(function (){--}}
    {{--           let user_id = "{{ auth()->user()->id }}";--}}
    {{--           let ip_address = '127.0.0.1';--}}
    {{--           let socket_port = '3000'--}}
    {{--           let socket = io(ip_address + ':' + socket_port);--}}

    {{--           socket.on('connection', function (){--}}
    {{--               alert('here');--}}
    {{--              socket.emit('user_connected', user_id);--}}
    {{--           });--}}
    {{--        });--}}
    {{--    </script>--}}
@endpush
