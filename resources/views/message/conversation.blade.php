@extends('layouts.app')

@section('content')
    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5>Users</h5>
                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach($users as $user)
                            <li class="chat-user-list @if($user->id == $friendInfo->id) active @endif">
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
        <div class="col-md-9 chat-section">
            <div class="chat-header">
                <div class="chat-image">
                    {!! makeImageFromName($user->name) !!}
                </div>
                <div class="chat-name">
                    {{$user->name}}
                    <i class="fa fa-circle user-status-head" title="status" id="userStatusHead{{$friendInfo->id}}"></i>
                </div>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="message-listing" id="messageWrapper">
                    <div class="row message align-items-center mb-2">
                        <div class="col-md-12 user-info">
                            <div class="chat-image">
                                {!! makeImageFromName('Ajmal Anwari') !!}
                            </div>
                            <div class="chat-name">
                                Ajmal Anwari
                                <span class="small time">
                                    10:30 PM
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 message-content">
                            <div class="message-text">
                                Message Here
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
