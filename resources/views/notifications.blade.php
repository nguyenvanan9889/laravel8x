@extends('master')
@section('content')
	<h1>Thông báo <span class="notification-count">({{$user->unreadNotifications->count()}})</span></h1>
	<ul>
		@foreach($user->unreadNotifications as $notify)
			<li>
				<div class="info">
					<p>Tiêu đề: {{$notify->data['title']}}</p>
				</div>
				<a href="{{route('mark-as-read-notification')}}?id={{$notify->id}}" class="alert alert-success">Xem</a>
			</li>
		@endforeach
	</ul>
@stop