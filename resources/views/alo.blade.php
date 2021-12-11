<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alo</title>
	<meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
	<h1>Alo</h1>
	@section('content')
		{{$alo}}
	@show
</body>
</html>