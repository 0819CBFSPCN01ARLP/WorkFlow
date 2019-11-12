<?php require_once('includes/header.php');

$postId = $_GET['id'];
$editPost = $db->prepare("SELECT * FROM post WHERE id = :id");
$editPost->execute([
	":id" => $postId
]);
$elPost = $editPost->fetch(PDO::FETCH_ASSOC);

?>

<?php if ( isset($_SESSION["usuarioLogueado"]) ) { ?>

	<main class="container main">
		<div class="row">

			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-8 offset-lg-2 feed-content">

				<!-- START:SECTION -->
				<section class="user-post p-3 mb-3 bg rounded-border">
					<div class="row">
						<figure class="col-2 col-sm-2 col-lg-1 user-logo">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
						</figure>
						<div class="col-10 col-sm-10 col-lg-11 user-comment">
							<div class="user-comment-row">
								<p><strong>Hi <?php echo $userName; ?>!</strong></p>
								<form class="form--post" action="send-edit-post.php" method="post">
										<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
										<input type="hidden" name="nextUrl" value="<?php echo $_GET['nextUrl']; ?>">
										<textarea placeholder="What's going on?" name="post"><?php echo $elPost["text"]; ?></textarea>
										<a class="user-comment-image" href="#"><i class="fas fa-camera fa-2x"></i></a>
										<button type="submit" name="submit" class="btn-publish icon-gray">Save <i class="far fa-save"></i></button>
								</form>
							</div>
						</div>
					</div>
				</section><!-- END:SECTION-->


		</div>
	</main>
	<?php } else {
		header("Location: login.php");
	} ?>
	</body>
</html>
