<?php
require_once('modele.php') ;
require_once('vue.php') ;

function CtlErreurForm($erreur){
	afficherErreurForm($erreur) ;
}

function CtlErreurDir($erreur){
	afficherErreurDir($erreur) ;
}

function CtlDeconnexion() {
	afficherAccueil() ;
}

function CtlConnexion($id, $mdp) {
	if (!empty($id) && !empty($mdp)) { 
		$perso=checkUserCo($id, $mdp) ;
		if ($perso!=null){
			if ($perso[0]->categorie=='directeur') {
				$erreur='' ;
				$infos='' ;
				$comptes=TypesComptes() ;
				$typescomptes=AfficherTypesComptes($comptes) ;
				require_once('gabaritDir.php') ;
			}
			elseif ($perso[0]->categorie=='conseiller') {
				require_once('gabaritCons.php') ;
			}
			elseif ($perso[0]->categorie=='agent') {
				require_once('gabaritAgent.php') ;
			}
		}
		else {
			throw new FormException("Login ou mot de passe incorrect") ;
		}
	} else {
		throw new FormException("Veuillez remplir les deux champs ci-dessus") ;
	}
}

function CtlAjouterEmploye($nom, $login, $mdp, $categorie) {
	$perso=UniciteLogin($login) ;
	if ($perso == null) {
		AjouterEmploye($nom, $login, $mdp, $categorie) ;
		$erreur='' ;
		$infos='' ;
		$comptes=TypesComptes() ;
		$typescomptes=AfficherTypesComptes($comptes) ;
		require_once('gabaritDir.php') ;
	} else {
		throw new DirException("Login déjà utilisé") ;
	}
}

function CtlRechercherEmploye($numEmploye) {
	if ($numEmploye != null) {
		if (is_numeric($numEmploye)) {
			$perso=RechercherEmploye($numEmploye) ;
			if ($perso != null) {
				AfficherInfosEmploye($perso[0]) ;
			} else {
				throw new DirException("Employé inexistant") ;
			}
		} else {
			throw new DirException("Veuillez rentrer une valeur numérique") ;
		}
	} else {
		throw new DirException("Veuillez rentrer un identifiant") ;
	}
}

function CtlModifLoginMdp($numEmploye, $nvlogin, $nvmdp) {
	if ($nvlogin != null) {
		$perso=UniciteLogin($nvlogin) ;
		if ($perso == null) {
			ModifLoginMdp($numEmploye, 'login', $nvlogin) ;
			$erreur='' ;
			$infos='' ;
			$comptes=TypesComptes() ;
			$typescomptes=AfficherTypesComptes($comptes) ;
			require_once('gabaritDir.php') ;
		} else {
			throw new DirException("Login déjà utilisé") ;
		}
	} if ($nvmdp != null) {
		ModifLoginMdp($numEmploye, 'mdp', $nvmdp) ;
		$erreur='' ;
		$infos='' ;
		$comptes=TypesComptes() ;
		$typescomptes=AfficherTypesComptes($comptes) ;
		require_once('gabaritDir.php') ;
	} if ($nvlogin == null && $nvmdp == null) {
		throw new DirException("Veuillez remplir au moins un champ") ;
	}
	
}

function CtlSuppTypeCompte($typeasupp) {
	SuppTypeCompte($typeasupp) ;
	$erreur='' ;
	$infos='' ;
	$comptes=TypesComptes() ;
	$typescomptes=AfficherTypesComptes($comptes) ;
	require_once('gabaritDir.php') ;
}

function CtlAjTypeCompte($nom) {
	$compte=UniciteTypeCompte($nom) ;
	if ($compte==null) {
		AjTypeCompte($nom) ;
		$erreur='' ;
		$infos='' ;
		$comptes=TypesComptes() ;
		$typescomptes=AfficherTypesComptes($comptes) ;
		require_once('gabaritDir.php') ;
	} else {
		throw new DirException('La banque propose déjà ce type de compte') ;
	}
}