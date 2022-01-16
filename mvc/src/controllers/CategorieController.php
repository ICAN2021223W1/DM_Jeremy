<?php

class CategorieController extends DefaultController{
	public function list(){

		$cm = new CategorieManager();
		$categories = $cm->findAll();

		$liste_categories = $categories->fetchAll(PDO::FETCH_CLASS, 'Categorie');
		
		$variables = compact('categories', 'liste_categories');
		parent::render('categorie_list.php', $variables);
	}

	public function save(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['description']) && !empty($_POST['description'])){
			
			$cm = new CategorieManager();
			$cm->setNom($_POST['nom'])
				->setDescription($_POST['description']);
			
			if($cm->save()->rowCount() == 1){
				echo "<p class='text-success'>categorie sauvegardée.</p>";
			}
			else{
				echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}

	public function show(){

		if(isset($_GET['categorie']) && !empty($_GET['categorie'])){

			$cm = new CategorieManager();
			$categorie = $cm->findOneById($_GET['categorie']);

			if($categorie->rowCount() == 1){
				$categorie = $categorie->fetchObject('categorie');

				$pm = new ProduitManager();
				$produits = $pm->findByCategorie($categorie->getId());

				$variables = compact('categorie', 'produits', 'pm');
				parent::render('categorie_show.php', $variables);
			}
			else{
				echo "<p class='text-danger'>produit introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Categorie introuvable.</p>";
		}
	}

	public function update(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_GET['categorie']) && !empty($_GET['categorie'])){
			
			$cm = new CategorieManager();

			$categorie = $cm->findOneById($_GET['categorie']);
			if($categorie->rowCount() == 1){
				$cm->setId($_GET['categorie'])
					->setNom($_POST['nom'])
					->setDescription($_POST['description']);

				if($cm->update()->rowCount() >= 1){
					echo "<p class='text-success'>categorie mise à jour.</p>";
				}
				else{
					echo "<p class='text-danger'>Les données sont identiques.</p>";
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

	public function delete(){
		if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
			
			$cm = new CategorieManager();

			$categorie = $cm->findOneById($_GET['categorie']);
			if($categorie->rowCount() == 1){
				$cm->setId($_GET['categorie']);

				if($cm->delete()->rowCount() >= 1){
					echo "<p class='text-warning'>categorie supprimée.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la suppression.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>categorie introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>categorie introuvable.</p>";
		}
	}
}