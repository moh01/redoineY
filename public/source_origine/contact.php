<?php
include_once("antispam.php");?>
 <?php

$email_webmaster = "contact@lampe-videoprojecteur.info";

$titre_cache = "Depuis le site lampe-videoprojecteur.info: ";
// === traitement des données du formulaire ============================================================
if (isset($_POST["envoyer"])){
// le formulaire a été soumis
$etat = "erreur";
// Valeur par défaut. Prendra la valeur "ok" s'il n'y a pas d'erreur
// --- mise en forme des champs saisis dans le formulaire lors de sa soumission ---
if (isset($_POST["email_expediteur"])) {
$_POST["email_expediteur"]=trim(stripslashes($_POST["email_expediteur"]));
}
if (isset($_POST["titre"])) {
$_POST["titre"]=trim(stripslashes($_POST["titre"]));
}
if (isset($_POST["message"])) {
$_POST["message"]=trim(stripslashes($_POST["message"]));
}
// --- test de la validité des champs saisis ---
if (empty($_POST["email_expediteur"])) {
// il manque l'email de l'expéditeur
$erreur="<b><font color='#FF0000' size='+1'>Erreur :</font><br><br>Saisissez votre adresse email...</b>";
}
elseif (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST["email_expediteur"])){
// l'adresse e-mail n'est pas valide
$erreur="<b><font color='#FF0000' size='+1'>Erreur :</font><br><br>Votre adresse e-mail n'est pas valide...</b>";
}
elseif (empty($_POST["message"])) {
// le message est vide
$erreur="<b><font color='#FF0000' size='+1'>Erreur :</font><br><br>Votre message est vide...</b>";
}
elseif (antispam_check() == false) {
// l'addition est fausse
$erreur="<b><font color='#FF0000' size='+1'>Erreur :</font><br><br>Faites des efforts en calcul...</b>";
}
else {
// --- tous les champs sont correctement remplis: on pourra envoyer le mail ---
$etat="ok";
}
}
else {// --- le formulaire n'a pas été soumis ---
$etat="attente";
}
// === fin de traitement des données du formulaire =======================================================
?>

<html><head>
<title>Lampe videoprojecteur</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
<meta name="robots" content="ALL">
<meta name="rating" content="General">
<meta name="copyright" content="DAVID-ARGENCE S.L.">
<meta name="description" content="Infos lampe videoprojecteur">
<meta name="keywords" content="lampe videoprojecteur>
<meta name="author" content="David Argence">
<meta http-equiv="reply-to" content="contact@lampe-videoprojecteur.info">
<meta name="language" content="Fr">

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script></head>
<BODY bgcolor="#404040">
<font face="verdana,arial" size="-1"><center>

<LINK REL="stylesheet" TYPE="text/css" HREF="style.css">

<!-- TABLEAU 1 HAUT DE PAGE -->

<table border="0" width="900">

<tr><td width="110" valign="bottom"><a href="http://www.lampe-videoprojecteur.info/"><img src="lampe-videoprojecteur.info.gif" border="0" alt="lampe videoprojecteur"></a></td>

<td valign="bottom">

<h1><a href="lampe-videoprojecteur.php" title="Lampe videoprojecteur">lampe-videoprojecteur</a><font color="#FF7F00">.info</font></h1><g:plusone></g:plusone><br/><br/>

<img src="puce-accueil.gif"><a href="http://www.lampe-videoprojecteur.info/">Tout savoir sur la lampe de videoprojecteur</a> (Accueil)

<br><br>

<img src="0.gif"><br>
<img src="0.gif"><br>


<img src="puce-grise.gif"><a href="videoprojecteur.php">Le videoprojecteur expliqu&eacute;</a>

<br>

<img src="puce-grise.gif"><a href="lampe.php">La lampe du videoprojecteur</a>

<br>

<img src="puce-clignotante.gif"><a href="lampe-videoprojecteur.php">Infos sur les lampes de videoprojecteurs par marques</a>

<br>

<img src="puce-grise.gif"><a href="http://www.le-homecinema.com/forum/forum2.html" target="_blank">Forum le-homecinema.com</a>

<br>

<img src="puce-orange.gif">Nous contacter<br>


<style type="text/css">
@import url(http://www.google.fr/cse/api/branding.css);
</style>
<div class="cse-branding-right" style="background-color:#404040;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.lampe-videoprojecteur.info/recherche.php" id="cse-search-box">
      <div>&nbsp;&nbsp;
        <input type="hidden" name="cx" value="partner-pub-9001598868705234:sxvj26o2zru" />
        <input type="hidden" name="cof" value="FORID:10" />
        <input type="hidden" name="ie" value="ISO-8859-1" />
        <input type="text" name="q" size="21" />
        <input type="submit" name="sa" value="Rechercher" />
      </div>
    </form>
  </div>
</div>

</td>

<td align="right"><a href="infos-videoprojecteur.php"><img src="infos-videoprojecteur.gif" border="0" alt="Infos videoprojecteur"></a>
</td>

</tr>

<tr><td colspan="3" bgcolor="#808080"></td></tr>

<tr><td colspan="2">

<font size="-2"><font color="#FF7F00">Partenaires</font>&nbsp;<a href="partenariat.php"><font color="#4ABDD6">Devenir partenaire</a></font><br></font>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
width="728" height="120" id="ad_loader" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="ad_loader.swf?xml_file=ad_loader.xml" />
<param name="quality" value="high" />
<param name="bgcolor" value="#404040" />
<embed src="ad_loader.swf?xml_file=ad_loader.xml" quality="high" bgcolor="#404040" width="728" height="120" name="ad_loader" align="middle" 
allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>

</td><td><? include('menu-projecteurs.php'); ?></td></tr>

</table>



<!-- TABLEAU 2 CONTENU -->

<table width="900" border="0">



<tr><td colspan="2"><h2>Tout savoir sur les lampes de videoprojecteurs</h2></td></tr>

<tr>
<td>Contactez-nous</td></tr>
<tr><td align="center">


<form id="formulaire" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>?<?php echo SID; ?>">

<table border="0" width="100%" bgcolor="#4b4b4b" cellspacing="10" background="projecteur.jpg"><tr><td>

<label for="titre"><b>Titre de message</b> (facultatif):</label><br />
<input type="text" size="45" name="titre" id="titre" value="<?php
if (!empty($_POST["titre"])) {
// le titre du message a été saisi: le réafficher
echo htmlspecialchars($_POST["titre"],ENT_QUOTES);
}
?>" />

<br><br>

<label for="message"><b>Message</b> (obligatoire):</label><br />
<textarea name="message" id="message" cols="40" rows="5"><?php
if (isset($_POST["message"])) {
// le message a été saisi: le réafficher
echo htmlspecialchars($_POST["message"],ENT_QUOTES);
}
?></textarea>

<br>

<label for="email_expediteur"><b>Votre adresse e-mail</b> (obligatoire):</label><br />
<input type="text" size="40" name="email_expediteur" id="email_expediteur" value="<?php
if (!empty($_POST["email_expediteur"])) {
// l'adresse email de l'expéditeur a été saisie: la réafficher
echo htmlspecialchars($_POST["email_expediteur"],ENT_QUOTES);
}
?>" />

<br><br>

<b>Anti Spam</b><br>Indiquez le r&eacute;sultat de 
<?php antispam_ins(); ?>

<br>

<input type="submit" name="envoyer" value="Envoyer votre message" />

</td><td width="300" align="center" valign="top">

<?
if ($etat!="ok"){// le formulaire n'a pas été soumis, ou soumis avec une erreur
if ($etat=="erreur"){
//le formulaire a été soumis avec une erreur
echo "<strong>".$erreur."</strong>\n";
// afficher le message d'erreur
}
?>



</form>

<?
}
else {
// le formulaire a été soumis sans erreur, on envoie le mail
$entete = "From: ".$_POST["email_expediteur"]." <".$_POST["email_expediteur"].">\n";
$entete .= "Return-Path: ". $email_webmaster . "\n";
$entete .= "MIME-Version: 1.0";
$ip.="Adresse IP: ". $_SERVER['REMOTE_ADDR'] . "\n";
$nav.="Navigateur: ". $_SERVER['HTTP_USER_AGENT'] . "\n\n";
if (@mail($email_webmaster,$titre_cache.$_POST["titre"],$ip.$nav.$_POST["message"],$entete)){
// mail envoyé
// on envoie un accusé de réception
$entete2 = "From: ".$email_webmaster." <".$email_webmaster.">\n";
$entete2 .= "Return-Path: ". $email_webmaster . "\n";
$entete2 .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
$entete2 .= "MIME-Version: 1.0";
mail($_POST["email_expediteur"],$titre_cache.$_POST["titre"],"<html><body bgcolor='#404040'><table><tr><td width='110'><img src='http://www.lampe-videoprojecteur.info/lampe.jpg'></td><td><font face='trebuchet ms, verdana, arial' color='#C0C0C0'>Bonjour,<br>votre message <b>".$_POST["titre"]."</b> :<br><b>".$_POST["message"]."</b><br><br>a bien &eacute;t&eacute; re&ccedil;u et nous vous en remercions.<br>Nous vous r&eacute;pondrons dans les meilleurs d&eacute;lais sur votre adresse ".$_POST["email_expediteur"]."<br><br><b>A bient&ocirc;t sur <a href='http://www.lampe-videoprojecteur.info'><font color='#F76231'>www.lampe-videoprojecteur.info</b></font></a> !</td></tr></table></body></html>",$entete2);
echo "<b><font color='#00C000' size='+1'>Parfait !</font><br>Votre message a &eacute;t&eacute; envoy&eacute;.</b><br /><br />\n";
echo "Nous vous r&eacute;pondrons sur votre adresse <b>".$_POST['email_expediteur']."</b>";
echo "</td></tr></table>";
}
else {
// erreur lors de l'envoi du mail
echo "Un probl&egrave;me s'est produit lors de l'envoi du message.\n";
echo "<a href=\"".$_SERVER["PHP_SELF"]."\">R&eacute;essayez...</a>\n";
echo "</td></tr></table>";
}
}
?>

</td></tr>
</table>

<br><br>
<a href="http://www.xiti.com/xiti.asp?s=481598" title="WebAnalytics" target="_top">
<script type="text/javascript">
<!--
Xt_param = 's=481598&p=';
try {Xt_r = top.document.referrer;}
catch(e) {Xt_r = document.referrer; }
Xt_h = new Date();
Xt_i = '<img width="80" height="15" border="0" alt="" ';
Xt_i += 'src="http://logv1.xiti.com/g.xiti?'+Xt_param;
Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
if(parseFloat(navigator.appVersion)>=4)
{Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;}
document.write(Xt_i+'&ref='+Xt_r.replace(/[<>"]/g, '').replace(/&/g, '$')+'" title="Internet Audience">');
//-->
</script>
<noscript>
Mesure d'audience ROI statistique webanalytics par <img width="80" height="15" src="http://logv1.xiti.com/g.xiti?s=481598&p=" alt="WebAnalytics" />
</noscript></a>

</body></html>