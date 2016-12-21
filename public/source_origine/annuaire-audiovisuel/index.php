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

require "settings.php";
$npages = nfic();
$lines = array ();
if ($settings['system'] == 2) {$newline = "\r\n";}
elseif ($settings['system'] == 3) {$newline = "\r";}
else {$newline = "\n";}
require_once("header.php");
?>
<table width="900" align="center" border="0">
  <tr>
    <td><?php if ($_GET['page'] <= 1) { ?>
      <p><h1><font color="#fe7f14">Annuaire Audiovisuel</font></h1><!--Bienvenue sur la page <strong><em>partenaires</em></strong> de <a href="<?php echo $settings['site_url']; ?>"><?php echo $settings['anchor']; ?></a>. -->Pour augmenter la popularité de votre site, ajoutez votre site sur cette page.<br>La prise en compte est immédiate. Un lien en retour est obligatoire.<br>Consultez les explications <a href="#explications">en bas de page</a>. Merci.</p>
     <?php
		}
		if ($mes) echo "<p>$mes</p>"
		?>
      <p>
        <?php
			if ($npages < 2) { echo "Page : "; } else { echo "Pages : "; }
			if (!$_GET['page']) { $page = 1; } else { $page = $_GET['page']; }
			for ($p=1; $p<=$npages ;$p++) {
				if ($p > 1) { $lien="index.php?page=$p"; } else { $lien="."; }
				$class = "pageautre";
				if ($p == $page) { $class = "pageactuelle"; }
				echo "<a href=\"$lien\"><span class=\"$class\">$p</span></a>&nbsp;&nbsp;";
			}
		$lines=file("dataliens".$page.".txt");
		?>
      </p></td>
  </tr>
  <tr>
    <td><span style="fcolor:#fe7f14"><strong>D&eacute;j&agrave; dans l'annuaire :</strong></span>
      <hr size="1" color="black" /></td>
  </tr>
</table>
<?php
foreach ($lines as $thisline)
{
	chop($thisline);
	if (strlen($thisline) < 10) { continue; }
	list($email,$title,$url,$recurl,$description) = explode($settings['delimiter'],$thisline);
	if ($settings['clean'] != 1) { $url = "go.php?url=".$url; }
?>
<table width="900" align="center" border="0">
  <tr>
    <td><a href="<?php echo $url; ?>" target="_blank"><font color="#4ABDD6"><b><?php echo stripslashes($title); ?></b></font></a><span style="color:#c0c0c0"> : <?php echo stripslashes($description); ?> </span></td>
  </tr>
</table>
<?
}
if ($_GET['page'] <= 1 ) {
?>
<br />
<br />
<table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><a name="Explications" id="Explications"></a><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#fe7f14"><strong>Explications :</strong></span>
      <hr size="1" color="black" />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#c0c0c0">Pour être partenaire et faire un echange de liens avec <?php echo $settings['nom_site']; ?>, c'est très simple, il suffit de :<br />
      1 - Placer un lien vers la page <a href="<?php echo $settings['site_url']; ?>" target="_blank"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF"><?php echo $settings['site_url']; ?></span></a> sur une page de votre site.<br />
      2 - Remplir le formulaire ci-dessous.<br />
      <br />
Votre site sera <u>effac&eacute;</u> sans pr&eacute;avis :<br>
<font color="#336699">&#149;</font>&nbsp;Si votre site n' a aucun rapport avec : Cin&eacute;ma, DVD, Home-cinema, Musique, Spectacle, High-Tech, Projection, Ampoules et Lampes...<br>
<font color="#336699">&#149;</font>&nbsp;Si le lien est plac&eacute; sur une page remplie de liens sans autre contenu r&eacute;el<br>
<font color="#336699">&#149;</font>&nbsp;Si nous constatons que le lien de retour vers <?php echo $settings['nom_site']; ?> n'est pus pr&eacute;sent sur votre site (v&eacute;rification automatique).<br><br>
Merci de votre compr&eacute;hension.<br /></span>
      <br />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#fe7f14"><strong>Le code a mettre sur votre site avant de commencer :</strong></span>
      <hr size="1" color="black" />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF">&lt;a href=&quot;<?php echo $settings['site_url']; ?>&quot; target=&quot;_blank&quot;&gt;<?php echo $settings['anchor']; ?>&lt;/a&gt;</span><br />
      <br />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#fe7f14"><strong>Formulaire :</strong></span>
      <hr size="1" color="black" />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0C0C0"><strong>Attention : </strong>avant de vous inscrire, vous devez placer un lien vers la page <i><?php echo $settings['site_url']; ?></i> sur une page de votre site.</span><br />
      <form action="addlink.php" method="post">
        <table>
          <tr>
            <td align="right"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0C0C0; font-weight:bold">Nom de votre site : </span></td>
            <td><input type="text" name="title" size="30" maxlength="25" /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0c0c0; font-weight:bold">URL de votre site sans  / à la fin : </span></td>
            <td><input type="text" name="url" size="30" value="http://" /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0c0c0; font-weight:bold">URL de la page de votre site où est affiché le lien vers <?php echo $settings['nom_site']; ?> : </span></td>
            <td><input type="text" name="recurl" size="30" value="http://" /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0c0c0; font-weight:bold">Description de vote site (80 caract&egrave;res max.) : </span></td>
            <td><input name="description" type="text" size="30" maxlength="80" /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#C0c0c0; font-weight:bold">Votre adresse email : </span></td>
            <td><input type="text" name="email" size="30" /></td>
          </tr>
		<tr><td colspan="2" align="right"><font color="#4ABDD6"><? echo $_GET['mes'] ?></td></tr>
          <tr>
            <td align="center" colspan="2"><input type="submit" value="Enregistrer votre site" /></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<?php
}
?>
<br />
<table width="900" align="center" border="0">
  <tr>
    <td><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">
      <?php if ($_GET['page'] > 1 ) { ?>
      <a href="index.php#Explications">Ajouter un lien</a><br />
      <br />
      <?php } ?>
      </font>
      <hr size="1" color="black" />
</td>
  </tr>
</table>
<br />
<?php require_once("footer.php");?>
