<?php session_start(); 
  if(empty($_SESSION['user']) && $_SERVER['REQUEST_URI'] == '/notas.php')  
    header("Location: /index.php");
  else if(!empty($_SESSION['user']) && ($_SERVER['REQUEST_URI'] == '/index.php' || $_SERVER['REQUEST_URI'] == '/'))
    header("Location: /notas.php");
  ;?>
<!doctype html>
<html lang="en">
  <head>
    <title>App Notes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <header class="container-fluid nav-bar pt-3 pb-3">
    	<h1 class="text-white text-center block">App notes <i class="fa fa-sticky-note" aria-hidden="true"></i>
        <?php if(!empty($_SESSION['user'])):?>
        <h6 class="text-white text-right block">
          <i class="fa fa-user" aria-hidden="true"></i>
          <?php echo $_SESSION['user'];?> &nbsp;&nbsp;
          <a class="text-white" href="controllers/userController.php?action=sign-out">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a>
      </h6>
      <?php endif; ?>
</h1>
    </header>
    <div class="container pt-5">