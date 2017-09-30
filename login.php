<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"> </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
        <title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
       
       <div class="container">
       <nav>
       <div class="nav-wrapper teal lighten2">
       <img src="https://upload.wikimedia.org/wikipedia/en/f/fe/Srmseal.png" style="width:50px; height:70 px;">
       </div>
       </nav>
       </div> 
         <div class="header">
		<h2>Login</h2>
	 </div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			  <button type="submit" class="btn" name="login_user">Login</button> 
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</body>
</html>
