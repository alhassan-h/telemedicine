<div class="sidebar-wrapper sidebar-theme">
  <nav id="sidebar">
      <div class="shadow-bottom"></div>
      <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
          <li class="menu">
              <a href="{{route('dashboard')}}" aria-expanded="{{$page_name=='dashboard'?'true':'false'}}" data-active="{{$page_name=='dashboard'?'true':'false'}}" class="dropdown-toggle">
                <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  <span>Dashboard</span>
                </div>
              </a>
            </li>
            
        @if(Auth::user()->isAdmin() || Auth::user()->isPatient())
          <li class="menu">
              <a href="{{route('doctors')}}" aria-expanded="{{$page_name=='doctors'?'true':'false'}}" data-active="{{$page_name=='doctors'?'true':'false'}}" class="dropdown-toggle">
                  <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                      <span>Doctors</span>
                  </div>
              </a>
          </li>
        @endif

        @if(Auth::user()->isAdmin() || Auth::user()->isDoctor())
          <li class="menu">
              <a href="{{route('patients')}}" aria-expanded="{{$page_name=='patients'?'true':'false'}}" data-active="{{$page_name=='patients'?'true':'false'}}" class="dropdown-toggle">
                  <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                      <span>Patients</span>
                  </div>
              </a>
          </li>
        @endif

        @if(Auth::user()->isDoctor() || Auth::user()->isPatient())
          <li class="menu">
              <a href="{{route('chats')}}" aria-expanded="{{($page_name=='chats'||$page_name=='chat')?'true':'false'}}" data-active="{{($page_name=='chats'||$page_name=='chat')?'true':'false'}}" class="dropdown-toggle">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                      <span>Chats</span>
                  </div>
              </a>
          </li>
        @endif

        @if(Auth::user()->isDoctor() || Auth::user()->isPatient())
          <li class="menu">
              <a href="{{route('videochats')}}" aria-expanded="{{$page_name=='videochats'?'true':'false'}}" data-active="{{$page_name=='videochats'?'true':'false'}}" class="dropdown-toggle">
                  <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                      <span>Video Chat</span>
                  </div>
              </a>
          </li>
        @endif

        @if(Auth::user()->isDoctor() || Auth::user()->isPatient())
          <li class="menu">
              <a href="{{route('appointments')}}" aria-expanded="{{$page_name=='appointments'?'true':'false'}}" data-active="{{$page_name=='appointments'?'true':'false'}}" class="dropdown-toggle">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                      <span>Appointments</span>
                  </div>
              </a>
          </li>
        @endif
      </ul>
      <div class="shadow-bottom"></div>
  </nav>
</div>
