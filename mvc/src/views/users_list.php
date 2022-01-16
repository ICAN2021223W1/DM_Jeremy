<h1>Categorie</h1>
<?php

	if($users->rowCount() > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Email</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($liste_users as $user) {
						?>
						<tr>
							<td><?= $user->getNom(); ?></td>
							<td><?= $user->getEmail(); ?></td>
							<td>
							<form action="index.php?p=user_update" method="POST">
								<input type="hidden" name="id" value="<?= $user->getId() ?>">
								<select name="role" id="role">
									<?php 
									if($user->getRole() === "admin"){
										?>
										<option value="admin">Admin</option>
										<option value="user">User</option>
										<?php
									}
									else{
										?>
										<option value="user">User</option>
										<option value="admin">Admin</option>
										<?php
									}
									?>
								</select>
								<input type="submit" name="user_update" value="Mettre à jour" class="btn btn-primary">
							</form>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<?php
	}
	else{
		echo "<p>Il n'y a aucune catégorie</p><hr>";
	}
?>

<div class="addCate" style="display : <?= isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? 'block' : 'none'?>">
	<h2>Ajouter une catégorie</h2>
	<form action="index.php?p=categorie_insert" method="POST">
		<label for="nom">Nom :</label>
		<br>
		<input type="text" name="nom" id="nom">
		<br>
		<label for="description">Description :</label>
		<br>
		<input type="text" name="description" id="description">
		<br><br>
		<input type="submit" name="ajout_categorie" value="Ajouter" class="btn btn-primary">
	</form>
</div>