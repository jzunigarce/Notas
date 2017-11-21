
	<section class="login d-flex justify-content-center">
		<form action="controllers/userController.php?action=register" method="POST">
			<div class="form-group">
				<label for="firstName">Nombre</label>
				<input type="text" class="form-control" name="firstName">
			</div>
			<div class="form-group">
				<label for="lastName">Apellido</label>
				<input type="text" class="form-control" name="lastName">
			</div>
			<div class="form-group">
				<label for="">Correo Electrónico</label>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button class="btn btn-purple btn-block">Registrar</button>
		</form>
	</section>
	<section class="mt-2 text-center">
		<a href="index.php">Iniciar Sesión</a>
	</section>