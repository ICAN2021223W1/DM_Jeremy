<?php

class Categorie{
	private $id;
	private $nom;
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

	public function setDescription(string $description) : self
	{
		$this->description = $description;
		return $this;
	}
	public function getDescription() : string
	{
		return $this->description;
	}
}