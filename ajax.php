<?php
 	include("include/include.php");

	if (isset($_POST["createTable"]))
	{
		if (isset($_SESSION['idUser']))
		{
			$idUser = $_SESSION['idUser'];
		}
		else
		{
			$idUser = "";
		}

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
			return getListCVE("", "", "", $page, $idUser);
		}
		else
		{
			if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status'], $page, $idUser);
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "", $page, $idUser);
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), "", $_POST['status'], $page, $idUser);
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", json_decode($_POST['faille']), $_POST['status'], $page, $idUser);
			}
			else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", "", $_POST['status'], $page, $idUser);
			}
			else
			{
					return getListCVE("", "", "", $page, $idUser);
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
	else if (isset($_SESSION['idUser']) && isset($_POST['favoris']) && isset($_POST['idCve']))
	{
		$exist = queryFetchWith2Value($queryCheckIfExistInCveUser, ":idUser", $_SESSION['idUser'], ":idCve", $_POST['idCve']);

		if ($_POST['favoris'] == 0)
		{
			$favoris = 1;
		}
		else
		{
			$favoris = 0;
		}

		if ($exist[0]["COUNT(*)"] != 0)
		{
			queryExecuteWith3Value($queryUpdateFavorisUserCve, ":idUser", $_SESSION['idUser'], ":idCve", $_POST['idCve'], ":favoris", $favoris, false);
		}
		else
		{
			queryExecuteWith3Value($queryInsertFavorisUserCve, ":idUser", $_SESSION['idUser'], ":idCve", $_POST['idCve'], ":favoris", $favoris, false);
		}
	}
?>
