<?php

class UserController extends DefaultController{
	public function login(){
		require_once 'src/views/log_in.php';
	}

	public function logOut(){
		session_unset();
		header('Location: ?p=login');
	}

	public function list(){
		$um = new UserManager();
		$users = $um->findAll();

		$liste_users = $users->fetchAll(PDO::FETCH_CLASS, 'User');
		
		$variables = compact('users', 'liste_users');
		parent::render('users_list.php', $variables);
	}

	public function update(){
		if(isset($_POST['role']) && !empty($_POST['role'])){
		
			$um = new UserManager();

			$user = $um->findOneById($_POST['id']);
			if($user->rowCount() == 1){
				$um->setRole($_POST['role'])
					->setId($_POST['id']);

				if($um->update()->rowCount() >= 1){
					echo "<p class='text-success'>User mis à jour.</p>";
					$_SESSION['role'] = $_POST['role'];
				}
				else{
					echo "<p class='text-danger'>Les données sont identiques.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>user introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}

	public function sendLogin(){
		if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
		{
			$um = new UserManager();
			$um->setPassword($_POST['password'])
				->setEmail($_POST['email']);
			$user = $um->log_in();

			
			if($user->rowCount() == 1){
				$user = $user->fetchObject('user');
				
				if(password_verify($_POST['password'], $user->getPassword())){
					$_SESSION["email"]=$user->getEmail();
					$_SESSION["role"]=$user->getRole();
					$_SESSION["nom"]=$user->getNom();
					
					header('Location: ?p=categorie');
				}
				else{
					echo "<p class='text-danger'>Mot de passe incorrect</p>";
				}

			}
			else{
				echo "<p class='text-danger'>Pas d'email correspondant.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}
	public function save(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['role']) && !empty($_POST['role'])){
				$um = new UserManager();
				$um->setEmail($_POST['email'])
					->setNom($_POST['nom'])
					->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT))
					->setRole("user");

				if($um->save()->rowCount() == 1){
					echo "<p class='text-success'>Utilisateur sauvegardé.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde.</p>";
				}
			}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}
}