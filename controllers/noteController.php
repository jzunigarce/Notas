<?php 
	namespace app\controller;
	session_start(); 

	require_once('../models/Nota.php');
	
	use app\model\Nota;

	if(isset($_GET['action'])) {
		$action = $_GET['action'];

		switch($action) {
			case 'add':
				if(!empty($_POST['note'])) {
					$nota = new Nota();
					$nota->setIdUser($_SESSION['id']);
					$nota->setContent($_POST['note']);                                                                                                        
					$result = $nota->create() ? 1 : -1;
					header("Location: /notas.php?error=$result");
				}  else {
					header("Location: /notas.php?error=-2");
				}
				break;
			case 'delete':
				if(!empty($_GET['note'])) {
					$result = Nota::delete($_GET['note']) ? 2 : -3;
					header("Location: /notas.php?error=$result");
				}  else {
					header("Location: /notas.php?error=-3");
				}
				break;
			default:
				header("Location: /index.php");
		}
	} else {
			header("Location: /index.php");
	}