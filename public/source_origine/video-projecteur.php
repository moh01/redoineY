<? require("lvi.lib.php"); $videoprojecteur= $_GET['videoprojecteur']; $modele= $_GET['modele']; ?>
<html><head>
<title>Videoprojecteur <? echo $videoprojecteur ?> <? echo $modele ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta name="robots" content="ALL">
<meta name="rating" content="General">
<meta name="copyright" content="DAVID-ARGENCE S.L.">
<meta name="description" content="Le videoprojecteur <? echo $videoprojecteur ?> <? echo $modele ?>">
<meta name="keywords" content="lampe videoprojecteur retroprojecteur <? echo $videoprojecteur ?> <? echo $modele ?>">
<meta name="author" content="David Argence">
<meta http-equiv="reply-to" content="contact@lampe-videoprojecteur.info">
<meta name="language" content="Fr">
<META HTTP-EQUIV="imagetoolbar" CONTENT="no">

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script></head>
<BODY bgcolor="#404040" oncontextmenu="return false">

<font face="verdana,arial" size="-1"><center>

<LINK REL="stylesheet" TYPE="text/css" HREF="style.css">

<!-- TABLEAU 1 HAUT DE PAGE -->

<table border="0" width="900">


<tr><td width="110" valign="bottom"><a href="http://www.lampe-videoprojecteur.info/"><img src="lampe-videoprojecteur.info.gif" border="0" alt="lampe videoprojecteur"></a></td>

<td valign="bottom">

<h1><a href="lampe-videoprojecteur.php" title="Lampe videoprojecteur">lampe-videoprojecteur</a><font color="#FF7F00">.info</font></h1><g:plusone></g:plusone><br/><br/>

<img src="puce-accueil.gif"><a href="http://www.lampe-videoprojecteur.info/">Tout savoir sur la lampe de videoprojecteur</a> (Accueil)

<br><br>

<img src="puce-grise.gif"><a href="reference-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">R&eacute;f&eacute;rences des lampes <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="infos-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Sp&eacute;cifications des lampes <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="duree-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Dur&eacute;e des lampes des videoprojecteurs <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="prix-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Prix des lampes videoprojecteur <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="lampes-videoprojecteur-<? echo $videoprojecteur ?>.html">Manuels d'utilisation et la marque <? echo $videoprojecteur ?>  sur internet</a>

<br>

<img src="puce-grise.gif"><a href="acheter-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html"><font color="#4ABDD6">Acheter une lampe de videoprojecteur <? echo $videoprojecteur ?></font></a>

</td>

<td valign="bottom" align="center"><img src="lampe-<? echo $videoprojecteur ?>.gif" alt="Lampes <? echo $videoprojecteur ?>"><br>
<img src="puce-fleche.gif">&nbsp;<a href="lampe-videoprojecteur.php">Une autre marque de projecteur ?</a>
</td>

</tr>

<tr><td colspan="4" bgcolor="#808080"></td></tr>

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


<tr><td colspan="2">
<img src="puce-fleche.gif">&nbsp;N'h&eacute;sitez pas &agrave; visiter le <a href="http://www.homecinema-fr.com/forum/viewforum.php?f=84" target="_blank">Forum homecinema-fr.com</a><br><br></td></tr>

<tr><td width="490" height="1" align="center">

<center>
<h2><font color="#FF7F00"><? echo $videoprojecteur." ".$modele ?></font></h2>
</center>
</td><td rowspan="2" valign="bottom">

<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/photos/'.$videoprojecteur.'-'.$modele.'.gif')) {
  echo '<img src="photos/'.$videoprojecteur.'-'.$modele.'.gif" border="3" style="border-color:#FF7F00" alt="'.$videoprojecteur.' '.$modele.'">';
}
?>

</td></tr>


<tr><td valign="bottom">

<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/presentation/'.$videoprojecteur.'-'.$modele.'.txt')) {
   include('presentation/'.$videoprojecteur.'-'.$modele.'.txt');
}
?>
<br><br>
</td></tr>

<tr><td bgcolor="#808080" height="1">
<img src="web.gif">&nbsp;<a href="sortie.php?videoprojecteur=<? echo $videoprojecteur ?>" target="_blank"><font color="#FFFFFF">Site officiel <? echo $videoprojecteur ?></font></a>

</td>

<td align="center">
Projecteur <b> <? echo $videoprojecteur ?> <? echo $modele ?></b> 
</td></tr>


<tr><td bgcolor="#808080" height="1">
<img src="cale2.gif">&nbsp;<a href="reference-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html"><font color="#FF7F00">Retour &agrave; la liste des projecteurs <? echo $videoprojecteur ?></font></a>

</td></tr>

<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/manuels/'.$videoprojecteur.'-'.$modele.'.pdf')) {
  echo '<tr><td bgcolor="#808080" valign="bottom" height="1"><img src="pdf.gif">&nbsp;<a href="manuels/'.$videoprojecteur.'-'.$modele.'.pdf" target="_blank"><font color="#FFFFFF">T&eacute;l&eacute;charger le manuel d\'utilisation '.$videoprojecteur.' '.$modele.'</font></a></td></tr>';
}
?>


<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/brochures/'.$videoprojecteur.'-'.$modele.'.pdf')) {
  echo '<tr><td bgcolor="#808080" valign="bottom" height="1"><img src="pdf.gif">&nbsp;<a href="brochures/'.$videoprojecteur.'-'.$modele.'.pdf" target="_blank"><font color="#FFFFFF">T&eacute;l&eacute;charger la brochure commerciale  '.$videoprojecteur.' '.$modele.'</font></a></td></tr>';
}
?>

<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/technique/'.$videoprojecteur.'-'.$modele.'.pdf')) {
  echo '<tr><td bgcolor="#808080" valign="bottom" height="1"><img src="pdf.gif">&nbsp;<a href="technique/'.$videoprojecteur.'-'.$modele.'.pdf" target="_blank"><font color="#FFFFFF">T&eacute;l&eacute;charger la fiche technique  '.$videoprojecteur.' '.$modele.'</font></a></td></tr>';
}
?>

<tr><td height="5" bgcolor="#808080"></td></tr>

</table>

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