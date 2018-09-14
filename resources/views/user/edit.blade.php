<form method="post" action="{{url('user',$users->id)}}">
	<input type="hidden" name="_method" value="PUT">
	{{csrf_field()}}
	Name:<input type="text" name="name" value="{{$users->name}}"><br><br>
	Email:<input type="text" name="email"value="{{$users->email}}"><br><br>
	<input type="submit" name="submit" value="update record">
</form>