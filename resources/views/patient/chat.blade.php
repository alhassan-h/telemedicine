@extends('layouts.dash')

@php($chats = $data['chats'])
@php($reciepient_id = $data['reciepient_id'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

    <div class="chat-section layout-top-spacing">

        <div class="chat-section layout-top-spacing">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="chat-system">
                    <div class="chat-box" style="height: calc(100vh - 233px);">

                        <div class="chat-box-inner" style="height: 100%;">
                            <div class="chat-meta-user chat-active">
                                <div class="current-chat-user-name">
                                    <span>
                                        @php($profile = $chats[0]->user->profile)
                                        <img src='{{asset("storage/images/users/$profile")}}' alt="dynamic-image">
                                        <span class="name">Dr. {{$chats[0]->getSenderAlias(Auth::user())}}</span>
                                    </span>
                                </div>

                                <div class="chat-action-btn align-self-center">
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-2">
                                            <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> Search</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Clear Chats</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-conversation-box ps">
                                <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                                    <div class="chat active-chat" data-chat="person6">

                                        <div class="conversation-start mt-4 mb-4">
                                            <span>November, 24</span>
                                        </div>
                                                
                                        @forelse($chats as $chat)
                                        <div class="bubble {{$chat->isAuthor(Auth::user())?'me':'you'}}">
                                            <div class="sender">
                                                <span>{{-- ucwords($chat->getSender()) --}}</span>
                                            </div>
                                            <div class="msg">
                                                <span>{{($chat->getMessage())}}</span>
                                            </div>
                                            <div class="timestamp">
                                                <span>{{ucfirst($chat->getDate())}}</span>
                                            </div>
                                        </div>
                                        @empty
                                        <span>No messages are available. Once you send message they will appear here</span>
                                        @endforelse
                                    </div>               
                                </div>

                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                            <div class="chat-footer chat-active">
                                <div class="chat-input">
                                    <form class="chat-form" action="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                        <input type="text" class="mail-write-box form-control" id="msg-write-box" placeholder="Message" autocomplete="off">
                                        <span class="send-msg" id="send-msg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
        </div>

    </div>
</div>

@endsection