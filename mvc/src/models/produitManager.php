<?php

class ProduitManager extends Produit{

	public function findByCategorie(int $id){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM produit WHERE categorie = :id";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req;
	}
	
	public function findAll(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM produit";
		$req = $connexion->prepare($sql);
		$req->execute();

		return $req;
	}

	public function save(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "INSERT INTO produit(nom, description, prix, qte, categorie) VALUES (:n, :d, :p, :q, :c);";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'd' => $this->getDescription(),
			'p' => $this->getPrix(),
			'q' => $this->getQte(),
			'c' => $this->getCategorie()
		]);

		return $req;
	}

	public function findOneById($id){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM produit WHERE id = :id";
		$req = $connexion->prepare($sql);
		$req->execute(['id' => $id]);

		return $req;
	}

	public function update(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "UPDATE produit SET nom = :n, description = :d, prix = :p, qte = :q WHERE id = :id";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'd' => $this->getDescription(),
			'p' => $this->getPrix(),
			'q' => $this->getQte(),
			'id' => $this->getId()
		]);

		return $req;
	}

	public function delete(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "DELETE FROM produit WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id'=> $this->getId()
		]);

		return $req;
	}
}