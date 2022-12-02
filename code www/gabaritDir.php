<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Directeur</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
		<div>
			<br/>
			<?php echo $erreur ; ?>
			<br/>
			<p><h3>Bienvenue sur la page du directeur</h3></p>
			<br/>
			<form action="banque.php" method="post">
				<fieldset>
					<legend>Ajouter un employé</legend>
						<p><label>Nom : </label><input type="text" name="nom" required /></p>
						<p><label>Login : </label><input type="text" name="login" required /></p>
						<p><label>Mot de passe : </label><input type="text" name="mdp" required /></p>
						<p><label>Catégorie : </label>
							<label>Conseiller </label><input type="radio" name="categorie" value="conseiller" checked />
							<label>Agent d'accueil </label><input type="radio" name="categorie" value="agent" />
						</p>
						<p><input type="submit" value="Ajouter" name="ajouteremploye" /></p>
				</fieldset>
			</form>
			
			<form action="banque.php" method="post">
				<fieldset>
					<legend>Rechercher un employé</legend>
						<p><label>Numéro d'employé : </label><input type="text" min="1" name="numEmploye" /></p>
						<p><input type="submit" value="Rechercher" name="rechercheemploye" /></p>
						<?php echo $infos ; ?>
				</fieldset>
			</form>
			
			<form action="banque.php" method="post">
				<fieldset>
					<legend>Ajouter un type de compte</legend>
						<p><label>Nouveau type de compte : </label><input type="text" name="nomTypeCompte" required /></p>
						<p><input type="submit" name="ajtypecompte" value="Ajouter" /></p>
				</fieldset>
			</form>
			
			<form action="banque.php" method="post">
				<fieldset>
					<legend>Types de comptes</legend>
						<?php echo $typescomptes ; ?>
				</fieldset>
			</form>
			
			<form action="banque.php" method="post">
				<p><input type="submit" value="Déconnexion" name="deconnexion" /></p>
			</form>
			<br/>
		</div>
	</body>
</html>