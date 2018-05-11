<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body onload="myFunction()">

<?php
require('db.php');
session_start();

#echo "Sum is: " . $_SESSION['sum'];

if (isset($_POST['username']) and isset($_POST['botdetection']))
{
	$integer = (int)$_POST['botdetection'];
	if($integer == $_SESSION['sum'])
	{
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
       	//escapes special characters in a string
	#$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	#$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `members` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query); # or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	// Redirect user to success.php
	header("Location: greatjobguy.txt");
   	}

	else{
	echo "<div class='form'>
	<h3>Username/password is incorrect.</h3>";
    	}
	}

	else
	{
		echo "<div class='form'>
	<h3>Wrong answer</h3>";
	}
}

$randNum1 = rand(1, 100);
$randNum2 = rand(1, 100);
$sum = $randNum1 + $randNum2;
$_SESSION['sum'] = $sum;
echo "<script>

function myFunction() {
     document.getElementById(\"botdetection\").placeholder = \"What is $randNum1 + $randNum2? \";
}
</script>";
?>

<div class="form">
<h1>Member Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" id="botdetection" name="botdetection" placeholder="You shouldn't be seeing this..." required />
<input name="submit" type="submit" value="Login" />
</form>
</div>

</body>
</html>
