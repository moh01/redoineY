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

preg_match("/^url=(.*)/",$_SERVER[QUERY_STRING],$matches);
Header("Location: $matches[1]");
exit();
?>