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

    @case('profile')
    <script src="{{asset('assets/vendor2/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('assets/vendor2/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('assets/vendor2/plugins/tagInput/tags-input.js')}}"></script>
    <script src="{{asset('assets/vendor2/assets/js/users/account-settings.js')}}"></script>
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

        setInterval(refresh_msg, 2000);

        var last_message_id = "{{$chat->id}}";

        // functions defination
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
                url: "{{route('chats.savechat')}}",
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
                    // const sent_msg = '<div class="bubble me">'+
                    // '<div class="msg"><span>'+ message +'</span></div>'+
                    // '<div class="timestamp"><span>'+ fmt_st +'</span></div></div>';
                    // const active_chat = $('.active-chat').eq(0);
                    // active_chat.append( sent_msg );
                    // const getScrollContainer = document.querySelector('.chat-conversation-box');
                    // getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
                    $('#msg-write-box').val('');
                }
            });
            
        }
        
        function refresh_msg() {
            
            const reciepient_id = "{{$reciepient_id}}";
            console.log('last_message_id: ', last_message_id)                 
            
            $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: "{{route('chats.conversation')}}",
                data : {reciepient_id:reciepient_id,last_message_id:last_message_id},
                success : function(data, status, jqXHR){
                    if (data.msg != '') {
                        const active_chat = $('.active-chat').eq(0);
                        active_chat.append( data.msg );
                        const getScrollContainer = document.querySelector('.chat-conversation-box');
                        getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
                        last_message_id = data.last_message_id         
                        console.log(data)
                    }
                }
            });
            
        }
    </script>
    @break
    @case('videochats')
    <!-- <script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.3.21/rtc-js-prebuilt.js"></script>
    <script>
        var script = document.createElement("script");
        script.type = "text/javascript";

        script.addEventListener("load", function (event) {
            const meeting = new VideoSDKMeeting();

            const config = {
            name: "John Doe",
            apiKey: "51bc1640-a382-4ed9-a049-535b2b104f83", // generated in Setup
            meetingId: "milkyway", // enter your meeting id

            containerId: null,
            redirectOnLeave: "https://www.videosdk.live/",

            micEnabled: true,
            webcamEnabled: true,
            participantCanToggleSelfWebcam: true,
            participantCanToggleSelfMic: true,

            chatEnabled: true,
            screenShareEnabled: true,
            pollEnabled: true,
            whiteBoardEnabled: true,
            raiseHandEnabled: true,

            recordingEnabled: true,
            recordingWebhookUrl: "https://www.videosdk.live/callback",
            participantCanToggleRecording: true,

            brandingEnabled: true,
            brandLogoURL: "https://picsum.photos/200",
            brandName: "Awesome startup",
            poweredBy: true,

            participantCanLeave: true, // if false, leave button won't be visible

            // Live stream meeting to youtube
            livestream: {
                autoStart: true,
                outputs: [
                // {
                //   url: "rtmp://x.rtmp.youtube.com/live2",
                //   streamKey: "<STREAM KEY FROM YOUTUBE>",
                // },
                ],
            },

            whiteboardEnabled: true,

            permissions: {
                askToJoin: false, // Ask joined participants for entry in meeting
                toggleParticipantMic: true, // Can toggle other participant's mic
                toggleParticipantWebcam: true, // Can toggle other participant's webcam
                drawOnWhiteboard: true,
                toggleWhiteboard: true,

            },

            joinScreen: {
                visible: true, // Show the join screen ?
                title: "Daily scrum", // Meeting title
                meetingUrl: window.location.href, // Meeting joining url
            },
            };

            meeting.init(config);
        });

        script.src =
            "https://sdk.videosdk.live/rtc-js-prebuilt/0.1.21/rtc-js-prebuilt.js";
        document.getElementsByTagName("head")[0].appendChild(script);
        </script> -->
    @break

@endswitch
