<!DOCTYPE html>
<html>
<head>
	<title>Sign in </title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	<header>
		<h2> USER LOGIN </h2>
	</header>
	<div>
	  <form method="post" action="{{route('login.store')}}" ></form>
		 <br>
		 <h3>User Name</h3>
		 <input type="text" name="USER Name" placeholder="Please Your Name"> 
		 <br>
		 <h3>User Password</h3>
		 <input type="password" name="USER password" placeholder="please Your password">
		 <br>
		 <br>
		 <button id="log">LOGIN</button> 
		 <a id="link" href="{{route('register.show')}}">Create Account?</a>
		 <br><br>
     </form> 
	</div>
		
</body>
</html>