<?php
	include("fonctions.php");
 	include("SQLQuery.php");

	if (isset($_POST["createTable"]))
	{
		if ($_POST["createTable"] == "empty")
		{
			return getListCVE("", "", "");
		}
		else
		{
			if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status']);
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "");
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), "", $_POST['status']);
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", json_decode($_POST['faille']), $_POST['status']);
			}
			else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", "", $_POST['status']);
			}
			else
			{
					return getListCVE("", "", "");
			}
		}
	}
?>
