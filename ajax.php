<?php
	include("fonctions.php");
 	include("SQLQuery.php");

	if (isset($_POST["createTable"]))
	{
		if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status'])[0]["Nb"]/25);
		}
		else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "")[0]["Nb"]/25);
		}
		else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), "", $_POST['status'])[0]["Nb"]/25);
		}
		else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE("", json_decode($_POST['faille']), $_POST['status'])[0]["Nb"]/25);
		}
		else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE("", "", $_POST['status'])[0]["Nb"]/25);
		}
		else
		{
				$nbPage = ceil(getNbCVE("", "", "")[0]["Nb"]/25);
		}

		if (isset($_POST["previous"]))
		{
			if ($_POST["previous"] - 1 >= 0)
			{
				$page = $_POST["previous"] - 1;
			}
			else
			{
				$page = $_POST["previous"];
			}
		}
		else if (isset($_POST["next"]))
		{
			if ($_POST["next"] + 1 < $nbPage)
			{
				$page = $_POST["next"] + 1;
			}
			else
			{
				$page = $_POST["next"];
			}
		}
		else
		{
			$page = 0;
		}

		if ($_POST["createTable"] == "empty")
		{
			return getListCVE("", "", "", $page);
		}
		else
		{
			if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status'], $page);
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "", $page);
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), "", $_POST['status'], $page);
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", json_decode($_POST['faille']), $_POST['status'], $page);
			}
			else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", "", $_POST['status'], $page);
			}
			else
			{
					return getListCVE("", "", "", $page);
			}
		}
	}
	else if (isset($_POST["createStat"]))
	{
		if ($_POST["createStat"] == "empty")
		{
			return getStatCVE("", "", "");
		}
		else
		{
			if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getStatCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status']);
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
					return getStatCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "");
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getStatCVE(json_decode($_POST['editeur']), "", $_POST['status']);
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getStatCVE("", json_decode($_POST['faille']), $_POST['status']);
			}
			else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getStatCVE("", "", $_POST['status']);
			}
			else
			{
					return getStatCVE("", "", "");
			}
		}
	}
?>
