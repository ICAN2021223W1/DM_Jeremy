<?php
class CategorieManager extends Categorie{
	
	public function findAll(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM categorie";
		$req = $connexion->prepare($sql);
		$req->execute();

		return $req;
	}

	public function save(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "INSERT INTO categorie(nom, description) VALUES (:n, :d);";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'd' => $this->getDescription()
		]);

		return $req;
	}

	public function findOneById($id){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM categorie WHERE id = :id";
		$req = $connexion->prepare($sql);
		$req->execute(['id' => $id]);

		return $req;
	}

	public function update(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "UPDATE categorie SET nom = :n, description = :d WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'd' => $this->getDescription(),
			'id'=> $this->getId()
		]);

		return $req;
	}

	public function delete(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "DELETE FROM categorie WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id'=> $this->getId()
		]);

		return $req;
	}

}