<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload file storage</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		@csrf
		<input type="file" name="file">
		<button type="submit">submit</button>
	</form>
</body>
</html>