<?php

class ProduitController extends DefaultController{
	public function show(){

		if(isset($_GET['produit']) && !empty($_GET['produit'])){
			$pm = new ProduitManager();
			$produit = $pm->findOneById($_GET['produit']);

			if($produit->rowCount() == 1){
				$produit = $produit->fetchObject('produit');

				$variables = compact('produit');
				parent::render('produit_show.php', $variables);
			}
			else{
				echo "<p class='text-danger'>produit introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>produit introuvable.</p>";
		}
	}

	public function delete(){
		if(isset($_GET['produit']) && !empty($_GET['produit'])){
			
			$pm = new ProduitManager();

			$produit = $pm->findOneById($_GET['produit']);
			if($produit->rowCount() == 1){
				$pm->setId($_GET['produit']);

				if($pm->delete()->rowCount() >= 1){
					echo "<p class='text-warning'>produit supprimée.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la suppression.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>produit introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>produit introuvable.</p>";
		}
	}

	public function save(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['categorie']) && !empty($_POST['categorie']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['qte']) && !empty($_POST['qte'])){
			
			$em = new CategorieManager();
			$categorie = $em->findOneById($_POST['categorie']);
			if($categorie->rowCount() == 1){
				$pm = new ProduitManager();
				$pm->setNom($_POST['nom'])
					->setDescription($_POST['description'])
					->setPrix($_POST['prix'])
					->setQte($_POST['qte'])
					->setCategorie($_POST['categorie']);


				if($pm->save()->rowCount() == 1){
					echo "<p class='text-success'>produit sauvegardée.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>categorie introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}

	public function update(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['qte']) && !empty($_POST['qte'])){
		
			$pm = new ProduitManager();

			$produit = $pm->findOneById($_POST['id']);
			if($produit->rowCount() == 1){
				$pm->setNom($_POST['nom'])
					->setDescription($_POST['description'])
					->setPrix($_POST['prix'])
					->setQte($_POST['qte'])
					->setId($_POST['id']);

				if($pm->update()->rowCount() >= 1){
					echo "<p class='text-success'>produit mise à jour.</p>";
				}
				else{
					echo "<p class='text-danger'>Les données sont identiques.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>produit introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}
}