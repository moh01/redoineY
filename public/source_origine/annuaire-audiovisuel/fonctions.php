<?php 
/*****************************************************************************************
Installation du script : Informations detaillées dans le fichier lisezmoi.html
Script d'échange de liens automatiques, basé sur un script en distribution libre amélioré
par Webosdiscount et par Yvan Heilig.
Cette version est éditée par la société ADIFCO sarl, B451292544, RCS Dijon.
Copyright (c) 2008, ADIFCO sarl. Reproduction et distribution interdite sans autorisation.
Ce script a fait l'objet d'une déclaration de propriété et d'un dépot à l'INPI.
Pour tout renseignement : http://www.adifco.fr/societe-adifco/contact.html
*****************************************************************************************/

// NE PAS MODIFIER CI-DESSOUS

function myerror($problem) {
	require_once("header.php");
	echo "<script>alert('$problem');history.go(-1);</script>";
	require_once("footer.php");
	exit();
}
function nfic() {
	$handle = opendir(".");
	$npages = 0;
	while ($file = readdir($handle)) {
		if (ereg("dataliens",$file)) { $npages++; }
	}
	return $npages;
}
function derniers_sites($n) {
	global $settings;
	$lines = file("dataliens".nfic().".txt");
	$line = end($lines);
	while ($n--) {
		chop($line);
		if (strlen($line)<10) { $line = prev($lines); continue; }
		list($email,$title,$url,$recurl,$description) = explode($settings['delimiter'],$line);
		if ($settings['clean'] != 1) { $url="go.php?url=".$url; }
		if ($jj++) $lnv .= " | ";
		$lnv .= "<a href=\"$url\">$title</a>";
		$line = prev($lines);
		if ($jj>=count($lines)) { break; }
	}
	return $lnv;
}
function deja_inscrit($site) {
	$i = nfic();
	$present = "non";
	for ($j=1; $j<=$i; $j++) {
	    $fic = "dataliens".$j.".txt";
		if (!$fp = fopen($fic,"r")) {
			echo "Echec de l'ouverture du fichier $fic";
			exit;
			} else {
			while(!feof($fp)) {
				$ligne = fgets($fp,255);
				if (substr_count($ligne,$site) > 0) { $present = "oui"; break; }
				}
			}
		fclose($fp);
		}
	return $present;
}
function refuse($site) {
	$interdit = "non";
	$fic = "siterefuse.txt";
	if (!$fp = fopen($fic,"r")) {
		echo "Echec de l'ouverture du fichier $fic";
		exit;
		} else {
		while(!feof($fp)) {
			$ligne = fgets($fp,255);
			if (substr_count($ligne,$site) > 0) { $interdit = "oui"; break; }
			}
		}
	fclose($fp);
	return $interdit;
}
?>