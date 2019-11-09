<?php require_once('includes/header.php');
if (count($_POST)) {
	$post = $_POST["post"];
	$insertar = $db->prepare("INSERT into post
	values (null, '$post', null, null, $getUsuarioId, NOW() )");
	$insertar -> execute();
}

$consulta_post = $db->prepare("SELECT * FROM post ORDER BY create_at DESC");
$consulta_post->execute();
$posteos = $consulta_post->fetchAll(PDO::FETCH_ASSOC);

?>

	<main class="container main">
		<div class="row">

			<!-- START:SECTION -->
			<?php require_once('includes/sidebar-mobile.php'); ?>
			<!-- END:SECTION -->

			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-8 feed-content">

				<!-- START:SECTION -->
				<section class="user-post p-3 mb-3 bg rounded-border">
					<div class="row">
						<figure class="col-2 col-sm-2 col-lg-1 user-logo">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
						</figure>
						<div class="col-10 col-sm-10 col-lg-11 user-comment">
							<div class="user-comment-row">
								<form class="form--post" action="index.php?id=<?php echo $getUsuarioId ?>" method="post">
										<p><strong>Hi <?php echo $username; ?>!</strong></p>
										<textarea placeholder="What's going on?" name="post"></textarea>
										<a class="user-comment-image" href="#"><i class="fas fa-camera fa-2x"></i></a>
										<button type="submit" name="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</section><!-- END:SECTION-->

				<!-- START:SECTION -->
				<section class="others-post p-3 mb-3">
					<div class="row">
						<?php foreach ($posteos as $post) : ?>
							<article class="bg rounded-border">
								<!-- START: USERS-COMMENTS -->
								<div class="col-12 col-sm-12 col-lg-12 user-info">
									<a href="#" class="user-logo mr-3">
										<img src="https://ae01.alicdn.com/kf/HTB1Pi8ScpGWBuNjy0Fbq6z4sXXaX/ibboll-Luxury-Optical-Glasses-2018-Classic-Eye-Glasses-Frames-for-Men-Fashion-Clear-Eyeglasses-Male-Round.jpg" alt="">
										<span>Lean Taylor</span>
									</a>
								</div>
								<div class="col-12 col-sm-12 col-lg-12 user-comment">
									<p><?php echo $post["text"]; ?></p>
									<img src="https://mediaonemarketing.com.sg/wp-content/uploads/2019/07/think-like-UX-designer-1080x600.jpg" alt="">
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
					<?php endforeach; ?>
					</div>
				</section><!-- END:MAIN-CONTENT-COLUMN -->
			</section>

			<!-- START: SIDEBAR -->
			<?php require_once('includes/sidebar.php'); ?>
			<!-- END: SIDEBAR -->

		</div>
	</main>

	</body>
</html>
