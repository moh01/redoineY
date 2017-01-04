<?php

if(isset($_GET['charger']) || isset($_GET['marque'])|| isset($_GET['model'])){
 try {
        if($_SERVER['SERVER_NAME']=="test"){
            $bdd = new PDO('mysql:host=localhost;dbname=lvpi_fr', 'root', 'tizurin');
        }
        elseif ($_SERVER['SERVER_NAME']=="127.0.0.1"){
            $bdd = new PDO('mysql:host=localhost;dbname=lvpi_fr', 'root', '');
        }
        elseif ($_SERVER['SERVER_NAME']=="dev.lampe-videoprojecteur.info"){
            $bdd = new PDO('mysql:host=vmeasyl3priv;dbname=lvpi_fr', 'lmpvideoproj', '5vGiC46G122S');
        }else {
            //$bdd = new PDO('mysql:host=10.0.208.26;dbname=lvpi_fr', 'root', 'abidjan');
            $bdd = new PDO('mysql:host=mysqleasy3;dbname=lvpi_fr_prod', 'lmpvprojprod', 'GGg1QzEARaro');
        }
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }

  if(isset($_GET['charger'])){
	$requete = "SELECT distinct Manufacturer FROM fr_trade ORDER BY Manufacturer";
	$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $json[] = $donnees['Manufacturer'];
    }
	echo json_encode($json);
  } else if( isset($_GET['model']) && isset($_GET['marque']) ){
    $model = $_GET['model'];
    $marque = $_GET['marque'];
    $sql = "    SELECT count(distinct code_type_produit) as nbr_rqdl
                FROM rqdlcomposant where libelle_produit = ? and libelle_constructeur = ?  ";
    $query = $bdd->prepare($sql);
    $query->execute(array($model, $marque));
    $resultat = $query->fetch(PDO::FETCH_OBJ);
    $nbr_rqdl = $resultat->nbr_rqdl;
    $sql = "    SELECT count(distinct code_type_produit) as nbr_lvp
                FROM lvpcomposant where libelle_produit = ? and libelle_constructeur = ?  ";
    $query = $bdd->prepare($sql);
    $query->execute(array($model, $marque));
    $resultat = $query->fetch(PDO::FETCH_OBJ);
    $nbr_lvp = $resultat->nbr_lvp;
    $sql = "    SELECT count(distinct code_type_produit) as nbr_hpl
                FROM hplcomposant where libelle_produit = ? and libelle_constructeur = ?  ";
    $query = $bdd->prepare($sql);
    $query->execute(array($model, $marque));
    $resultat = $query->fetch(PDO::FETCH_OBJ);
    $nbr_hpl = $resultat->nbr_hpl;
    $array['nbr'] = $nbr_rqdl+ $nbr_lvp+ $nbr_hpl;
    //$array['exist'] = "true";

    $marque_upper = ucfirst (strtolower($marque));
    $model_upper = strtoupper($model);
    if ($_SERVER['SERVER_NAME']=="127.0.0.1"){
        $path_3shop = '../manuels/';
        $rep = 'manuels/';
     }else {
        $path_3shop = '../manuels/';
        $rep = 'manuels/';  
    }
    if  ((file_exists($path_3shop.'photos/'.$marque.'-'.$model.'.gif'))|| 
        (file_exists($path_3shop.'presentation/'.$marque.'-'.$model.'.txt'))||
        (file_exists($path_3shop.'manuels/'.$marque.'-'.$model.'.pdf'))||
        (file_exists($path_3shop.'brochures/'.$marque.'-'.$model.'.pdf'))||
        (file_exists($path_3shop.'technique/'.$marque_upper.'-'.$model.'.pdf')))
    {
        $array['exist'] = "true";
     }else{
        $array['exist'] = "false";
     }

    echo json_encode($array);
  }else if((isset($_GET['marque']))&&(!isset($_GET['model']))){
     $marque = $_GET['marque']; 
    $requete = "SELECT distinct ModelNo FROM fr_trade where Manufacturer='$marque' ORDER BY ModelNo";
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $json[] = $donnees['ModelNo'];
    }
    echo json_encode($json);
    }

  

   

	
	
	 
}
 
?>