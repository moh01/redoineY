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

preg_match("/^url=(.*)/",$_SERVER[QUERY_STRING],$matches);
Header("Location: $matches[1]");
exit();
?>