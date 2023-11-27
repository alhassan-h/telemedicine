

function send_msg() {

	const msg = $('#msg-write-box').val();

	if ( '' === msg ) return;
	
	const sent_msg = '<div class="bubble me"><div class="msg"><span>'+ msg +'</span></div><div class="timestamp"><span>8:25 AM</span></div></div>';
	const active_chat = $('.active-chat').eq(0);
	active_chat.append( sent_msg );
    const getScrollContainer = document.querySelector('.chat-conversation-box');
    getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
	$('#msg-write-box').val('');
	
}


/*	chatroom	*/
const ps = new PerfectScrollbar('.chat-conversation-box', {
    suppressScrollX : true
  });

const getScrollContainer = document.querySelector('.chat-conversation-box');
getScrollContainer.scrollTop = getScrollContainer.scrollHeight;

$("#send-msg").on('click', send_msg);

$('#msg-write-box').on('keydown', function(event) {
    if(event.key === 'Enter') {
      send_msg();
    }
});





/*	grade report*/
// print action
// $('.action-print').on('click', function(event) {
//   event.preventDefault();
//   /* Act on the event */
//   window.print();
// });