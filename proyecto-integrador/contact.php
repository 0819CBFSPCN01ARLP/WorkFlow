<?php

$name = null;
$errores=array();

// si vino info por POST
if (count($_POST)) {

	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];

    // Name
      if (empty($name)) {
        array_push($errores, "*The username field is empty.");
      } elseif (strlen($name) < 8) {
        array_push ($errores, "*The username must have at least 8 characters.");
        }

    // email
      if (empty($email)) {
        array_push($errores, "*The email field is empty.");
        } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)){
        array_push ($errores, "*The email is invalid. Please try again.");
        }

    // Message
    if (empty($message)) {
        array_push($errores, "*The message field is empty.");
    }
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
        <?php if (count($_POST) && ($errores)) : ?>
          <div class="alert alert-danger">
              <h4><strong>Oops!</strong></h4>
              <?php foreach ($errores as $error): ?>
                  <p><?php echo $error ?></p>
              <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <!-- Form -->
        <form class="form contact-form" style="color: #757575;" action="contact.php" method="post">

			<!-- Name -->
            <input type="text" placeholder="Name" name="name" value="<?php if(isset($name)) echo $name?>">
            
            <!-- E-mail -->
            <input type="email" placeholder="Email" name="email" value="<?php if(isset($email)) echo $email?>">

            <!-- Message -->
            <textarea id="materialContactFormMessage" name="message" placeholder="Message" rows="3" value="<?php if(isset($message)) echo $message?>"></textarea>

          	<!-- Send button -->
            <button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">SEND</button>
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->

		</article>

</main>
	</body>
</html>
