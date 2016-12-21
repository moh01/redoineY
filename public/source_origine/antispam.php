<?php

/*
	Script antispam créé le 2 novembre 2006 par Byc
	http://www.ovidea.com/
	All Rights Reserved
*/

function antispam_check()
{
	if((isset($_POST["asa"]) && isset($_POST["asb"])) || (isset($_GET["asa"]) && isset($_GET["asb"])))
	{
		if(isset($_POST["asa"]))
		{
			$asa = $_POST["asa"];
			$asb = $_POST["asb"];
		}
		else
		{
			$asa = $_GET["asa"];
			$asb = $_GET["asb"];
		}
		
		$asc = explode("_", $asb);
		
		if(((($asc[0] + $asc[2]) == $asa && $asc[1] == 0) || (($asc[0] - $asc[2]) == $asa && $asc[1] == 1)) && strlen($asa) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function antispam_ins()
{	
	$operateur = array("+", "-");
	$alpha = rand(1, 10);
	$op = rand(0, 1);
	$beta = rand(1, 10);
	
	echo $alpha."&nbsp;".$operateur[$op]."&nbsp;".$beta."&nbsp;=&nbsp;<input type='text' name='asa' value='' size='10' maxlength='10' /><br />";
	echo "<input type='hidden' name='asb' value='".$alpha."_".$op."_".$beta."' />";
}

?>