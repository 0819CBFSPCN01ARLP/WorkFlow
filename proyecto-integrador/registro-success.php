<?php require_once('includes/header.php'); 
foreach ($usuarios as $usuario){
	$_SESSION["usuarioLogueado"] = $usuario;
}
?>

	<main class="container main">


			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-12">

				<!-- START:ARTICLE -->
				<article class="bg p-5 rounded-border mb-5">
					<div class="row">
						<div class="col-10 offset-1 col-lg-6 offset-lg-3">
							<h1 class="mb-5 text-center"><strong>Gracias!</strong></h1>
							<div>
                	<p>Tu perfil fue registrado con exito!</p>
                	<a href="index.php">Continuar</a>
              </div>
						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->


	</main>

	</body>
</html>
