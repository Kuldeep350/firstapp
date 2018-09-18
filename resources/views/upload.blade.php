<!DOCTYPE html>
<html>
<head>
	<title> Upload File</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<br>
			<form action="{{ route('upload.file')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

				{{ csrf_field()}}
				<input type="file" name="file">
				<input type="submit" name="" class="btn btn-primary">
			</form>
			
		</div>

		<div class="row">
			<h1> Show file</h1>

			<img src="{{ asset('storage/upload/Battlefield.jpg')}}" alt="">
		</div>
		
	</div>
</body>
</html>