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
                                <span class="small time text-gray-500" title="2022-09-24 09:25 AM">
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
            <div class="chat-box">
                <div class="chat-input bg-white" id="chatInput" contenteditable="">

                </div>
                <div class="chat-input-toolbar">
                    <button title="Attachment" class="btn btn-light btn-sm btn-file-upload">
                        <i class="fa fa-paperclip"></i>
                    </button>
                    <button title="Bold" class="btn btn-light btn-sm tool-items"
                    onclick="document.execCommand('bold', false, '')">
                        <i class="fa fa-bold"></i>
                    </button>
                    <button title="Italic" class="btn btn-light btn-sm tool-items"
                    onclick="document.execCommand('italic', false, '')">
                        <i class="fa fa-italic tool-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
