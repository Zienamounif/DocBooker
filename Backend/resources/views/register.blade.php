<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>

<body> 
	
	  <form method=" post" action="{{route('register.store')}}">
	    <h1>Enter your Information to Regester</h1>
	    <br>
        <h3>User Name</h3>
        <input id="in" type="text" name="USER Name" placeholder="Please Your Name"> 
		<br>
		<br>
		<h3>User Password</h3>
		<input type="password" name="USER password" placeholder="Please Your password"> 
		<br>
		<br>
		<h3>User Email</h3>
		<input type="Email" name="USER Email" placeholder="Please Your Email"> 
		<br><br>
		<button>Sign up</button>
      </form>
    
</html>