<?php

class User{
	private $id;
	private $nom;
	private $role;
	private $email;
	private $password;

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

	public function setEmail(string $email) : self
	{
		$this->email = $email;
		return $this;
	}
	public function getEmail() : string
	{
		return $this->email;
	}
	public function setPassword(string $password) : self
	{
		$this->password = $password;
		return $this;
	}
	public function getPassword() : string
	{
		return $this->password;
	}
	public function setRole(string $role) : self
	{
		$this->role = $role;
		return $this;
	}
	public function getRole() : string
	{
		return $this->role;
	}
}