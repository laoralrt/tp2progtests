<?php

function afficherErreurForm($erreur){
    $erreur='<p>'.$erreur.'</p>' ;
	require_once('gabaritAccueil.php') ;
}

function afficherErreurDir($erreur){
	$infos='' ;
	$erreur='<p>'.$erreur.'</p>' ;
	$comptes=TypesComptes() ;
	$typescomptes=AfficherTypesComptes($comptes) ;
	require_once('gabaritDir.php') ;
}

function afficherAccueil() {
	$erreur='' ;
	require_once('gabaritAccueil.php') ;
}

function AfficherInfosEmploye($perso) {
	$erreur='' ;
	$infos='
	<p><label>Numéro d\'employé : </label><input type="text" name="numEmp" value="'.$perso->numEmploye.'" readonly /></p>
	<p><label>Nom : </label><input type="text" name="nom" value="'.$perso->nom.'" readonly /></p>
	<p><label>Login : </label><input type="text" name="login" value="'.$perso->login.'" readonly /></p>
	<p><label>Mot de passe : </label><input type="text" name="mdp" value="'.$perso->mdp.'" readonly /></p>
	<p><label>Catégorie : </label><input type="text" name="categorie" value="'.$perso->categorie.'" readonly /></p>
	<p>Modifier le login et le mot de passe : </p>
	<p><label>Nouveau login de l\'employé : </label><input type="text" name="nvlogin" /></p>
	<p><label>Nouveau mot de passe de l\'employé : </label><input type="text" name="nvmdp" /></p>
	<p><input type="submit" value="Modifier" name="modifloginmdp" /></p>
	' ;
	$comptes=TypesComptes() ;
	$typescomptes=AfficherTypesComptes($comptes) ;
	require_once('gabaritDir.php') ;
}

function AfficherTypesComptes($comptes) {
	$typescomptes='' ;
	if (!empty($comptes)) {
		$typescomptes.='
		<p>
		<label>'.$comptes[0]->nomTypeCompte.'</label>
		<input type="radio" name="typeasupprimer" value="'.$comptes[0]->nomTypeCompte.'" checked />
		</p>
		' ;
		for ($i=1 ; $i<count($comptes) ; $i++) {
			$typescomptes.='
			<p>
				<label>'.$comptes[$i]->nomTypeCompte.'</label>
				<input type="radio" name="typeasupprimer" value="'.$comptes[$i]->nomTypeCompte.'" />
			</p>
			' ;
		}
		$typescomptes.='
		<p><input type="submit" value="Supprimer compte" name="supprtypescomptes" /></p>
		' ;
	} else {
		$typescomptes='<p>La banque ne propose aucun type de compte</p>' ;
	}
	return $typescomptes ;
}