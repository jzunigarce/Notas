<?php 
	namespace app\controller;
	session_start(); 

	require_once('../models/User.php');
	
	use app\model\User;

	if(isset($_GET['action'])) {
		$action = $_GET['action'];

		switch($action) {
			case 'register':
				if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
					$user = new User();
					$user->setFirstName($_POST['firstName']);
					$user->setLastName($_POST['lastName']);
					$user->setEmail($_POST['email']);
					$user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
					$result = $user->create() ? 1 : -1;
					header("Location: /register.php?error=$result");
				}  else {
					header("Location: /register.php?error=-2");
				}
				break;
			case 'login':
				if(!empty($_POST['email']) && !empty($_POST['password'])) {
					$password = $_POST['password'];
					$user = User::findByEmail($_POST['email']);
					var_dump(password_verify($password, $user->getPassword()));
					if (!is_null($user) && password_verify($password, $user->getPassword())) {
						header("Location: /notas.php");
						$_SESSION['user'] = $user->getEmail();
					} else { 
						header("Location: /index.php?error=-1");
					}
				}
				break;
			case 'sign-out':
				unset($_SESSION['user']);
				header("Location: /index.php");
				break;
			default:
				header("Location: /index.php");
		}
	} else {
			header("Location: /index.php");
	}
 ?>