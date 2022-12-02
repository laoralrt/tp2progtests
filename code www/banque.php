<?php
require_once('controleur.php') ;

class FormException extends Exception {}
class DirException extends Exception {}

try {
	if (isset($_POST['seconnecter'])) {
		$id=$_POST['id'] ;
		$mdp=$_POST['pass'] ;
		CtlConnexion($id, $mdp) ;
	}
	elseif (isset($_POST['ajouteremploye'])) {
		$nom=$_POST['nom'] ;
		$login=$_POST['login'] ;
		$mdp=$_POST['mdp'] ;
		$categorie=$_POST['categorie'] ;
		CtlAjouterEmploye($nom, $login, $mdp, $categorie) ;
	}
	elseif(isset($_POST['rechercheemploye'])) {
		$numEmploye=$_POST['numEmploye'] ;
		CtlRechercherEmploye($numEmploye) ;
	}
	elseif(isset($_POST['modifloginmdp'])) {
		$numEmploye=$_POST['numEmp'] ;
		$nvlogin=$_POST['nvlogin'] ;
		$nvmdp=$_POST['nvmdp'] ;
		CtlModifLoginMdp($numEmploye, $nvlogin, $nvmdp) ;
	}
	elseif(isset($_POST['supprtypescomptes'])) {
		$typeasupp=$_POST['typeasupprimer'] ;
		CtlSuppTypeCompte($typeasupp) ;
	}
	elseif(isset($_POST['ajtypecompte'])) {
		$nom=$_POST['nomTypeCompte'] ;
		CtlAjTypeCompte($nom) ;
	}
	else {
		CtlDeconnexion() ;
	}
}

catch(FormException $e) {     
	// erreur dans le formulaire de connexion
    $msg = $e->getMessage() ;   // on récupère son code 
    CtlErreurForm($msg) ;    // on appelle le contrôleur qui gère les erreurs. 
}
catch(DirException $e) {
	// erreur sur la page du directeur
	$msg=$e->getMessage() ;
	CtlErreurDir($msg) ;
}
	