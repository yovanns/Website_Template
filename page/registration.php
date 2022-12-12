<?php 

include 'header.php';
if(!empty($_SESSION["id"])){
	header("Location: index.php");
}

if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$broj = $_POST["broj"];
	$grad = $_POST["grad"];
	$date = $_POST["date"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	$duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
	if(mysqli_num_rows($duplicate) > 0){
		echo 
		"<script> alert('Username or Email Has Already Taken'); </script>";
	}
	else{
		if($password == $confirm_password){
			$query = "INSERT INTO user VALUES('', '$name', '$surname', '$username', '$email', '$broj', '$grad', '$date' ,'$password')";
			mysqli_query($conn,$query);
			echo 
			"<script> alert('Registration Successful'); </script>"; 
		}
		else{
			echo
			"<script> alert('Password Does Not Match');</script>";
		}
	}
}


?>

        <div class="container text-center text-white">
            <div class="row">
                <div class="col-lg-12 pt-5 center">
                    
                    <form class="" action="" method="post" autocomplete="off" style="display: inline !important;">
                    	<h1 class="mb-5 logreg-klasa-h2">Registration</h1>
                    	<!-- <label for="name">Name: </label> -->
                    	<input placeholder="Ime" type="text" name="name" id="name" required value=""> <br>
                    	<!-- <label for="surname">Last name: </label> -->
                    	<input placeholder="Prezime" type="text" name="surname" id="surname" required value=""> <br>
                    	<!-- <label for="username">Username: </label> -->
                    	<input placeholder="Username" type="text" name="username" id="username" required value=""> <br>
                    	<!-- <label for="email">Email: </label> -->
                    	<input placeholder="Email" type="email" name="email" id="email" required value=""> <br>
                    	<!-- <label for="broj">Broj telefona: </label> -->
                    	<input placeholder="Broj telefona" type="text" name="broj" id="broj" required value=""> <br>
                    	<label for="grad">Izaberi grad:</label>
                                <select name="grad" id="grad">
                                  <option value="podgorica">Podgorica</option>
                                  <option value="bar">Bar</option>
                                  <option value="niksic">Niksic</option>
                                  <option value="bp">Bijelo Polje</option>
                                </select>
                        <label for="date">Datum rodjenja:</label>
                        <input type="date" id="date" name="date"
                               value="1999-07-22"
                               min="1950-01-01" max="2006-01-01"> <br>       
                    	<!-- <label for="password">Password: </label> -->
                    	<input placeholder="Šifra" type="password" name="password" id="password" required value=""><br>
                    	<!-- <label for="confirm_password">Confirm password: </label> -->
                    	<input placeholder="Ponovite šifru" type="password" name="confirm_password" id="confirm_password" required value=""> <br>
                    	<button class="btn btn-light mt-5" id="buttonreglog" type="submit" name="submit">Register</button>

                    </form>
                    <br>
                    <p  class="mt-5">Have an account? <a href="login.php" class="link-primary">Login</a></p>
                </div>
               
            </div>
        </div>

	


<?php
include 'footer.php';

?>