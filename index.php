<?php require_once('template/header.php'); 
	 if(isset($_GET['error']) && $_GET['error'] == -1) : ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Usuario o contraseña incorrecto
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	<section class="login d-flex justify-content-center">
		<form action="controllers/userController.php?action=login" method="POST">
			<div class="form-group">
				<label for="">Correo Electrónico</label>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button class="btn btn-purple btn-block">Iniciar sesión</button>
		</form>
	</section>
	<section class="mt-2 text-center">
		<a href="register.php">Crear cuenta</a>
	</section>
<?php require_once('template/footer.php'); ?>