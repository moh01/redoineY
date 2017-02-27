<?php
namespace Album\View\Helper;
use Zend\View\Helper\AbstractHelper;

class HelpMe extends AbstractHelper
{
	public $marge_benef = 38; 
	public $title = "Lampe videoprojecteur : Toutes les infos utiles";
	public $name = "red";
	public $value = "";

    public function margeBenef($montant) {
	  $valeur = $montant * ( 1 + ($this->marge_benef / 100)) ;   // on applique la marge
	                                                      // bénéficiaire au prix
	                                                      // d'achat du produit
	  $valeur += 6;  // on ajoute 5 euros
	  $valeur = round($valeur);
	                                                  // puis on arrondit à l'entier
	  return $valeur;
	}

	public function img_exist($marque, $ref) {
	  	if(file_exists("img/ampoules-videoprojecteur/".$marque."_".$ref."_B.jpg")){
       		$img = "img/ampoules-videoprojecteur/".$marque."_".$ref."_B.jpg";
    	}else{
      		$img = "img/ampoules-videoprojecteur/".$marque."_B.jpg";
    	}
    	//return '<img src='.$img.' width="160px" height="160px">';
return $img;
	}

 	public function typeProduit($typeProduit) {
	  	if($typeProduit == "LO"){
		    return "LAMPE ORIGINALE";
		}elseif($typeProduit == "OI"){
		    return "LAMPE ORIGINAL INSIDE";
		}elseif($typeProduit == "LC"){
		    return "LAMPE GENIUS";
		}elseif($typeProduit == "BC"){
		    return "AMPOULE GENIUS";
		}elseif($typeProduit == "BO"){
		    return "AMPOULE ORIGINALE ";
		}
	}
	public function typeProduit2($typeProduit) {
	  	if(($typeProduit == "LO") || ($typeProduit == "OI") || ($typeProduit == "LC")){
		    return "lampe";
		}elseif(($typeProduit == "BO")|| ($typeProduit == "BC")){
		    return "ampoule";
		}
	}
	public function muliplication($a, $b, $c){
		return ($a*$b)+$c;
	}

	public function stock($var){
		$existe[1] = '-422px';
		$existe[0] = 'en cours d’approvisionnement';
	    if($var>0){
	        $existe[0] = 'En stock';
	        $existe[1] = '-480px';
	      
	    }else{
	        $existe[0] = 'en cours d’approvisionnement';
	        $existe[1] = '-422px';
	    }
    	
    	return $existe;
	}

public function le_stock($var){
    if ($var > 0) {
        $le_stock = 'En stock';
    }else $le_stock = 'En cours d’approvisionnement';
    return $le_stock;
}

	public function title($title){
		$this->title = $title;
	}

	public function metaname($name){
		$this->name = $name;
		
	}

	public function metahttp($name, $value){
		$this->name = $name;
		$this->value = $value;
	}
/*
	public function getRqdl($video, $marque) {
		try {
        $bdd = new PDO('mysql:host=localhost;dbname=rqdl_fr', 'root', '');
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }

        $sql = 'SELECT distinct code_type_produit,libelle_produit,ref_constructeur_composant,
                libelle_constructeur,le_prix,description_composant
                FROM rqdlcomposant where libelle_produit = ? and libelle_constructeur=? group by code_type_produit';

    $query = $bdd->prepare($sql);
    $query->execute(array($video, $marque));
    $resultat = $query->fetch(PDO::FETCH_OBJ);
    return $nbr_rqdl = $resultat->nbr_rqdl;

    }
*/
}