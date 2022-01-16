<h1><?= $categorie->getNom(); ?></h1>
<p><?= $categorie->getDescription(); ?></p>

<h2>Liste des produits dans la catégorie</h2>
<?php
	
	if($produits->rowCount() >= 1){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Produit</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Qte</th>
					<th>Categorie</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$liste_produits = $produits->fetchAll(PDO::FETCH_CLASS, 'produit');
					foreach ($liste_produits as $produit) {
						?>
						<tr>
							<td><?= $produit->getNom(); ?></td>
							<td><?= $produit->getDescription(); ?></td>
							<td><?= $produit->getPrix(); ?></td>
							<td><?= $produit->getQte(); ?></td>
							<td style="display : <?= isset($_SESSION['email']) ? 'block' : 'none'?>">
								<a href="index.php?p=produit_show&produit=<?= $produit->getId(); ?>" class="btn btn-primary" style="display : <?= isset($_SESSION['email']) ? 'inline-block' : 'none'?>">Afficher</a>
								<a href="index.php?p=produit_delete&produit=<?= $produit->getId(); ?>" class="btn btn-danger" style="display : <?= $_SESSION['role'] === 'admin' ? '' : 'none'?>">Supprimer</a>
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
		echo "<p>Il n'y a aucun produit dans cette catégorie</p><hr>";
	}
?>

<div class="addCate" style="display : <?= isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? 'block' : 'none'?>">
	<h2>Modifier catégorie</h2>
	<form action="index.php?p=categorie_update&categorie=<?= $_GET['categorie']; ?>" method="POST">
		<label for="nom">Nom :</label>
		<br>
		<input type="text" name="nom" id="nom" value="<?= $categorie->getNom(); ?>">
		<br>
		<label for="description">description :</label>
		<br>
		<input type="text" name="description" id="description" value="<?= $categorie->getDescription(); ?>">
		<br><br>
		<input type="submit" name="update_categorie" value="Mettre à jour" class="btn btn-primary">
	</form>

	<hr>
		
	<h2>Ajouter un produit dans catégorie</h2>
	<form action="index.php?p=produit_insert" method="POST">
		<input type="hidden" name="categorie" value="<?= $categorie->getId(); ?>">
		<label for="promo">Nom :</label>
		<br>
		<input type="text" name="nom" id="nom">
		<br>
		<label for="promo">Description :</label>
		<br>
		<input type="text" name="description" id="description">
		<br>
		<label for="promo">Prix :</label>
		<br>
		<input type="number" name="prix" id="prix">
		<br>
		<label for="promo">Qte :</label>
		<br>
		<input type="number" name="qte" id="qte">
		<br><br>
		<input type="submit" name="insert_produit" value="Ajouter" class="btn btn-primary">
	</form>
</div>	