<?php
include_once 'header.php';


if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    $row["name"] = "Your";
    $row["surname"] = "full name";
    $row["email"] = "Your email";
}

?>



<div class="container">
	<div class="row">
		<div class="col-lg-12 pt-5 center div-contact-us">
	<h1 class="text-center second-section-h1 text-light mt-5 mb-5">Send an e-mail</h1>
	<form class="contact-form text-center form-contact-us" action="contactForm.php" method="post">
		<input type="text" name="name" placeholder="Full Name" value="<?php echo $row["name"],' ' ,$row["surname"]?>">
		<input type="text" name="mail" placeholder="Your e-mail" value="<?php echo $row["email"]?>">
		<input type="text" name="subject" placeholder="Subject">
		<textarea name="message" placeholder="Message"></textarea>
		<button class="btn btn-light mt-5" type="submit" name="submit">SEND MAIL</button>
	</form>

	<!-- <form action="https://formsubmit.co/your@email.com" method="POST">
     <input type="text" name="name" required>
     <input type="email" name="email" required>
     <button type="submit">Send</button> -->
</form>
</div>
</div>
</div>




<?php
include_once 'footer.php';
?>
