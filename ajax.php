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
				if ($_POST['status'] == "all")
				{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "");
				}
				else if ($_POST['status'] == "open")
				{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), 1);
				}
				else if ($_POST['status'] == "close")
				{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), 0);
				}
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
				return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "");
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
				if ($_POST['status'] == "all")
				{
					return getListCVE(json_decode($_POST['editeur']), "", "");
				}
				else if ($_POST['status'] == "open")
				{
					return getListCVE(json_decode($_POST['editeur']), "", 1);
				}
				else if ($_POST['status'] == "close")
				{
					return getListCVE(json_decode($_POST['editeur']), "", 0);
				}
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
				if ($_POST['status'] == "all")
				{
					return getListCVE("", json_decode($_POST['faille']), "");
				}
				else if ($_POST['status'] == "open")
				{
					return getListCVE("", json_decode($_POST['faille']), 1);
				}
				else if ($_POST['status'] == "close")
				{
					return getListCVE("", json_decode($_POST['faille']), 0);
				}
			}
			else
			{
				return getListCVE("", "", "");
			}
		}
	}
?>
