<?php 
include 'header.php';

if(isset($_POST["submit"])){
	$usernameemail = $_POST["usernameemail"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0) {
		if($password == $row["password"]){
         $_SESSION["login"] = true;
         $_SESSION["id"] = $row["id"];
         $_SESSION["username"] = $row["username"];
         header("Location: index.php");
		}
		else {
		echo 
		"<script> alert('Wrong password'); </script>";
	}

	}
	else {
		echo 
		"<script> alert('User Not Registered'); </script>";
	}
}


?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<section class="pt-5 pb-5 text-center login-sekcija text-white">
	<form class="" action="" method="post" autocomplete="off">
		<h2 class="mb-1 logreg-klasa-h2">Login</h2>
		<label for="usernameemail">Username ili Email: </label>
		<input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required value><br>
		<button class="btn btn-light mt-5" type="submit" name="submit">Login</button>
	</form>
	<br>
	<p>Don't have an account? <a href="registration.php">Register</a></p>
</section>
<?php 
include_once 'footer.php';
?>


