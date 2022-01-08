<!DOCTYPE html>
<head>
	<title>Chat realtime pusher</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
	<style type="text/css">
		.chat-timeline {
		    width: 300px;
		    margin: auto;
		    background: #cdcdcd;
		    min-height: 200px;
		    padding-bottom: 25px;
		    position: relative;
		}

		.chat-timeline form input {
		    width: 80%;
		}

		.chat-timeline form button {
		    width: 16%;
		    cursor: pointer;
		}

		.chat-timeline form {
		    position: absolute;
		    bottom: 0px;
		    width: 100%;
		}

		.chat-timeline .list {
		    list-style: none;
		    padding: 10px;
		    margin: 0px;
		}

		.chat-timeline .list .me {
		    text-align: right;
		}

		.chat-timeline .list li {
		    margin-bottom: 10px;
		    color: #333;
		    padding: 3px;
		    border-radius: 5px;
		}

		.chat-timeline .list .partner {
		    background-color: #cdcdcd;
		}

		.chat-timeline .list .me {
		    background-color: blue;
		    color: #fff;
		}

		.chat-timeline .list .partner {
		    background-color: #fff;
		    color: #333;
		}
	</style>
</head>
<body>
	<h1>Pusher Test</h1>
	<div class="chat-timeline">
		<ul class="list">
			
		</ul>
		<form action="" method="post">
			@csrf
			<input type="text" name="content" placeholder="Nhập nội dung...">
			<button type="submit">Gửi</button>
		</form>
	</div>
	<script>
	    // Enable pusher logging - don't include this in production
	    Pusher.logToConsole = true;
	    var pusher = new Pusher('546dd0b9a73b7af8a2bb', {
	      cluster: 'ap1'
	    });
	    var channel = pusher.subscribe('chat{{$username}}');
	    channel.bind('chat', function(data) {
	    	$('.chat-timeline .list').prepend('<li class="partner">'+data.content+'<li>');
	    });

	    $('.chat-timeline form').submit(function(event) {
	    	event.preventDefault();
	    	$.ajax({
	    		url: $(this).attr('action'),
	    		type: 'post',
	    		dataType: 'json',
	    		data: $(this).serialize(),
	    	})
	    	.done(function(json) {
	    		if (json.code == 200) {
	    			$('.chat-timeline .list').prepend('<li class="me">'+json.content+'<li>');
	    		}
	    		else {
	    			alert(json.message);
	    		}
	    	})
	    });
  </script>
</body>