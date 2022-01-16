<h1><?= $produit->getNom(); ?></h1>

<?php
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Qte</th>
					<th>Categorie</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= $produit->getNom(); ?></td>
					<td><?= $produit->getDescription(); ?></td>
					<td><?= $produit->getPrix(); ?></td>
					<td><?= $produit->getQte(); ?></td>
					<td><?= $produit->getCategorie(); ?></td>
					<td style="display : <?= isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? 'block' : 'none'?>">
						<a href="index.php?p=produit_delete&produit=<?= $produit->getId(); ?>" class="btn btn-danger">Supprimer</a>
					</td>
				</tr>
			</tbody>
		</table>
<div class="addCate" style="display : <?= isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? 'block' : 'none'?>">
	<h2>Modifier le produit</h2>
	<form action="index.php?p=produit_update" method="POST">
		<input type="hidden" name="id" value="<?= $produit->getId(); ?>">
		<label for="nom">Nom :</label>
		<br>
		<input type="text" name="nom" id="nom" value="<?= $produit->getNom(); ?>">
		<br>
		<label for="description">Description :</label>
		<br>
		<input type="text" name="description" id="description" value="<?= $produit->getDescription(); ?>">
		<br>
		<label for="prix">Prix :</label>
		<br>
		<input type="number" name="prix" id="prix" value="<?= $produit->getPrix(); ?>">
		<br>
		<label for="qte">Qte :</label>
		<br>
		<input type="number" name="qte" id="qte" value="<?= $produit->getQte(); ?>">

		<br><br>
		<input type="submit" name="update_produit" value="Mettre à jour" class="btn btn-primary">
	</form>
</div>