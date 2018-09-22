<!DOCTYPE html>
<html>
<head>
	<title>Multiple image</title>
</head>
<body>
<form action="store" method="post" enctype="multipart/form-data">
	<label for="name">Name</label>
	<input type="text" name="name"><br/><br>

	<label for="image">Image</label>
	<input type="file" name="image"><br/><br>

	<input type="hidden" name="_token" value="{{csrf_token()}}">
	
	<input type="submit"  name="submit" value="Submit">

</form>
</body>
</html>