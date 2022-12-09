<?php
require_once('connect.php') ;

function getConnect(){
	$connexion = new PDO('mysql:host='.dbhost.';dbname='.db,dbuser,dbpass) ;
	$connexion -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
	$connexion -> query ("SET NAMES UTF8") ;
	return $connexion;
}

function checkUserCo($id, $mdp) {
	$connexion=getConnect() ;
	$requete="select categorie from Employe where login='$id' and mdp='$mdp'" ;
	$resultat=$connexion->query($requete) ;
	$resultat -> setFetchMode(PDO::FETCH_OBJ) ;
	$perso=$resultat->fetchall() ;
	$resultat->closeCursor() ;
	return $perso ;
}

function UniciteLogin($login) {
	$connexion=getConnect() ;
	$requete="select * from Employe where login='$login'" ;
	$resultat=$connexion->query($requete) ;
	$resultat -> setFetchMode(PDO::FETCH_OBJ) ;
	$perso=$resultat->fetchall() ;
	$resultat->closeCursor() ;
	return $perso ;
}

function AjouterEmploye($nom, $login, $mdp, $categorie) {
	$connexion=getConnect() ;
	$requete="insert into Employe values (0, '$nom', '$login', '$mdp', '$categorie')" ;
	$resultat=$connexion->query($requete) ;
}

function RechercherEmploye($numEmploye) {
	$connexion=getConnect() ;
	$requete="select numEmploye, nom, login, mdp, categorie from Employe where numEmploye=$numEmploye" ;
	$resultat=$connexion->query($requete) ;
	$resultat -> setFetchMode(PDO::FETCH_OBJ) ;
	$perso=$resultat->fetchall() ;
	$resultat->closeCursor() ;
	return $perso ;
}

function ModifLoginMdp($numEmploye, $objetamodifier, $nvvaleur) {
	$connexion=getConnect() ;
	$requete="update Employe set $objetamodifier='$nvvaleur' where numEmploye=$numEmploye" ;
	$resultat = $connexion->query($requete) ;
}

function TypesComptes() {
	$connexion=getConnect() ;
	$requete="select nomTypeCompte from TypeCompte" ;
	$resultat=$connexion->query($requete) ;
	$resultat -> setFetchMode(PDO::FETCH_OBJ) ;
	$comptes=$resultat->fetchall() ;
	$resultat->closeCursor() ;
	return $comptes ;
}

function SuppTypeCompte($typeasupp) {
	$connexion=getConnect() ;
	$requete="delete from TypeCompte where nomTypeCompte='$typeasupp'" ;
	$resultat=$connexion->query($requete) ;
}

function AjTypeCompte($nom) {
	$connexion=getConnect() ;
	$requete="insert into TypeCompte values (0, '$nom')" ;
	$resultat=$connexion->query($requete) ;
}

function UniciteTypeCompte($nom) {
	$connexion=getConnect() ;
	$requete="select * from TypeCompte where nomTypeCompte='$nom'" ;
	$resultat=$connexion->query($requete) ;
	$resultat -> setFetchMode(PDO::FETCH_OBJ) ;
	$compte=$resultat->fetchall() ;
	$resultat->closeCursor() ;
	return $compte ;
}
