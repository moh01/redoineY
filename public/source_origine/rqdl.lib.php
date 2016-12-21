<?php

// valeurs constantes - partie du code � �diter

/* JL Partners' db */
define("mysql_host", "jlpartner.justlamps.net");  // nom d'h�te du serveur MySQL
define("mysql_user", "Argence");      // nom d'utilisateur MySQL
define("mysql_db", "jl_partners");    // nom de la base MySQL
define("mysql_pwd", "8g49cfk");       // mot de passe MySQL

/* local backup of JL's db */
define("mysql_backup_host", "localhost");
define("mysql_backup_user", "argence");
define("mysql_backup_db", "jlbackup");
define("mysql_backup_pwd", "jGMKc05");


/* RQDL's db */
define("mysql2_host", "localhost");  // nom d'h�te du serveur MySQL
define("mysql2_user", "argence");      // nom d'utilisateur MySQL
define("mysql2_db", "argence");    // nom de la base MySQL
define("mysql2_pwd", "jGMKc05");       // mot de passe MySQL

define("marge_benef", "38");          // pourcentage de marge b�n�ficiaire
                                      // exprim� en pourcents

define("marge_speciale", "22");          // pourcentage de marge b�n�ficiaire
                                      // exprim� en pourcents

// Fonction connectDB()

function connectDB() {
  $server = mysql_host;
	$login = mysql_user;
	$db = mysql_db;
	$passwd = mysql_pwd;	

	$con = @mysql_connect($server, $login, $passwd);	// connection to the MySQL server

	if (!$con)
	     {
		$server = mysql_backup_host;
		$login = mysql_backup_user;
		$db = mysql_backup_db;
		$passwd = mysql_backup_pwd;

		$con = @mysql_connect($server, $login, $passwd);

		if (!$con) {
			echo "Le catalogue est momentan&eacute;ment indisponible : <a href=\"delai.php\"><font color=\"#BD085A\" size=\"+1\">merci de nous contacter</a></font> pour toute demande de prix ou d&eacute;lai"; exit;
		}
	     } 

	$db_sel = mysql_select_db($db, $con);
	if (!$db_sel) return 0;
	else return $con;
}


// Fonction connectDB2()

function connectDB2() {
  $server = mysql2_host;
	$login = mysql2_user;
	$db = mysql2_db;
	$passwd = mysql2_pwd;	

	$con = @mysql_connect($server, $login, $passwd);	// connection to the MySQL server

	if (!$con)     {       echo "erreur";     } 

	$db_sel = mysql_select_db($db, $con);
	if (!$db_sel) return 0;
	else return $con;
}


// Fonction modelsByManufacturer()
// �tablit la liste des mod�les de lampes par nom de fabricant
// les montants transmis sont les tarifs revendeurs - une marge est � pr�voir !

function modelsByManufacturer($manufacturer) {
  if (!$con = connectDB()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req = "SELECT ID, Suffix, Manufacturer, ModelNo, ManuPartCode, LampHours, Trade_Price, Available_Stock FROM fr_trade WHERE manufacturer='$manufacturer' AND (ID < 6000000 or ID >= 7000000) ORDER BY ModelNo ASC";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = $rst;
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit la valeur r�sultat MySQL
}


// Fonction getManufacturers()
// r�cup�re la liste des fabricants de lampes par ordre alphab�tique
// retourne un identifiant de r�sultat MySQL

function getManufacturers() {
  if (!$con = connectDB()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req = "SELECT Manufacturer AS marque FROM fr_trade GROUP BY Manufacturer ORDER BY Manufacturer ASC";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = $rst;
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit la valeur r�sultat MySQL
}


// Fonction getListByManufacturer()
// r�cup�re la liste des produits par fabricant
// retourne un identifiant de r�sultat MySQL

function getListByManufacturer($marque) {
  if (!$con = connectDB()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req  = "SELECT ID, Manufacturer AS marque, ModelNo AS modele, Manupartcode AS ref, Trade_Price AS prix, Available_Stock AS stock, QTY_ON_ORDER AS commande, ";
    $req .= "Typical_Leadtime AS delais FROM fr_trade WHERE Manufacturer='$marque' ORDER BY ModelNo ASC";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = $rst;
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit la valeur r�sultat MySQL
}


// Fonction getModelForLamp()
// r�cup�re la liste des mod�les supportant cette lampe
// retourne un identifiant de r�sultat MySQL

function getModelForLamp($marque, $lamp) {
  if (!$con = connectDB()) $res = "ERR";   // si �chec de connexion
  else {                                   // sinon
    $req = "SELECT ModelNo AS modele FROM fr_trade WHERE Manupartcode='$lamp' AND Manufacturer='$marque'";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = $rst;
    mysql_close($con);                     // fermeture de connexion
  }
  return $res;    // on retourne soit "ERR", soit la valeur r�sultat MySQL
}


// Fonction getDetailsForModel()
// retourne l'ensemble des donnees disponibles pour le modele
// pass� en argument.

function getDetailsForModel($marque, $modele) {
  if (!$con = connectDB()) $res = "ERR";  // si �chec de connexion
  else {                                  // sinon
    $req = "SELECT * FROM fr_trade WHERE Manufacturer='$marque' AND ModelNo='$modele' LIMIT 1";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = mysql_fetch_object($rst);
    mysql_close($con);                    // fermeture de connexion
  }
  return $res;
}

// Fonction getDetailsForID()
// retourne l'ensemble des donnees disponibles pour le modele ayant cet ID
// pass� en argument.

function getDetailsForID($ID) {
  if (!$con = connectDB()) $res = "ERR";  // si �chec de connexion
  else {                                  // sinon
    $req = "SELECT * FROM fr_trade WHERE ID='$ID' LIMIT 1";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = mysql_fetch_object($rst);
    mysql_close($con);                    // fermeture de connexion
  }
  return $res;
}

// Fonction prixRevendeur()
// retourne le tarif transmis sous forme affichable

function prixRevendeur($montant) {
  $montant = number_format($montant, 2, ',', ' ');    // on formate et on arrondissait � l'entier
  return $montant;
}



// Fonction margeBenef()
// on ajoute un pourcentage (valeur d�finie en en-t�te de ce fichier, dans
// la constante "benef_benef") au tarif revendeur.
// pr�sentation du montant avec pr�cision au dizi�me mais 2 chiffres apr�s la
// virgule.

function margeBenef($montant) {
  $valeur = $montant * ( 1 + (marge_benef / 100) );   // on applique la marge
                                                      // b�n�ficiaire au prix
                                                      // d'achat du produit

  $valeur += 6;  // on ajoute 5 euros

  $valeur = round($valeur);
                                                  // puis on arrondit � l'entier

  return $valeur;
}


// Fonction margeBenefSpeciale()
// on ajoute un pourcentage (valeur d�finie en argument) au tarif revendeur.
// pr�sentation du montant avec pr�cision au dizi�me mais 2 chiffres apr�s la virgule.

function margeBenefSpeciale($montant) {
  $valeur = $montant * ( 1 + (marge_speciale / 100) );  // on applique la marge b�n�f au prix d'achat
  $valeur = round($valeur);  // puis on arrondit � l'entier
  return $valeur;
}


// Fonction isBasket()
// contr�le l'existence du panier dont la r�f�rence est transmise
// s'il existe, retourne OK ; sinon, retourne KO

function isBasket($num) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req  = "SELECT num FROM rqdl_baskets WHERE num='$num'";
    if (!$rst = mysql_query($req,$con)) $res = "KO";
    else $res = "OK";
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit "OK", soit "KO"
}


// Fonction basketChange()
// met � jour la valeur de derni�re modification du panier

function basketChange($num) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req  = "UPDATE rqdl_baskets SET lastchange=NOW() WHERE num='$num'";
    if (!$rst = mysql_query($req,$con)) $res = "ERR";
    else $res = "OK";
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit "OK"
}


// Fonction basketCreate()
// cr�e le nouveau panier et retourne son num�ro

function basketCreate() {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $tem = mt_rand(0,65535);
    $req  = "INSERT INTO rqdl_baskets (lastchange, temoin) VALUES (NOW(), $tem)";
    if (!$rst = mysql_query($req,$con)) $res = "KO";
    else {
      $req = "SELECT num FROM rqdl_baskets WHERE temoin=$tem";
      if (!$row = mysql_fetch_object(mysql_query($req,$con))) $res = "ERR";
      else {
        if (!setcookie("num", $row->num, time()+60*60*24)) $res = "ERR";
        else $res = $row->num;
      }
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit "KO", soit le num�ro du panier
}


// Fonction basketsPurge()
// supprime tous les paniers et leur contenu si lastchange < il y a 24h

function basketsPurge() {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $ilya24h = time() - 60*60*24;
    $req  = "DELETE FROM rqdl_baskcontent ";
    $req .= "WHERE num IN (SELECT num FROM rqdl_baskets WHERE UNIX_TIMESTAMP(lastchange) < $ilya24h)";
    if (!mysql_query($req,$con)) $res = "KO";
    else {
      $req = "DELETE FROM rqdl_baskets WHERE UNIX_TIMESTAMP(lastchange) < $ilya24h";
      if (!mysql_query($req,$con)) $res = "KO";
      else $res = "OK";
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "KO", soit "OK", soit "ERR"
}


// Fonction basketAdd()
// ajoute la r�f�rence en argument dans le panier �galement en argument

function basketAdd($num, $id) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    if (isBasket($num) != "OK") $res = "KO";
    else {
      if (basketChange($num) != "OK") $res = "KO";
      else {
        $req = "INSERT INTO rqdl_baskcontent (num, id, qty) VALUES ('$num', '$id', 1)";
        if (!mysql_query($req,$con)) $res = "KO";
        else $res = "OK";
      }
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "KO", soit "OK", soit "ERR"
}


// Fonction basketDel()
// supprime la r�f�rence en argument du panier �galement en argument

function basketDel($num, $id) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    if (isBasket($num) != "OK") $res = "KO";
    else {
      if (basketChange($num) != "OK") $res = "KO";
      else {
        $req = "DELETE FROM rqdl_baskcontent WHERE num='$num' AND id='$id'";
        if (!mysql_query($req,$con)) $res = "KO";
        else $res = "OK";
      }
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "KO", soit "OK", soit "ERR"
}


// Fonction basketQty()
// modifie la quantit� d'une r�f�rence du panier

function basketQty($num, $id, $qty) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    if (isBasket($num) != "OK") $res = "KO";
    else {
      if (basketChange($num) != "OK") $res = "KO";
      else {
        $req = "UPDATE rqdl_backcontent SET qty='$qty' WHERE num='$num' AND id='$id'";
        if (!mysql_query($req,$con)) $res = "KO";
        else $res = "OK";
      }
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "KO", soit "OK", soit "ERR"
}


// Fonction getBasket()
// retourne un identifiant de r�sultats MySQL contenant le d�tail d'un panier 

function getBasket($num) {
  if (!$con = connectDB2()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    if (basketChange($num) != "OK") $res = "KO";
    else {
      $req = "SELECT id, qty FROM rqdl_baskcontent WHERE num='$num'";
      if (!$rst = mysql_query($req,$con)) $res = "KO";
      else $res = $rst;
    }
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "KO", soit "ERR", soit l'identifiant MySQL
}


// Fonction getDescBasket()
// retourne le descriptif d'une lampe � partir de son id

function getDescBasket($id) {
  if (!$con = connectDB()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req  = "SELECT Suffix, Manufacturer, ModelNo ";
    $req .= "FROM fr_trade WHERE id='$id'";
    if (!$row = mysql_fetch_object(mysql_query($req,$con))) $res = "ERR";
    else $res = $row->Suffix." pour ".$row->Manufacturer." ".$row->ModelNo;
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit la cha�ne de r�ponse
}


// Fonction getPriceBasket()
// retourne le descriptif d'une lampe � partir de son id

function getPriceBasket($id) {
  if (!$con = connectDB()) $res = "ERR";    // si �chec de connexion
  else {                                    // sinon
    $req  = "SELECT Trade_Price FROM fr_trade WHERE id='$id'";
    if (!$row = mysql_fetch_object(mysql_query($req,$con))) $res = "ERR";
    else $res = $row->Trade_Price;
    mysql_close($con);                      // fermeture de la connexion
  }
  return $res;    // on retourne soit "ERR", soit la valeur obtenue
}

?>
