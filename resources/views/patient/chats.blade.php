@extends('layouts.dash')

@php($chats = $data['chats'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="chat-section layout-top-spacing">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="chat-system">
                        <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                        <div class="user-list-box">
                            <div class="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="people ps ps--active-y">

                                @forelse($chats as $chat)
                                    <a href="{{route('patient.chats').'/'.$chat->getSenderAliasID(Auth::user())}}" class="person" data-chat="person6" style="">
                                        <div class="user-info">
                                            <div class="f-head">
                                                <img src="{{asset('assets/vendor2/assets/img/90x90.jpg')}}" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-info">
                                                    <span class="user-name" data-name="Nia Hillyer">{{$chat->getSenderAlias(Auth::user())}}</span>
                                                    <span class="user-meta-time">{{$chat->getDate()}}</span>
                                                </div>
                                                <span class="preview">{{ucfirst($chat->getMessage())}}</span>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                <span class="p-4 text-primary"> You have no chats yet. Go to Doctors' list and chat them up</span>
                                @endforelse

                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 503px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 242px;"></div></div></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection