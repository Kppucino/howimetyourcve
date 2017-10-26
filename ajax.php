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
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), json_decode($_POST['faille'], ""), $_POST['status'])[0]["Nb"]/25);
		}
		else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "")[0]["Nb"]/25);
		}
		else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE(json_decode($_POST['editeur']), "", $_POST['status'], "")[0]["Nb"]/25);
		}
		else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE("", json_decode($_POST['faille']), $_POST['status'], "")[0]["Nb"]/25);
		}
		else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
		{
				$nbPage = ceil(getNbCVE("", "", $_POST['status'], "")[0]["Nb"]/25);
		}
		else
		{
				$nbPage = ceil(getNbCVE("", "", "", "")[0]["Nb"]/25);
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
			return getListCVE("", "", "", $page, $idUser, "");
		}
		else
		{
			if (isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), $_POST['status'], $page, $idUser, "");
			}
			else if (isset($_POST['editeur']) && isset($_POST['faille']) && !isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), json_decode($_POST['faille']), "", $page, $idUser, "");
			}
			else if (isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE(json_decode($_POST['editeur']), "", $_POST['status'], $page, $idUser, "");
			}
			else if (!isset($_POST['editeur']) && isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", json_decode($_POST['faille']), $_POST['status'], $page, $idUser, "");
			}
			else if (!isset($_POST['editeur']) && !isset($_POST['faille']) && isset($_POST['status']))
			{
					return getListCVE("", "", $_POST['status'], $page, $idUser, "");
			}
			else
			{
					return getListCVE("", "", "", $page, $idUser, "");
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
		queryExecuteWithoutValue($queryDeleteEmptyLineLinkCveUser, false);
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
	else if (isset($_POST["search"]))
	{
		if (isset($_POST["previousCve"]))
		{
			if ($_POST["previousCve"] - 1 >= 0)
			{
				$page = $_POST["previousCve"] - 1;
			}
			else
			{
				$page = $_POST["previousCve"];
			}

			searchFor($search, "cve", $page);
		}
		else if (isset($_POST["nextCve"]))
		{
			$nbPage = ceil(getNbCVE("", "", "", $_POST["nextCve"])[0]["Nb"]/10);

			if ($_POST["nextCve"] + 1 < $nbPage)
			{
				$page = $_POST["nextCve"] + 1;
			}
			else
			{
				$page = $_POST["nextCve"];
			}

			searchFor($_POST["nextCve"], "cve", $page);
		}
	}
  else if(isset($_POST["commentaireUser"]))
  {
    $commentaire = htmlspecialchars($_POST["commentaireUser"]);

    if(isset($_POST["idCveCommentaire"]))
    {
      $commentaireUser = queryFetchWith2Value($queryGetCommentaireCveUser, ":idUser", $_SESSION['idUser'], ":idCve", $_POST["idCveCommentaire"]);

      if(!empty($commentaireUser))
      {
        queryExecuteWith3Value($queryUpdateCommentaireUserCve, ":idUser", $_SESSION['idUser'], ":idCve", $_POST['idCveCommentaire'], ":commentaire", $commentaire, false);
  		}
  		else
  		{
  			queryExecuteWith3Value($queryInsertCommentaireUserCve, ":idUser", $_SESSION['idUser'], ":idCve", $_POST['idCveCommentaire'], ":commentaire", $commentaire, false);
  		}

      queryExecuteWithoutValue($queryDeleteEmptyLineLinkCveUser, false);
    }
    else if(isset($_POST["idEditeurCommentaire"]))
    {
      $commentaireUser = queryFetchWith2Value($queryGetCommentaireEditeurUser, ":idUser", $_SESSION['idUser'], ":idEditeur", $_POST["idEditeurCommentaire"]);

      if(!empty($commentaireUser))
      {
        queryExecuteWith3Value($queryUpdateCommentaireUserEditeur, ":idUser", $_SESSION['idUser'], ":idEditeur", $_POST['idEditeurCommentaire'], ":commentaire", $commentaire, false);
  		}
  		else
  		{
  			queryExecuteWith3Value($queryInsertCommentaireUserEditeur, ":idUser", $_SESSION['idUser'], ":idEditeur", $_POST['idEditeurCommentaire'], ":commentaire", $commentaire, false);
  		}

      queryExecuteWithoutValue($queryDeleteEmptyLineLinkCveEditeur, false);

    }
    else if(isset($_POST["idFailleCommentaire"]))
    {
      $commentaireUser = queryFetchWith2Value($queryGetCommentaireFailleUser, ":idUser", $_SESSION['idUser'], ":idFaille", $_POST["idFailleCommentaire"]);

      if(!empty($commentaireUser))
      {
        queryExecuteWith3Value($queryUpdateCommentaireUserFaille, ":idUser", $_SESSION['idUser'], ":idFaille", $_POST['idFailleCommentaire'], ":commentaire", $commentaire, false);
  		}
  		else
  		{
  			queryExecuteWith3Value($queryInsertCommentaireUserFaille, ":idUser", $_SESSION['idUser'], ":idFaille", $_POST['idFailleCommentaire'], ":commentaire", $commentaire, false);
  		}
      queryExecuteWithoutValue($queryDeleteEmptyLineLinkCveFaille, false);
    }
  }


?>
