<?php

$name = null;
$errores=array();
// si vino info por POST
if (count($_POST)) {
	// Variables para persisitir la info:
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
}

?>

<?php require_once('includes/header.php'); ?>

<main class="container main">

	<!-- START:MAIN-CONTENT-COLUMN -->


<!-- START:ARTICLE -->
<article class="bg p-4 rounded-border mb-5 ">

	<!-- Material form contact -->
<div class="card col col-sm-12 col-lg-6 offset-lg-3 ">

    <h1 class="info-color white-text text-center py-4 mb-4">
        <strong>Contact us</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="contact.php" method="post">

				<div class="contact-form">
					<!-- Name -->
            <div class="md-form mt-3">
                <input type="text" placeholder="Name" name="name" class="form-control" value="<?php if(isset($name)) echo $name?>">
                <label for="materialContactFormName"></label>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" placeholder="Email" name="email" class="form-control" value="<?php if(isset($email)) echo $email?>">
                <label for="materialContactFormEmail"></label>
            </div>

            <!--Message-->
            <div class="md-form">
                <textarea id="materialContactFormMessage" name="message" placeholder="Message" class="form-control md-textarea" rows="3" value="<?php if(isset($message)) echo $message?>"></textarea>
                <label for="materialContactFormMessage"></label>
            </div>

          	<!-- Send button -->

            <button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">SEND</button>

						<?php require_once("validacion_contactUs.php"); ?>

					</div>
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->

		</article>

</main>
	</body>
</html>
