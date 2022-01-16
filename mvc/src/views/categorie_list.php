<h1>Categorie</h1>
<?php
	if($categories->rowCount() > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($liste_categories as $categorie) {
						?>
						<tr>
							<td><?= $categorie->getNom(); ?></td>
							<td><?= $categorie->getDescription(); ?></td>
							<td style="display : <?= isset($_SESSION['email']) ? 'block' : 'none'?>">
								<a href="index.php?p=categorie_show&categorie=<?= $categorie->getId(); ?>" class="btn btn-primary" style="display : <?= isset($_SESSION['email']) ? 'inline-block' : 'none'?>">Afficher</a>
								<a href="index.php?p=categorie_delete&categorie=<?= $categorie->getId(); ?>" class="btn btn-danger" style="display : <?= $_SESSION['role'] === 'admin' ? '' : 'none'?>">Supprimer</a>
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