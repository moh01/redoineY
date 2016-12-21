<?php
/*****************************************************************************************
Installation du script : Informations detaill�es dans le fichier lisezmoi.html
Script d'�change de liens automatiques, bas� sur un script en distribution libre am�lior�
par Webosdiscount et par Yvan Heilig.
Cette version est �dit�e par la soci�t� ADIFCO sarl, B451292544, RCS Dijon.
Copyright (c) 2008, ADIFCO sarl. Reproduction et distribution interdite sans autorisation.
Ce script a fait l'objet d'une d�claration de propri�t� et d'un d�pot � l'INPI.
Pour tout renseignement : http://www.adifco.fr/societe-adifco/contact.html
*****************************************************************************************/

// NE PAS MODIFIER CI-DESSOUS

require_once("settings.php");
$ficliens = "dataliens".nfic().".txt";
$nvpage = nfic()+1;
$dom = ereg_replace("/addlink.php","","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if (empty($_REQUEST['email'])) {$myerror = "Vous devez entrer votre e-mail !";} else {$email = htmlspecialchars("$_REQUEST[email]");}
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {$myerror = "Vous devez entrer une e-mail valide !";}
if (empty($_REQUEST['title'])) {$myerror = "Vous devez entrer le titre de votre site !";} else {$title = htmlspecialchars("$_REQUEST[title]");}
if (empty($_REQUEST['url'])) {$myerror = "Vous devez entrer L\'URL de votre site !";} else {$url = rtrim(htmlspecialchars("$_REQUEST[url]"));}
if ($settings['dom_acc'] == 1) {
	if (!preg_match("/\bindex\b/i",$url) and !preg_match("/\bdefault\b/i",$url) and !preg_match("/\baccueil\b/i",$url)) {
		if (preg_match("/\b.html\b/i",$url) or preg_match("/\b.htm\b/i",$url) or preg_match("/\b.php\b/i",$url) or preg_match("/\b.asp\b/i",$url) or preg_match("/\b.cfm\b/i",$url)) {
		   $myerror = "L\'�change de lien ne peut se faire qu\'avec la page d\'accueil par d�faut de votre domaine ou sous-domaine !";
		}
	}
}
if ($settings['dom_param'] == 0) {
	if (preg_match("/=/",$url)) {
		  $myerror = "L\'�change de lien ne peut pas se faire avec une URL dynamique (avec param�tre) !";
	}
}
if (!(preg_match("/(http:\/\/+[\w\-]+\.[\w\-]+)/i",$url))) {$myerror = "Votre site n\'est pas valide ou n\'exite plus !";}
if (empty($_REQUEST['description'])) {$myerror = "Vous devez entrer la description de votre site !";} else {$description = htmlspecialchars("$_REQUEST[description]");}
if(strlen($description) > 80) {$myerror = "La description est trop longue ! La description de votre site Web est limit�e � 80 caract�res !";}
preg_match('@^(?:http://)?([^/]+)@i',$url, $matches);
$host = $matches[1];
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
if ($settings['multi'] == 0) {
	$doublon = "non";
	$doublon = deja_inscrit($matches[0]);
	if ($doublon == "oui") {$myerror = "Vous avez d�j� fait un �change de liens valide avec nous ! L\'�change de liens multiple pour un m�me domaine n\'est pas autoris� !";}
}
if ($settings['listenoire'] == 1) {
	$refu = "non";
	$refu = refuse($matches[0]);
	if ($refu == "oui") {$myerror = "Ce site n\'est pas autoris� pour faire un �change de liens !";}
}
if (empty($_REQUEST['recurl']) || $_REQUEST['recurl'] == "http://") {$myerror = "Vous devez entrer le lien de r�ciproque !";} else {$recurl = rtrim(htmlspecialchars("$_REQUEST[recurl]"));}
if (!(preg_match("/(http:\/\/+[\w\-]+\.[\w\-]+)/i",$recurl))) {$myerror = "Vous n\'avez pas entr� le lien r�ciproque sur votre site !";}
preg_match('@^(?:http://)?([^/]+)@i',$recurl, $recmatches);
$rechost = $recmatches[1];
preg_match('/[^.]+\.[^.]+$/', $rechost, $recmatches);
if ($matches[0] != $recmatches[0]) {$myerror = "Le lien de r�ciproque doit �tre plac� sous le m�me nom de domaine que le site � ajouter !";}
if (strlen($myerror) > 5) {
	require_once("header.php");
	require_once("footer.php");
	echo "<script>alert('$myerror');</script>";
	unset($myerror);
	echo "<script language=\"JavaScript\">history.go(-1);</script>";
	die;
}
$site_url2 = str_replace("?","\?",$settings['site_url']);
$found=0;
$remote = @fopen($recurl, "r") or myerror("Ne peut pas ouvrir l\'URL � distance !");
$html = file_get_contents($recurl);
if (preg_match("#$site_url2#i",$html)) {$found =  1;}
if ($found != 1) {myerror("Notre liens na pas �t� trouv� ! assurez vous d\'avoir placer notre liens sur votre page !");}
if($settings['system'] == 2) {$newline = "\r\n";}
elseif($settings['system'] == 3) {$newline = "\r";}
else {$newline="\n";}
$fp = fopen($ficliens,"rb") or die("Ne peut pas ouvrir le fichier de donn�es pour la lecture !");
$content = @fread($fp,filesize($ficliens));
fclose($fp);
$content = trim(chop($content));
$lines = explode($newline,$content);
if (count($lines) >= $settings['max_links']) {
	$ficliens="dataliens".$nvpage.".txt";
	$message="Bonjour,

Message � caract�re informatif.

Site : $setting[script_url]
Cr�ation d'un nouveau fichier de liens : $ficliens
Par le syst�me d'�change de liens automatique pr�sent sur votre site.

Ceci est un mail automatique, ne pas y r�pondre Merci.

R�f�rencement : http://www.adifco.fr
Devis r�f�rencement : http://www.adifco.fr/referencement-sur-mesure/devis-gratuit-referencement.html
Outils gratuits : http://www.adifco.fr/outils-gratuits/outils-gratuits.html
Analyse de trafic : http://www.analyse-trafic.fr

Fin du message
";
	$headers = "From: $settings[admin_email]"."\n";
	$headers .= "Reply-To: $settings[admin_email]"."\n";
	$headers .= "Return-Path: $settings[admin_email]"."\n";
	@mail("$settings[admin_email]","Cr�ation d'un nouveau fichier d'�change de lien",$message,$headers);
}
$replacement = "$email$settings[delimiter]$title$settings[delimiter]$url$settings[delimiter]$recurl$settings[delimiter]$description$newline";
if ($settings['add_to'] == 0) {
    $fp = fopen($ficliens,"rb");
	$links = @fread($fp,filesize($ficliens));
	fclose($fp);
	$replacement .= $links;
    $fp = fopen($ficliens,"wb") or myerror("N\'a pas pu ouvrir le fichier de liens pour l\'�criture ! Svp faite un CHMOD 666 (rw-rw-rw) sur le fichier txt !");
	fputs($fp,$replacement);
	fclose($fp);
	} else {
    $fp = fopen($ficliens,"ab") or myerror("N\'a pas pu ouvrir le fichier de liens pour la suppression ! Svp faite un CHMOD 666 (rw-rw-rw) sur le fichier txt");
	fputs($fp,$replacement);
	fclose($fp);
    }
if($settings['notify'] == 1) {
$pag=nfic();
$message="Bonjour,

Votre lien a �t� ajout� dans notre annuaire audiovisuel sur la page : 
".$settings['script_url']."index.php?page=$pag

D�tails:

Votre E-mail: $email
URL: $url
Url de R�ciproque : $recurl
Titre: $title
Description:
$description

Merci de cet �change de liens.
$settings[nom_site]

Ceci est un mail automatique, ne pas y r�pondre Merci.
Fin du message
";
$headers = "From: $settings[admin_email]"."\n";
$headers .= "Cc: $settings[admin_email]"."\n";
$headers .= "Reply-To: $settings[admin_email]"."\n";
$headers .= "Return-Path: $settings[admin_email]"."\n";
@mail("$email","Votre site est accept� dans l'annuaire audiovisuel",$message,$headers);
}
header ("Location: $settings[script_url]index.php?page=$pag&mes=Votre lien a �t� rajout� avec succ�s !")
?>
