<?php
require_once('includes/header.php');

$consulta_post = $db->prepare("SELECT * FROM post ORDER BY create_at DESC");
$consulta_post->execute();
$posteos = $consulta_post->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if ( isset($_SESSION["usuarioLogueado"]) ) { ?>
	<main class="container main profile">
		<div class="row">
			<!-- START: HEADER-USER -->
			<header class="col-12 col-sm-12 col-lg-12 mb-3">
				<div class="header-user bg">
					<div class="row">

							<div class="col-10 offset-1 col-sm-11 offset-sm-1 col-lg-11 offset-lg-1 user-info">
								<figure class="col-2 col-sm-2 col-lg-2 user-logo">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
								</figure>
								<p></p>
							</div>

					</div>
				</div>
			</header>
			<!-- END: HEADER-USER -->

			<!-- START: SIDEBAR -->
			<aside class="col-12 col-sm-12 col-lg-4">

				<!-- START:EDUCATION-BOX -->
				<article class="user-post mb-3 education bg rounded-border">
					<div class="row">
						<div class="col-2 col-sm-2 col-lg-2 pt-2 ico-box">
							<i class="fas fa-graduation-cap fa-2x"></i>
						</div>
						<div class="col-10 col-sm-10 col-lg-10 content-box">
							<ul class="mb-3">
								<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
								<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
							</ul>
						</div>
					</div>
				</article><!-- END:EDUCATION-BOX -->

				<!-- START:CONTACT-BOX -->
				<article class="user-post p-3 mb-3 user-contact bg rounded-border">
					<div class="row">
						<div class="col-2 col-sm-2 col-lg-2 ico-box">
							<i class="far fa-address-card fa-2x"></i>
						</div>
						<div class="col-10 col-sm-10 col-lg-10 content-box">
							<ul>
								<li><strong>Name:</strong> <?php echo $userName;?> <?php echo $userLastName;?>
								<li><strong>Email:</strong> <a href="mailto:<?php echo $userMail; ?>"><?php echo $userMail; ?></a></li>
								<li><strong>Telefono:</strong> 123456</li>
								<li><strong>Oficina:</strong> La Plata</li>
								<li><strong>Linkedin:</strong> /rossgeller</li>
								<li><strong>Faceook:</strong> /rossgeller </li>
								<li><strong>Instagram:</strong> @rossgeller</li>
							</ul>
						</div>
					</div>
				</article><!-- END:HASHTAG-BOX -->

			</aside><!-- END: SIDEBAR -->

			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-8 feed-content">

				<!-- START:ARTICLE -->
				<section class="user-comment p-3 mb-3 bg rounded-border">
					<div class="row">
						<div class="user-comment-row user-comment-row-no-arrow">
							<p><strong>Hi <?php echo $userName; ?>!</strong></p>
							<form class="form--post" action="send-post.php" method="post">
									<textarea placeholder="What's going on?" name="post"></textarea>
									<a class="user-comment-image" href="#"><i class="fas fa-camera fa-2x"></i></a>
									<button type="submit" name="submit" class="btn-publish icon-gray">Publish <i class="fab fa-telegram-plane"></i></button>
							</form>
						</div>
					</div>
				</section><!-- END:ARTICLE -->

				<!-- START:ARTICLE -->
				<section class="others-post p-3 mb-3">
					<div class="row">
						<?php foreach ($posteos as $post) : ?>
								<?php if ($post["user_id"] == $userId ) : ?>
									<?php  $postId = $post["id"]; ?>
									<article class="bg rounded-border" >
										<!-- START: USERS-COMMENTS -->
										<div class="col-12 col-sm-12 col-lg-12 user-info">
											<a href="#" class="user-logo mr-3">
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
												<span><?php echo $userName; ?></span>
											</a>
											<div class="user-actions">
												<a class="btn-edit icon-gray" href="edit-post.php?id=<?= $postId; ?>">Edit <i class="far fa-edit"></i> </a>
												<form class="form--post" action="delete-post.php" method="get">
														<input type="hidden" value="<?php echo $postId; ?>" name="postId"></input>
														<button type="submit" class="btn-delete icon-gray">Delete <i class="far fa-trash-alt"></i></button>
												</form>
											</div>
										</div>
										<div class="col-12 col-sm-12 col-lg-12 user-comment">
											<p><?php echo $post["text"]; ?></p>
											<img src="https://usabilitygeek.com/wp-content/uploads/2017/09/ux-before-ui-main.jpg" alt="">
										</div>
										<!-- END: USERS-COMMENTS -->

										<!-- START: FEEDBACK-ACTIONS -->
										<div class="col-12 col-sm-12 col-lg-12 p-3 feedback-actions">
											<ul>

												<li><a href="#"><i class="far fa-thumbs-up fa-2x"></i></a></li>
												<li>7 likes</li>
												<li class="ml-4"><a href="#"><i class="far fa-comment-dots fa-2x"></i></a></li>
												<li>10 comments</li>
											</ul>
										</div>
										<!-- START: FEEDBACK-ACTIONS -->
									</article>
							<?php endif; ?>
						<?php endforeach; ?>

					</div>
				</section><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->

		</div>

	</main>
	<?php } else {
		header("Location: error.php");
	} ?>
	</body>
</html>
