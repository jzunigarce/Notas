<?php 
	require_once('template/header.php'); 
	require_once('models/Nota.php');
	use app\model\Nota;

	$notas = Nota::findByUser($_SESSION['id']);
	

	 if(isset($_GET['error'])) : 
	 	if($_GET['error'] == 2) :
			$msj = 'Nota eliminada correctamente';
			$alert = "alert-success";
		elseif($_GET['error'] == 1) :
			$msj = 'Nota creado correctamente';
			$alert = "alert-success";
		elseif($_GET['error'] == -2): 
			$msj = 'Ocurrió un error al intentar guardar los datos de la nota';
			$alert = "alert-danger";
		elseif($_GET['error'] == -3): 
			$msj = 'Ocurrió un error al intentar eliminar la nota';
			$alert = "alert-danger";
		else: 
			$msj = 'Algunos campos se encuentran vacíos';
			$alert = "alert-danger";
		endif;?>
		<div class="alert <?php echo $alert;?> alert-dismissible fade show" role="alert">
			<?php echo $msj; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	<section class="justify-content-center">
		<div class="row">
			<div class="col-md-12">
				<form action="controllers/noteController.php?action=add" method="POST">
					<div class="input-group">
					  <input type="text" class="form-control" placeholder="Agregar nota" aria-label="note" name="note">
					  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-plus" aria-hidden="true"></i></span>
					</div>
				</form>
			</div>
		</div>
		<div class="ro mt-5">
			<div class="col-md-12" class="notes">
				<ul class="list-group">
				<?php foreach($notas as $nota): ?>
					<li class="list-group-item">
						<?php echo $nota->getContent(); ?>
						<a class="float-right" href="controllers/noteController.php?action=delete&note=<?php echo $nota->getId();?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>
<?php require_once('template/footer.php'); ?>