// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

var pusher = new Pusher($('#pusher').attr('app-key'), {
	cluster: $('#pusher').attr('cluster')
});

var channel = pusher.subscribe('laravel8x-notifications');
channel.bind('notifications', function(data) {
	$('.notification-count').text(data.unreadNotificationCount);
});