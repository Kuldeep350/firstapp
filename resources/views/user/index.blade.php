<a href="{{url('user/create')}}">Add New User</a>

<table border="1" cellspacing="4" cellpadding="4">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	@foreach($users as $user)

	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
				<td><a href="{{url('user',$user->id)}}">View</a>/
			<a href="{{url('user',[$user->id,'edit'])}}">Edit</a>/
			<form method="POST" action="{{url('user',$user->id)}}">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="submit" name="submit"value="Delete">
			</form></td>
	</tr>
	@endforeach
	
</table>