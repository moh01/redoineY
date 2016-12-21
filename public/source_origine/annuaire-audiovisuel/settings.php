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

include ("fonctions.php");

/*************************************
       DEBUT DE LA CONFIGURATION
*************************************/

// Votre site Web est sur quel type de serveur ? 1 = UNIX (Linux), 2 = Windows, 3 = Mac
$settings['system']=1;

// Mot de passe pour la section d'administration 
$settings['apass']="masterdavidou";

// Infos de votre site Web
$settings['nom_site']="www.lampe-videoprojecteur.info"; // nom du site
$settings['site_url']="http://www.lampe-videoprojecteur.info"; //URL sans / à la fin
$settings['script_url']="http://www.lampe-videoprojecteur.info/annuaire-audiovisuel/"; //répertoire d'installation du script, doit se terminer par /

// Textes tournants du lien retour, ajoutez ou supprimez autant de textes que vous voulez
$texte=array("Site d'information sur le vid&eacute;oprojecteur et sa lampe","Manuels et documentations des vid&eacute;oprojecteurs et lampes");

// Votre adresse E-mail
$settings['admin_email']="contact@lampe-videoprojecteur.info";

// Envoyez un e-mail au partenaire lorsque quelqu'il ajoute un liens ? 1 = oui, 0 = non
$settings['notify']=1;

// Nombre maximum des liens sur une page ?
$settings['max_links']=20;

// Nombre de derniers sites à afficher
$settings['nder']=3;

// L'URL des sites voulant s'inscrire doit-être celle de la page d'accueil du site ? 1 = oui, 0 = non
$settings['dom_acc']=0;

// L'URL des sites voulant s'inscrire peut contenir des paramètres (ex. index.php?id=toto) ? 1 = oui, 0 = non
$settings['dom_param']=0;

// Autoriser les inscriptions multiples par domaine (concerne surtout les hébergeurs gratuits) (ex. toto.free.fr, titi.free.fr, ...) ? 1 = oui, 0 = non
$settings['multi']=0;

// Utiliser la liste noire pour filtrer les inscriptions ? 1 = oui, 0 = non
$settings['listenoire']=1;

//  Qualité des liens : 1 = liens en dur(http://www.domaine.com) ou 0 = redirection de type (go?=http://www.domaine.com)
$settings['clean']=1;

// Où placer les nouveaux liens ajoutés par l'administration ? 0 = en début de liste, 1 = en fin de liste 
$settings['add_to']=0;

/*************************************
       FIN DE LA CONFIGURATION
*************************************/

// NE PAS MODIFIER CI-DESSOUS
 
error_reporting(E_ALL ^ E_NOTICE);
$settings['version']="5.0";
$settings['delimiter']="\t";
srand((float) microtime()*1000000);
$max=count($texte)-1;
$i=rand(0, $max); 
$settings['anchor']=$texte[$i];
?>