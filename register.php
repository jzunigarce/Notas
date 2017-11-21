<?php 
	require_once('template/header.php'); 
	 if(isset($_GET['error'])) : 
		if($_GET['error'] == 1) :
			$msj = 'Usuario creado correctamente';
			$alert = "alert-success";
		elseif($_GET['error'] == -2): 
			$msj = 'Ocurrió un error al intentar guardar los datos del usuario';
			$alert = "alert-danger";
		else: 
			$msj = 'Allgunos campos se encuentran vacíos';
			$alert = "alert-danger";
		endif;?>
		<div class="alert <?php echo $alert;?> alert-dismissible fade show" role="alert">
			<?php echo $msj; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
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
<?php require_once('template/footer.php'); ?>