<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach($users as $user)		
		
			@foreach($user as $key=>$value)
				{{$value}}
			@endforeach
		
	@endforeach

</body>
</html>