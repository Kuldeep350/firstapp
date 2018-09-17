</!DOCTYPE html>
<html>
<head>
	<title>Laravel Image Upload</title>
	 <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  >
</head>
<body>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1> Laravel Image Upload</h1>
				</div>
				<div class="panel-body">
					<form action="{{url('image-upload')}}" enctype="multipart/form-data" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-12">
								<input type="file" name="image"/><br>
							</div>
							<div class="col-md-12">
								<button type="submit" name="" class="btn btn-success"> Upload</button> 
							</div>
						</div>
						
					</form>
											
				</div>
				
			</div>

		</div>
</body>
</html>