<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
  <form action="{{url('/department')}}" method="post">
    <label for="name">Name:</label>
    <input id="name" type="text" />
    <label for="childof">Child Of:</label>
    <input id="childof" type="text" />
    
    <input type="submit" value="Submit" />
</form>
</body>
</html>