<?php
class UserManager extends User{
	
	public function findAll(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM user";
		$req = $connexion->prepare($sql);
		$req->execute();

		return $req;
	}

	public function log_in(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM user WHERE email = :e";
		$req = $connexion->prepare($sql);
		$req->execute([
			'e' => $this->getEmail()
		]);

		return $req;
	}
	public function save(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "INSERT INTO user(nom, email, password, role) VALUES (:n, :e, :p, :r)";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'e' => $this->getEmail(),
			'p' => $this->getPassword(),
			'r' => $this->getRole(),
		]);

		return $req;
	}
	
	public function findOneById($id){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "SELECT * FROM user WHERE id = :id";
		$req = $connexion->prepare($sql);
		$req->execute(['id' => $id]);

		return $req;
	}

	public function update(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "UPDATE user SET role = :r WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'r' => $this->getRole(),
			'id'=> $this->getId()
		]);

		return $req;
	}

	public function delete(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();

		$sql = "DELETE FROM user WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id'=> $this->getId()
		]);

		return $req;
	}

}