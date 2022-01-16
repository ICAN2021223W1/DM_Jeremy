<?php
	$url = "/roleMvc/mvc/src/";
	$urlWithoutSrc = "/roleMvc/mvc/";
	$path = "/Applications/MAMP/htdocs".$url;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Tous nos produits</title>
</head>
<body style="padding: 2rem;">
	<header>
		<div class="myAcc">
			<?php 
			session_start(); 
			if(!isset($_SESSION['email']))
			{
				?> 
				<p class='pl-3 text-warning'> Vous n'êtes pas connecter 
					<a href="index.php?p=login">se connecter</a>
				</p>
				<p class='pl-3 text-warning' style="font-size: 13px;"> Vous devez etre connecté pour voir les produits </p>
				<?php
			}
			else
			{
				?> 
				<form action="index.php?p=logOut" method="POST">
					<input type="submit" value="Deconnexion" class="btn btn-danger" style="float: right;"> 
				</form>
				<p class='text-success'> Vous êtes connecté sous : <?= $_SESSION['email'] ?></p>
				<?php
			}
			
			?>
		</div>
		<nav>
			<ul style="display: flex;">
				<li style="padding-right: 50px;"><a href="<?= $url; ?>../?p=categorie">Accueil</a></li>
				<li style="display : <?= isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? '' : 'none'?>">
					<a href="<?= $url; ?>../?p=allUsers">Liste des users</a>
				</li>
			</ul>
		</nav>
	</header>
	<main class="container">