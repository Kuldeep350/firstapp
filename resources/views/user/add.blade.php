<form method="post" action="{{url('user')}}">
Name:<input type="text" name="name"><br><br>
Email:<input type="text" name="email"><br><br>
{{csrf_field()}}
<input type="submit" name="save">


</form>