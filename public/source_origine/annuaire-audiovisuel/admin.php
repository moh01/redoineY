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

error_reporting(E_ALL ^ E_NOTICE);
require_once "settings.php";
$npages = nfic();
header("Expires: Mon, 26 Jul 2000 05:00:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (!$page) { $page = 1; }
$ficlien = "dataliens".$page.".txt";
if (empty($_GET['action']) && empty($_POST['action'])) { login(); }
$action = $_POST['action'];
if (!empty($_GET['action'])) { $action = $_GET['action']; }
if ($settings['system'] == 2) { $settings['newline']="\r\n"; }
elseif ($settings['system'] == 3) { $settings['newline']="\r"; }
else { $settings['newline']="\n"; }
if ($action == "login")
	{
    $pass=$_REQUEST['pass'];
if(empty($pass)) {error("Veuillez entrer votre mot de passe d'administrateur ! ");}
	checkpassword($pass);
	
	setcookie ("pass",$pass,time()+3600); // expire dans 1h
	
    mainpage("welcome");
	}
elseif ($action == "remove")
	{
    $pass=$_REQUEST['pass'];
	if(empty($pass)) {error("Vous n'êtes pas autorisé à entrer sur cette page ! ");}
    checkpassword($pass);
    $id=$_REQUEST['id'];
    if(empty($id) && $id != "0") {error("Veuillez écrire un nombre d'identification de lien ! ");}
    if (preg_match("/\D/",$id)) {error("Ce n'est pas une identification valide de lien, les nombres d'utilisation (0-9) seulement !  
");}
    removelink($id);
	}
elseif ($action == "check")
	{
    $pass=$_REQUEST['pass'];
	if(empty($pass)) {error("Veuillez entrer votre mot de passe ! ");}
    checkpassword($pass);
    check();
	}
elseif ($action == "refu")
	{
    $pass=$_REQUEST['pass'];
	if(empty($pass)) {error("Veuillez entrer votre mot de passe ! ");}
    checkpassword($pass);
    refu();
	}
elseif ($action == "add")
	{
    $pass=$_REQUEST['pass'];
	if(empty($pass)) {error("Vous n'êtes pas autorisé à entrer sur cette page !");}
    checkpassword($pass);
    addlink();
	}
else {login();}
exit();

// START refu()
function refu() {
global $settings;
$ficrefu = "siterefuse.txt";
if (empty($_REQUEST['url'])) { error("Veuillez écrire le URL du site Web à interdire ! "); } else { $url = rtrim(htmlspecialchars("$_REQUEST[url]")); }
if (!(preg_match("/(http:\/\/+[\w\-]+\.[\w\-]+)/i",$url))) { error("URL ou site web non valide"); }
$replacement = "$url$settings[newline]";
$fp = fopen($ficrefu,"rb") or die("Ne peut pas ouvrir le fichier siterefuse.txt pour la lecture");
$sitesrefu = @fread($fp,filesize($ficrefu));
fclose($fp);
$replacement .= $sitesrefu;
$fp = fopen($ficrefu,"wb") or error("N\'a pas pu ouvrir le fichier siterefuse.txt pour l'écriture ! Svp faite un CHMOD 666 (rw-rw-rw) sur le fichier siterefuse.txt !");
fputs($fp,$replacement);
fclose($fp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Partenaires, échange de liens automatique - Administration</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#ffffff">
<table width="300" border="0" cellpadding="0" cellspacing="7" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td><fieldset style="width:300;text-align:center">
        <legend style="color:000099"><font face="verdana" size="1" color="#447DB7"></font></legend>
        <div align="center">
          <center>
          <table border="0" width="300">
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echange de liens automatiques <?php echo($settings['version']); ?><br />
                -- Administration --</font></td>
            </tr>
            <tr>
              <td><div align="center">
                  <center>
                  <table width="300" border="0">
                    <tr>
                      <td align="center"></td>
                    </tr>
                    <tr>
                      <td align="center"><form>
                          <p><b>Site interdit:</b></p>
                          <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">L'URL <?php echo($url); ?> a été ajouté avec succès à la liste des sites interdits. </font></p>
                          <p>&nbsp;</p>
                          <p> <a href="admin.php?action=login">Cliquez pour continuer</a> </p>
                          <p>&nbsp;</p>
                        </form></td>
                    </tr>
                  </table>
                </center>
                </div>
              </td>
            </tr>
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
                © Copyright 2008 <a href="http://www.adifco.fr" target="_new">Référencement ADIFCO</a></font></td>
            </tr>
          </table>
          </center>
        </div>
        </fieldset></td>
    </tr>
</tbody>
</table>
</body>
</html>
<?
exit();
} // END refu()

// START addlink()
function addlink() {
global $settings;
global $ficlien, $page;

if (empty($_REQUEST['email'])) { error("Veuillez écrire l\'adresse E-mail du propriétaire !"); } else { $email = htmlspecialchars("$_REQUEST[email]"); }
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) { error("Veuillez écrire une adresse E-mail valide! "); }
if (empty($_REQUEST['title'])) { error("Veuillez écrire le titre du site Web ! "); } else { $title = htmlspecialchars("$_REQUEST[title]"); }
if (empty($_REQUEST['url'])) { error("Veuillez écrire le URL du site Web ! "); } else { $url = rtrim(htmlspecialchars("$_REQUEST[url]")); }
if (!(preg_match("/(http:\/\/+[\w\-]+\.[\w\-]+)/i",$url))) { error("URL ou site web non valide"); }
if (empty($_REQUEST['recurl']) || $_REQUEST['recurl']=="http://") { error("Veuillez écrire URL pour le lien de réciproque"); } else { $recurl = strtolower(rtrim(htmlspecialchars("$_REQUEST[recurl]"))); }
if ($recurl != "http://non-obligatoire" && !(preg_match("/(http:\/\/+[\w\-]+\.[\w\-]+)/i",$recurl))) { error("URL réciproque de page non valide ! "); }
if (empty($_REQUEST['description'])) { error("Veuillez écrire la description du site web ! "); } else { $description = htmlspecialchars("$_REQUEST[description]"); }
if (strlen($description) > 80) { error("Description trop longue ! La description de votre site Web est limitée à 80 caractères. "); }
$fp = fopen($ficlien,"rb") or die("Ne peut pas ouvrir le fichier dataliens pour la lecture");
$content=@fread($fp,filesize($ficlien));
fclose($fp);
$content = trim(chop($content));
$lines = @explode($newline,$content);
if (count($lines) > $settings['max_links']) { error("Nous ne pouvons pas ajouter de nouveaux liens à l'heure actuelle. Merci de passer par le formulaire public pour ajouter ce lien. Vous ne devirez plus rencontrer ce problème utltérieurement."); }
$replacement = "$email$settings[delimiter]$title$settings[delimiter]$url$settings[delimiter]$recurl$settings[delimiter]$description$settings[newline]";
if ($settings['add_to'] == 0) {
    $fp = fopen($ficlien,"rb");
	$links = @fread($fp,filesize($ficlien));
	fclose($fp);
	$replacement .= $links;
    $fp = fopen($ficlien,"wb") or error("N\'a pas pu ouvrir le fichier de liens pour l\'écriture ! Svp faite un CHMOD 666 (rw-rw-rw) sur le fichier txt !");
	fputs($fp,$replacement);
	fclose($fp);
	} else {
    $fp = fopen($ficlien,"ab") or error("N\'a pas pu ouvrir le fichier de liens pour la suppression ! Svp faite un CHMOD 666 (rw-rw-rw) sur le fichier txt");
	fputs($fp,$replacement);
	fclose($fp);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Partenaires, échange de liens automatique - Administration</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="300" border="0" cellpadding="0" cellspacing="7" align="center">
  <tbody>
    <tr>
      <td><fieldset style="width:300;text-align:center">
        <legend style="color:000099"><font face="verdana" size="1" color="#447DB7"></font></legend>
        <div align="center">
          <center>
          <table border="0" width="300">
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echange de liens automatiques <?php echo($settings['version']); ?><br />
                -- Administration --</font></td>
            </tr>
            <tr>
              <td><div align="center">
                  <center>
                  <table width="300" border="0">
                    <tr>
                      <td align="center"></td>
                    </tr>
                    <tr>
                      <td align="center"><form>
                          <p><b>Lien supplementaire:</b></p>
                          <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">URL <?php echo($url); ?> a été ajouté avec succès à votre page de liens. </font></p>
                          <p>&nbsp;</p>
                          <p> <a href="admin.php?action=login">Cliquez pour continuer</a> </p>
                          <p>&nbsp;</p>
                        </form></td>
                    </tr>
                  </table>
                </center>
                </div>
              </td>
            </tr>
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
                © Copyright 2008 <a href="http://www.adifco.fr" target="_new">Référencement ADIFCO</a></font></td>
            </tr>
          </table>
          </center>
        </div>
        </fieldset></td>
    </tr>
</tbody>
</table>
</body>
</html>
<?
exit();
} // END addlink()

// START check()
function check() {
$lines = array();
global $settings;
global $ficlien, $page;
$fp = fopen($ficlien,"rb") or die("Impossible d'ouvrir le fichier ($ficlien) en lecture!");
$content = fread($fp,filesize($ficlien));
fclose($fp);
$content = trim(chop($content));
$lines = explode($settings['newline'],$content);
$site_url2 = preg_replace("/\//","\\\/",$settings['site_url']);
$i = 1;
$found = 0;
$rewrite = 0;
echo <<<EOC
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Vérification des liens réciproques - Patientez !</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
EOC;

foreach($lines as $thisline) {
    list($email,$title,$url,$recurl,$description) = explode($settings['delimiter'],$thisline);

    echo "<p><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">Vérification du lien N°<b>$i</b></font>...<br>\n";
    echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">URL du site: $url</font><br>\n";
    	if ($recurl == "http://non-obligatoire")
        {
        	echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#3300CC\">Pas de lien réciproque obligatoire !</font><br><br>\n";
            echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>\n";
            $i++;
		    $found=0;
 			flush();
            continue;
        }
        else
        {
        	echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">URL Réciproque: $recurl</font><br>\n";
        }
    echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">Recherche du lien réciproque</font>";

	$remote = @fopen($recurl, "r") or $remote = "NO";
    	if ($remote == "NO") {echo "<br>\n<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FF0000\">ERREUR: NE PEUT PAS OUVRIR L URL , REESSAYE PLUS TARD SVP!</font><br><br>\n\n";}
        else
        {
			while ($html = fread($remote,1024)) {
		        if (preg_match("/$site_url2/i",$html)) { $found=1; break; }
        	echo ".";
	    	}

    		if ($found == 1) {echo "<br>\n<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#339900\">Le lien $settings[site_url] a été trouvé ! <br><br></font>\n\n";}
  			else {
       			echo "<br>\n<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FF0000\">LIEN NON TROUVÉ !</font><br><br>\n\nSuppression du partenaire ...<br>";
                unset($lines[$i-1]);
                $rewrite = 1;
    		}
        }
    $i++;
    echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>\n";
    $found = 0;
    flush();
}
if ($rewrite == 1)
	{
	$lines = array_values($lines);
		$fp = fopen($ficlien,"wb") or die("Ne peut pas écrire dans le dossier de lien ! Changez les permissions de dossier (CHMOD à 666 sur des machines UNIX !) ");
		foreach ($lines as $thisline) {
		    $thisline .= $settings['newline'];
			fputs($fp,$thisline);
		}
		fclose($fp);
	}
echo <<<EOC
<p>&nbsp;</p>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Vérification fini!</b></p>
<p><a href="admin.php?action=login">Retour dans l'admin</a></p>
</body>
</html>
EOC;

exit();
}
// END check()

// START removelink()
function removelink($i) {
$lines = array();
global $settings;
global $ficlien;
$fp = fopen($ficlien,"rb") or die("Impossible d'ouvrir le fichier ($ficlien) en lecture!");
$content = fread($fp,filesize($ficlien));
fclose($fp);
$content = trim(chop($content));
$lines = explode($settings['newline'],$content);
unset($lines[$i]);
$lines = array_values($lines);
$fp = fopen($ficlien,"wb") or die("Ne peut pas écrire dans le dossier de lien ! Changez les permissions de dossier (CHMOD à 666 sur des machines UNIX !) ");
	foreach ($lines as $thisline) {
    $thisline .= $settings['newline'];
	fputs($fp,$thisline);
	}
fclose($fp);
mainpage("Le lien choisi a été supprimé avec succès ! ");
}
// END removelink()

// START mainpage()
function mainpage($notice) {
global $settings, $ficlien, $page, $npages;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Partenaires, échange de liens automatique - Administration</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function doconfirm(message) {
		if (confirm(message)) {return true;}
    	else {return false;}
	}
</script>
</head>
<body>
<div align="center"><center>
<table width="700" border="0" cellpadding="0" cellspacing="7" align="center">
<tbody>
<tr><td>
<fieldset style="width:700;">
<legend style="color:000099"><font face="verdana" size=1 color="#447DB7"></font></legend>
<table border="0" width="700" cellpadding="5">
<tr>
<td>
<?php
if ($notice == "welcome") {
    echo "<p align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\"><b>Bienvenue dans l'administration ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php\">Quitter</a></b></font></p>";
	}
else {
	echo "<p align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\"><b>Administration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php\">Quitter</a></b></p>
    <p align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#ff0000\">$notice</font></p>";
    }
?>
<br />
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Vous pouvez supprimer un liens en cliquant sur le bouton.</font><img src="img/delet1.gif" height="16" width="16" border="0" alt="" /><br />
  <font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Vous pouvez voir la page de liens réciproque en cliquant sur le bouton.</font><img src="img/info.gif" height="16" width="16" border="0" alt="" /></p>
Page:
<?php for ($p=1; $p<=$npages; $p++) { ?>
<a href="admin.php?action=login&amp;page=<?php echo $p; ?>"><?php echo $p; ?></a>&nbsp;
<?php } ?>
<?php
echo "<hr size=\"1\" color=\"black\">\n";
$lines=array();
$fp = fopen($ficlien,"rb") or die("Impossible d'ouvrir le fichier ($ficlien) en lecture!");
$content = @fread($fp,filesize($ficlien));
fclose($fp);
$content = trim(chop($content));
if (strlen($content) == 0) { $noyet=1; }
$lines = @explode($settings['newline'],$content);
if ($noyet == 1)
	{
    ?>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Vous n'avez aucun lien encore.</font></p>
<?php
    }
else {
echo "<table border=\"0\">";
$i = 0;
foreach ($lines as $thisline)
{
	if (strlen($thisline) < 10) { $i++; continue; }
	list($email,$title,$url,$recurl,$description) = explode($settings['delimiter'],$thisline);
    echo "<tr>
    <td valign=\"top\"><a href=\"admin.php?page=$page&action=remove&id=$i\" onclick=\"return doconfirm('Êtes-vous sûr de vouloir supprimer ce lien ?');\"><img src=\"img/delet1.gif\" height=\"16\" width=\"16\" border=\"0\" alt=\"supprimer le lien\"></a></td>
    <td valign=\"top\"> - <a href=\"$recurl\" target=\"_bank\"><img src=\"img/info.gif\" border=\"0\" alt=\"Liens réciproque\" height=\"16\" width=\"16\"></a> - <a href=\"$url\" target=\"_bank\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\"><b>$title</b></font></a> - <font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#666666\">$description</font></td>
    </tr>";
    $i++;
}
?>
</table>
<?php
}
?>
<hr size="1" color="black" />
<form action="admin.php" method="post">
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Vérifiez les liens réciproques :</b></font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">Cliquez sur le bouton &quot;vérifier&quot; et, le script vérifiera tous les liens soumis pour voir si votre lien de réciprocité est toujours là. Si votre lien n'est pas sur leur page, le lien soumis sera enlevé !</font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Ceci peut prendre un moment, soyez patient !</font></b>
    <input type="hidden" name="action" value="check" />
    <input type="hidden" name="page" value="<?php echo $page ?>" />
    <input type="hidden" name="pass" value="<?php echo($settings['apass']); ?>" />
  </p>
  <p>
    <input type="submit" value=" Verifier " />
  </p>
</form>
<hr size="1" color="black" />
<form action="admin.php" method="post">
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Interdire l'échange de lien avec un site :</b></font>&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">1 = utilisé, 0 = non utilisé. Vous pouvez changer ce paramètre dans settings.php. <b>Etat actuel : <?php echo $settings['listenoire']; ?></b>.</font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">Permet d'inscrire en liste noire (blacklister) un site afin que celui-ci ne puisse pas être inscrit dans la liste des sites partenaires. <b>ATTENTION :</b> interdire un site est définitif et ne peut pas être modifié par la suite !*</font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">Vous pouvez également interdire tous les sites d'un hébergeur en sous-domaine afin d'assurer une meilleure qualité à vos échanges de liens. Par exemple, pour interdire tous les sites en sous-domaine de FREE, mettre <b>free.fr</b> dans le formulaire ci-dessous. <b>ATTENTION :</b> interdire les sites d'un hébergeur en sous-domaine est définitif et ne peut pas être modifié par la suite !*</font></p>
    <table border="0">
    	<tr>
      	<td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">URL du site:</font><b></td>
      	<td><input type="text" name="url" maxlength="100" value="http://" size="40" /></td>
    	</tr>
  	</table>
    <input type="hidden" name="action" value="refu" />
    <input type="hidden" name="pass" value="<?php echo($settings['apass']); ?>" />
  </p>
  <p>
    <input type="submit" value=" Interdire le site " />
  </p>
</form>
<hr size="1" color="black" />
<form action="admin.php" method="post">
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Ajoutez un lien :</b></font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">Vous pouvez ajouter manuellement des liens sur votre site. Le script examinera le lien de réciprocité lors de la vérification.</font></p>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">Si vous n'avez pas besoin d'un lien réciproque de ce site ajouter
    &quot;<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>http://non-obligatoire</b></font>&quot; dans le champ &quot;lien réciproque&quot;.</font>
  <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">*Les sites inscrits dans la liste noire (voir ci-dessus) peuvent-être ajoutés par ce formulaire.</font></p>
    <input type="hidden" name="action" value="add" />
    <input type="hidden" name="pass" value="<?php echo($settings['apass']); ?>" />
  </p>
  <table border="0">
    <tr>
      <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">E-mail:</font></b></td>
      <td><input type="text" name="email" size="40" /></td>
    </tr>
    <tr>
      <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Titre du site:</font></b></td>
      <td><input type="text" name="title" maxlength="25" size="40" /></td>
    </tr>
    <tr>
      <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">URL du site:</font><b></td>
      <td><input type="text" name="url" maxlength="100" value="http://" size="40" /></td>
    </tr>
    <tr>
      <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">URL lien réciproque:</font></b></td>
      <td><input type="text" name="recurl" maxlength="100" value="http://" size="40" /></td>
    </tr>
    <tr>
      <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Description du site:</font></b></td>
      <td><input type="text" name="description" size="40" /></td>
    </tr>
  </table>
  <p>
    <input type="submit" value=" Ajouter votre lien " />
  </p>
</form>
</td>
</tr>
<tr>
  <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
    © Copyright 2008 <a href="http://www.adifco.fr" target="_new">Référencement ADIFCO</a></font></td>
</tr>
</table>
</fieldset>
</td>
</tr>
</table>
</div>
</center>
</body>
</html>
<?php
exit();
}
// END mainpage()

// START checkpassword()
function checkpassword($thepass) {
	global $settings;
	if ($thepass != $settings['apass']) { error("Mot de passe incorrect!"); }
}
// END checkpassword()

// START login()
function login() {
global $settings;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Partenaires, échange de liens automatique - Administration</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#FFFFFF">
<table width="400" border="0" cellpadding="0" cellspacing="7" align="center">
  <tbody>
    <tr>
      <td><fieldset style="width:400;text-align:center">
        <legend style="color:000099"><font face="verdana" size="1" color="#447DB7"></font></legend>
        <div align="center">
          <center>
          <table border="0" width="400">
            <tr>
              <td><div align="center">
                  <center>
                  <table width="400">
                    <tr>
                      <td align="center">Accès à l'administration</td>
                    </tr>
                    <tr>
                      <td align="center"><form method="post" action="admin.php">
                          <p>&nbsp;<br />
                            <b>Mot de passe</b><br />
                            <br />
                            <input type="password" name="pass" size="20" />
                            <input type="hidden" name="action" value="login" />
                            <input type="hidden" name="page" value="<?php echo $page ?>" />
                          </p>
                          <input type="hidden" name="npage" value="<?php echo $npage ?>" />
                          </p>
                          <p>
                            <input type="submit" name="enter" value="Entrer" />
                          </p>
                        </form>
                      </td>
                    </tr>
                  </table>
                </div>
                </center>
              </td>
            </tr>
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
                © Copyright 2008 <a href="http://www.adifco.fr" target="_new">Référencement ADIFCO</a></font></td>
            </tr>
          </table>
        </div>
        </center>
        </fieldset>
      </td>
    </tr>
</tbody>
</table>
</body>
</html>
<?php
exit();
}
// END login()

// START error()
function error($myproblem) {
global $settings;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Partenaires, échange de liens automatique - Administration</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="copyright" content="ADIFCO www.adifco.fr" />
<meta http-equiv="content-style-type" content="text/css2" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="300" border="0" cellpadding="0" cellspacing="7" align="center">
  <tbody>
    <tr>
      <td><fieldset style="width:300;text-align:center">
        <legend style="color:000099"><font face="verdana" size="1" color="#447DB7"></font></legend>
        <div align="center">
          <center>
          <table border="0" width="300">
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
                -- Administration --</font></td>
            </tr>
            <tr>
              <td><p>&nbsp;</p>
                <div align="center">
                  <center>
                  <table width="300">
                    <tr>
                      <td align="center"></td>
                    </tr>
                    <tr>
                      <td align="center"><form>
                          <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><b>Une erreur s'est produite :</b></font></p>
                          <p><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FF0000"><?php echo($myproblem); ?></font></p>
                          <p><a href="admin.php"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Retour a la page </a></font></p>
                        </form>
                      </td>
                    </tr>
                  </table>
                </div>
                </center>
              </td>
            </tr>
            <tr>
              <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Echanges de liens automatiques <?php echo($settings['version']); ?><br />
                © Copyright 2008 <a href="http://www.adifco.fr" target="_new">Référencement ADIFCO</a></font></td>
            </tr>
          </table>
        </div>
        </center>
        </fieldset>
      </td>
    </tr>
</tbody>
</table>
</body>
</html>
<?php
exit();
}
// END error()

?>
