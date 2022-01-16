<?php

include_once 'inc.header.php';

require_once 'src/class/Autoload.php';
Autoload::load();

if(isset($_GET['p'])){

	switch ($_GET['p']) {
		case 'login':
			$uc = new UserController();
			$uc->login();
			break;
			
		case 'sendLogin':
			$uc = new UserController();
			$uc->sendLogin();
			break;

		case 'logOut':
			$uc = new UserController();
			$uc->logOut();
			break;

		case 'allUsers':
			$uc = new UserController();
			$uc->list();
			break;

		case 'user_update':
			$uc = new UserController();
			$uc->update();
			break;

		case 'addUser':
			$uc = new UserController();
			$uc->save();
			break;

		case 'categorie':
			$cc = new CategorieController();
			$cc->list();
			break;

		case 'categorie_insert':
			$cc = new CategorieController();
			$cc->save();
			break;

		case 'categorie_show':
			$cc = new CategorieController();
			$cc->show();
			break;

		case 'categorie_update':
			$cc = new CategorieController();
			$cc->update();
			break;

		case 'categorie_delete':
			$cc = new CategorieController();
			$cc->delete();
			break;

		case 'produit_show':
			$cc = new ProduitController();
			$cc->show();
			break;

		case 'produit_delete':
			$cc = new ProduitController();
			$cc->delete();
			break;

		case 'produit_insert':
			$cc = new ProduitController();
			$cc->save();
			break;

		case 'produit_update':
			$cc = new ProduitController();
			$cc->update();
			break;
		
		default:
			echo "<p class='alert alert-danger'>Erreur 404</p>";
			break;
	}
}
else{
	echo "<p class='alert alert-danger'>Erreur 404</p>";
}

include_once 'inc.footer.php';