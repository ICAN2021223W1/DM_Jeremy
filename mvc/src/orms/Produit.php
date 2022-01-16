<?php

class Produit{
	private $id;
	private $nom;
	private $prix;
	private $qte;
	private $categorie;
	private $description;

	public function setId(int $id) : self
	{
		$this->id = $id;
		return $this;
	}
	public function getId() : int
	{
		return $this->id;
	}

	public function setNom(string $nom) : self
	{
		$this->nom = $nom;
		return $this;
	}
	public function getNom() : string
	{
		return $this->nom;
	}

	public function setQte(int $qte) : self
	{
		$this->qte = $qte;
		return $this;
	}
	public function getQte() : int
	{
		return $this->qte;
	}
	public function setPrix(int $prix) : self
	{
		$this->prix = $prix;
		return $this;
	}
	public function getPrix() : int
	{
		return $this->prix;
	}
	public function setDescription(string $description) : self
	{
		$this->description = $description;
		return $this;
	}
	public function getDescription() : string
	{
		return $this->description;
	}
	
	public function setCategorie(int $categorie) : self
	{
		$this->categorie = $categorie;
		return $this;
	}
	public function getCategorie() : int
	{
		return $this->categorie;
	}
}