<?php 
	session_start(); 
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }       
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
<?php
$servername='localhost';
$uname='root';
$password='mysql123';
$dbname='hospital';
$username=$_SESSION['username'];
$conn=new mysqli($servername,$uname,$password,$dbname);
if($conn->connect_error){
die("connection failed :" . $conn->connect_error);
}

$sql="SELECT subject_A,subject_B,subject_c FROM marks where username='$username' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_assoc($result)){
$mark1=$row['subject_A'];
$mark2=$row['subject_B'];
$mark3=$row['subject_c'];
}
}
else {
echo "0 results";
}
$conn->close();
?>
</head>
<body>
	<div class="header">
		<h2>Result Card</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>              
                       <table class="highlight">         
                       <thead>
          <tr>
              <th>Name</th>
              <th>Subject A</th>
              <th>Subject B</th>
              <th>Subject C</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $username ;?></td>
            <td><?php echo $mark1 ;?></td>
            <td><?php echo $mark2  ;?></td>
            <td><?php echo $mark3 ;?></td>
          </tr>
        </tbody>
</table>                        
		<?php endif ?>
	</div>
		
</body>
</html>
