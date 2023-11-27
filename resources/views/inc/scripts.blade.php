<!--   Core JS Files   -->
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/vendor2/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/vendor2/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor2/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor2/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendor2/assets/js/app.js')}}"></script>
<script src="{{asset('assets/vendor2/assets/js/custom.js')}}"></script>
<script> $(document).ready( function() { App.init(); } ); </script>

<script src="{{asset('assets/css/plugins/snackbar.min.js')}}"></script>
<script src="{{asset('assets/css/plugins/custom-snackbar.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->


@if(Session::has('login'))
    <script>
        Snackbar.show({
            text: "{{Session::get('login')}}",
            actionTextColor: '#fff',
            backgroundColor: '#8dbf42',
            pos: 'top-right',
            duration: 2000,
        });
    </script>
@endif

@if(Session::has('success'))
    <script>
        Snackbar.show({
            text: "{{Session::get('success')}}",
            actionTextColor: '#fff',
            backgroundColor: '#8dbf42',
            pos: 'top-center'
        });
    </script>
@endif

@if(Session::has('warning'))
    <script>
        Snackbar.show({
            text: "{{Session::get('warning')}}",
            actionTextColor: '#fff',
            backgroundColor: '#e2a03f',
            pos: 'top-center'
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        Snackbar.show({
            text: "{{Session::get('error')}}",
            actionTextColor: '#fff',
            backgroundColor: '#e7515a',
            pos: 'top-center'
        });
    </script>
@endif

@switch($page_name)
    {{-- dashboard --}}
    @case('dashboard')
    <script src="{{asset('assets/vendor2/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor2/assets/js/dashboard/dash_1.js')}}"></script>
    @break

    {{-- chats --}}
    @case('chats')
    <script src="{{asset('assets/vendor2/assets/js/apps/mailbox-chat.js')}}"></script>
    @break

    {{-- chat --}}
    @case('chat')
    <script src="{{asset('assets/vendor2/assets/js/apps/mailbox-chat.js')}}"></script>
    <script type="text/javascript">
        const pscr = new PerfectScrollbar('.chat-conversation-box', {
            suppressScrollX : true
        });

        const getScrollContainer = document.querySelector('.chat-conversation-box');
        getScrollContainer.scrollTop = getScrollContainer.scrollHeight;

        $("#send-msg").on('click', send_msg);

        $('#msg-write-box').on('keydown', function(event) {
            if(event.key === 'Enter') {send_msg();}
        });

        function send_msg() {
            const message = $('#msg-write-box').val();
            if ( '' === message ) return;

            const reciepient_id = "{{$reciepient_id}}";

            const time = new Date();
            const hours = time.getHours();
            const mins = time.getMinutes();
            const st = String(hours).padStart(2,'0')+':'+String(mins).padStart(2,'0');
            const eve = (hours <= 12)?'AM':'PM';
            const fmt_hr = (hours > 12)?(hours-12):(hours);
            var fmt_st = (fmt_hr)+':'+String(mins).padStart(2,'0')+' '+eve;
            
            $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: "{{route('chats.save')}}",
                data : {reciepient_id:reciepient_id,message:message},
                success : function(data, status, jqXHR){
                    Snackbar.show({
                        text: "Message sent",
                        actionTextColor: '#fff',
                        backgroundColor: '#8dbf42',
                        pos: 'top-center'
                    });
                    console.log(data)
                },
                error: function (jqXHR, status, error) {
                    Snackbar.show({
                        text: "Message Not Sent!",
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a',
                        pos: 'top-center'
                    });
                },
                complete: function(jqXHR, status){
                    const sent_msg = '<div class="bubble me">'+
                    '<div class="msg"><span>'+ message +'</span></div>'+
                    '<div class="timestamp"><span>'+ fmt_st +'</span></div></div>';
                    const active_chat = $('.active-chat').eq(0);
                    active_chat.append( sent_msg );
                    const getScrollContainer = document.querySelector('.chat-conversation-box');
                    getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
                    $('#msg-write-box').val('');
                }
            });
            
        }
    </script>

    @break

@endswitch
