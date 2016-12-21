<? require("lvi.lib.php"); $videoprojecteur= $_GET['videoprojecteur']; ?>
<html><head>
<title>Lampes videoprojecteurs <? echo $videoprojecteur ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
<meta name="robots" content="ALL">
<meta name="rating" content="General">
<meta name="copyright" content="DAVID-ARGENCE S.L.">
<meta name="description" content="Les lampes videoprojecteur <? echo $videoprojecteur ?>">
<meta name="keywords" content="lampe videoprojecteur <? echo $videoprojecteur ?>">
<meta name="author" content="David Argence">
<meta http-equiv="reply-to" content="contact@lampe-videoprojecteur.info">
<meta name="language" content="Fr">

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script src="cherchedanspage.js" type="text/javascript"></script> 
</head>
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

<img src="puce-grise.gif"><a href="reference-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">R&eacute;f&eacute;rences des lampes <? echo $videoprojecteur ?></a><br>

<img src="puce-grise.gif"><a href="infos-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Sp&eacute;cifications des lampes <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="duree-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Dur&eacute;e de vie des des lampes des videoprojecteurs <? echo $videoprojecteur ?></a>

<br>

<img src="puce-grise.gif"><a href="prix-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html">Prix des lampes videoprojecteur <? echo $videoprojecteur ?></a>

<br>

<img src="puce-orange.gif">Manuels d'utilisation et la marque <? echo $videoprojecteur ?> sur internet

<br>

<img src="puce-grise.gif"><a href="acheter-lampe-videoprojecteur-<? echo $videoprojecteur ?>.html"><font color="#4ABDD6">Acheter une lampe de videoprojecteur <? echo $videoprojecteur ?></font></a>

</td>

<td valign="bottom" align="center"><img src="lampe-<? echo $videoprojecteur ?>.gif"><br>
<img src="puce-fleche.gif">&nbsp;<a href="lampe-videoprojecteur.php">Une autre marque ?</a>
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

<tr><td><h2>La marque de videoprojecteur <font color="FF7F00"><? echo $videoprojecteur ?></font> sur Internet</h2>
<img src="puce-fleche.gif">&nbsp;N'h&eacute;sitez pas &agrave; visiter le <a href="http://www.homecinema-fr.com/forum/viewforum.php?f=84" target="_blank">Forum homecinema-fr.com</a><br><br>
</td></tr>


<? if (!$videoprojecteur) { ?>
<tr><td colspan="2" bgcolor="#808080"><font size="+1">
Choisissez une marque <a href="lampe-videoprojecteur.php" title="lampe videoprojecteur">en cliquant ici</a>

<? } else { ?>

<tr><td bgcolor="#808080">&nbsp;<font size="+1" color="#FF7F00"><b>>
<a href="sortie.php?videoprojecteur=<? echo $videoprojecteur ?>" target="_blank"><font color="#FF7F00"> Site officiel <? echo $videoprojecteur ?></b></font></font></a>&nbsp;

<? } ?>

<? if ($videoprojecteur == "Anders Kern" || $videoprojecteur == "Barco" || $videoprojecteur == "Christie" || $videoprojecteur == "Dream vision" || $videoprojecteur == "Infocus" || $videoprojecteur == "Marantz" || $videoprojecteur == "Plus" || $videoprojecteur == "Proxima" || $videoprojecteur == "Projectiondesign") { ?>
<img src="anglais.gif" alt="site en anglais">


<? } elseif ($videoprojecteur == "Geha") { ?>
<img src="allemand.gif" alt="site en allemand">

<? } elseif ($videoprojecteur == "Sim2") { ?>
<img src="italien.gif" alt="site en italien">
<img src="anglais.gif" alt="site en anglais">

<? } ?>

</td></tr>

<tr><td>&nbsp;</td></tr>

<tr><td bgcolor="#808080">&nbsp;<font size="+1" color="#FF7F00"><b>Manuels, notices d'utilisation <? echo $videoprojecteur ?></b></font></td></tr>

<tr><td>

<form name="cherchedanspage" onSubmit="return TrouveDansPage(this.chainecherchee.value);">
<table border="0" cellspacing="0" cellpadding="0"><tr><td background="fond-cherche.gif">
&nbsp;<input name="chainecherchee" type="text" value="mot-clé" size="20" maxlength="100" onChange="a_n = 0;" onFocus="a_selectAll(this);"  style="width:100px; height:20px; background-color:#ff7f00; color:#000000;"></td><td>
<input type="image" src="chercher.gif" height="40" name="Submit" value="Chercher">  <i>Ne fonctionne pas sous Firefox !</i>
</td></tr></table>

</td></tr></form>

<tr>

<? $listing = modelsByManufacturer($videoprojecteur); while ($modele = mysql_fetch_object($listing)) { ?>

<?
if (file_exists('/home/wwwuser/www/lampe-videoprojecteur.info/manuels/'.$videoprojecteur."-".$modele->ModelNo.'.pdf')) { ?>

<td bgcolor="#808080">

<a href='manuels/<? echo $videoprojecteur."-".$modele->ModelNo; ?>.pdf' target='_blank'>
<img src='pdf.gif' border="0" height='20' alt='Telecharger le manuel <? echo $videoprojecteur." ".$modele->ModelNo; ?> au format PDF'></a>
&nbsp;&nbsp;


<a href='manuels/<? echo $videoprojecteur."-".$modele->ModelNo; ?>.pdf' target='_blank' title='Telecharger la notice <? echo $videoprojecteur." ".$modele->ModelNo; ?>'><? echo $modele->Display." ".$videoprojecteur." ".$modele->ModelNo; ?></a>

    <? } else { ?>


<? } ?>



</td></tr>

<? } ?>

<tr><td><br><br>
Certains manuels sont en langue anglaise.<br>
Vous n'avez pas trouv&eacute; votre manuel d'utilisation ? <a href="contact.php"><font color="#FF7F00">Contactez-nous</a></font>
<br><br>

<br><br>
<font color="#FF7F00">
Un lien ne fonctionne plus ?<br>Merci de nous le signaler <a href="mailto:contact@lampe-videoprojecteur.info?subject=Lien brisé sur la page <? echo $videoprojecteur ?>">en cliquant ici</a> ou en utilisant le <a href="contact.php">formulaire de contact</a></font>
</td></tr>


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