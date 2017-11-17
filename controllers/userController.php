<?php 
	namespace app\controller; 

	require_once('../models/User.php');
	
	use app\model\User;

	if(isset($_GET['action'])) {
		$action = $_GET['action'];

		if (!empty($_POST) && $action === 'register') {
			if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
				$user = new User();
				$user->setFirstName($_POST['firstName']);
				$user->setLastName($_POST['lastName']);
				$user->setEmail($_POST['email']);
				$user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
				$result = $user->create() ? 0 : -1;
				header("Location: /register.php?error=$result");
			}  else {
				header("Location: /register.php?error=-2");
			}
		} else {
			header("Location: /index.php");
		}
	} else {
			header("Location: /index.php");
	}
 ?>