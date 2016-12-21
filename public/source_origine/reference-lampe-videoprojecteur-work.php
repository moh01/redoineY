<? require("lvi.lib.php"); $videoprojecteur= $_GET['videoprojecteur']; ?>
<html><head>
<title>Lampe videoprojecteur <? echo $videoprojecteur ?> : R&eacute;f&eacute;rence des lampes <? echo $videoprojecteur ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
<meta name="robots" content="ALL">
<meta name="rating" content="General">
<meta name="copyright" content="DAVID-ARGENCE S.L.">
<meta name="description" content="R&eacute;f&eacute;rence lampe <? echo $videoprojecteur ?>">
<meta name="keywords" content="lampe videoprojecteur retroprojecteur <? echo $videoprojecteur ?>">
<meta name="author" content="David Argence">
<meta http-equiv="reply-to" content="contact@lampe-videoprojecteur.info">
<meta name="language" content="Fr">

<SCRIPT SRC="recherche.js"></script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script></head>
<BODY bgcolor="#404040">

<SCRIPT language="JavaScript">InitBulle("navy","#FFCC66","orange",1);
// InitBulle(couleur de texte, couleur de fond, couleur de contour taille contour)
</SCRIPT>

<font face="verdana,arial" size="-1"><center>

<LINK REL="stylesheet" TYPE="text/css" HREF="style.css">

<!-- TABLEAU 1 HAUT DE PAGE -->

<table border="0" width="900">


<tr><td width="110" valign="bottom"><a href="http://www.lampe-videoprojecteur.info/"><img src="lampe-videoprojecteur.info.gif" border="0" alt="lampe videoprojecteur"></a></td>

<td valign="bottom">

<table border="0"><tr><td><h1><a href="lampe-videoprojecteur.php" title="Lampe videoprojecteur">lampe-videoprojecteur</a></h1></td><td valign="top"><font color="#FF7F00" size="+3"><b>.info</b></font></td></tr></table>

<img src="puce-accueil.gif"><a href="http://www.lampe-videoprojecteur.info/">Tout savoir sur la lampe de videoprojecteur</a> (Accueil)

<br><br>

<img src="puce-orange.gif">R&eacute;f&eacute;rences des lampes <? echo $videoprojecteur ?>

<br>

<img src="puce-grise.gif"><a href="infos-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Sp&eacute;cifications des lampes <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="duree-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Dur&eacute;e des lampes des videoprojecteurs <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="prix-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Prix des lampes videoprojecteur <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="lampes-videoprojecteur-<? echo $videoprojecteur ?>.html">Manuels d'utilisation et la marque <? echo $videoprojecteur ?>  sur internet</a>

<br>

<img src="puce-grise.gif"><a href="acheter-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Acheter une lampe de videoprojecteur <? echo $videoprojecteur ?></a>

</td>

<td valign="bottom" align="center"><img src="lampe-<? echo $videoprojecteur ?>.gif"><br>
<img src="puce-fleche.gif">&nbsp;<a href="lampe-videoprojecteur.php">Une autre marque ?</a>
</td>

</tr>

<tr><td colspan="4" bgcolor="#808080"></td></tr>

<tr><td></td><td colspan="3">

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

</td></tr>

</table>


<!-- TABLEAU 2 CONTENU -->

<table width="900" border="0">



<tr><td colspan="2"><h2>R&eacute;f&eacute;rences des lampes de videoprojecteurs <? echo $videoprojecteur ?></h2></td></tr>
<tr><td colspan="2">

<form name="cherchedanspage" onSubmit="return TrouveDansPage(this.chainecherchee.value);">
<table border="0" cellspacing="0" cellpadding="0"><tr><td background="fond-cherche.gif">
&nbsp;<input name="chainecherchee" type="text" value="mot-clé" size="20" maxlength="100" onChange="a_n = 0;" onFocus="a_selectAll(this);"  style="width:100px; height:20px; background-color:#ff7f00; color:#000000;"></td><td>
<input type="image" src="chercher.gif" height="40" name="Submit" value="Chercher"> 
</td></tr></table></form>


</td></tr>

<tr><td><font color="#FF7F00" size="+1">Vid&eacute;oprojecteur / Retroprojecteur</font></td>

<td><font color="#FF7F00" size="+1">R&eacute;f&eacute;rence de la lampe</font></td></tr>

<? $listing = modelsByManufacturer($videoprojecteur); while ($modele = mysql_fetch_object($listing)) { ?>

<tr><td bgcolor="#808080">

<? echo $modele->Manufacturer." ".$modele->ModelNo; ?>
</td>

<td bgcolor="#808080"><? echo $modele->ManuPartCode; ?></td>

<td>
<A href="#" onMouseOver="AffBulle('<? echo $modele->Manufacturer." ".$modele->ModelNo; ?><br>Lampe: <? echo $modele->ManuPartCode; ?><br><? echo $modele->Display; ?><br>Type : <? echo $modele->LampType; ?>, <? echo $modele->Wattage; ?> watts<br>Dur&eacute;e de vie: <? echo $modele->LampHours; ?> heures<br>Prix indicatif : <? echo margeBenef($modele->Trade_Price); ?>,00 - <? echo number_format(round(margeBenef($modele->Trade_Price*1.18))); ?>,00 &euro;<br><? if (file_exists(/lampe-videoprojecteur/$modele->Manufacturer."-".$modele->ModelNo.".jpg")) { echo <img src='/lampe-videoprojecteur/$modele->Manufacturer."-".$modele->ModelNo.".jpg; } else { echo <img src="lampe-0.jpg; } ?>')" OnMouseOut="HideBulle()">+</A>
</td></tr>

<? } ?>


<tr>

<?
if (file_exists('/home/wwwuser/sites/lampe-videoprojecteur.info/www/lampe-videoprojecteur/lampe-'.$videoprojecteur.'.jpg')) {
  echo '<td height="300" valign="top" background="lampe-videoprojecteur/lampe-'.$videoprojecteur.'.gif"><font size="+1" color="404040">Une lampe '.$videoprojecteur.'</font></td>';
}
?>

<td align="center">

R&eacute;f&eacute;rences des <b>lampes de videoprojecteurs <? echo $videoprojecteur ?></b>


</td></tr>
</table>


</body></html>
