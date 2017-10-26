<?php
	function queryFetchWithoutValue($query)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function queryFetchWith1Value($query, $nomColonne, $value)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne, $value, PDO::PARAM_INT);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function queryFetchWith2Value($query, $nomColonne1, $value1, $nomColonne2, $value2)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function queryFetchWith3Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function queryFetchWith4Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function querFetchWith7Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->execute();
		$result=$query_preparation->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function queryFetchWith1ArrayValue($query, $nomColonne, $array)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		return $cnx->query(str_replace($nomColonne, implode(",", $array), $query))->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryFetchWith2ArrayValue($query, $nomColonne1, $array1, $nomColonne2, $array2)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		return $cnx->query(str_replace($nomColonne2, implode(",", $array2), str_replace($nomColonne1, implode(",", $array1), $query)))->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryFetchWith1ArrayAnd1Value($query, $nomColonne1, $array, $nomColonne2, $value)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query = str_replace($nomColonne1, implode(",", $array), $query);

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne2, $value, PDO::PARAM_INT);
		$query_preparation->execute();
		return $query_preparation->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryFetchWith1ArrayAnd2Value($query, $nomColonne1, $array, $nomColonne2, $value2, $nomColonne3, $value3)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query = str_replace($nomColonne1, implode(",", $array), $query);

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->execute();
		return $query_preparation->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryFetchWith2ArrayAnd1Value($query, $nomColonne1, $array1, $nomColonne2, $array2, $nomColonne3, $value)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query = str_replace($nomColonne2, implode(",", $array2), str_replace($nomColonne1, implode(",", $array1), $query));

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne3, $value, PDO::PARAM_INT);
		$query_preparation->execute();
		return $query_preparation->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryFetchWith2ArrayAnd2Value($query, $nomColonne1, $array1, $nomColonne2, $array2, $nomColonne3, $value3, $nomColonne4, $value4)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query = str_replace($nomColonne2, implode(",", $array2), str_replace($nomColonne1, implode(",", $array1), $query));

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->execute();
		return $query_preparation->fetchAll(PDO::FETCH_ASSOC);
	}

	function queryExecuteWithoutValue($query, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith1Value($query, $nomColonne, $value, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne, $value, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith2Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith3Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith4Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith5Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith6Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith7Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith8Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $nomColonne8, $value8, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);
		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne8, $value8, PDO::PARAM_INT);
		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith14Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $nomColonne8, $value8, $nomColonne9, $value9, $nomColonne10, $value10, $nomColonne11, $value11, $nomColonne12, $value12, $nomColonne13, $value13, $nomColonne14, $value14, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);

		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne8, $value8, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne9, $value9, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne10, $value10, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne11, $value11, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne12, $value12, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne13, $value13, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne14, $value14, PDO::PARAM_INT);

		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith15Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $nomColonne8, $value8, $nomColonne9, $value9, $nomColonne10, $value10, $nomColonne11, $value11, $nomColonne12, $value12, $nomColonne13, $value13, $nomColonne14, $value14, $nomColonne15, $value15, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);

		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne8, $value8, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne9, $value9, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne10, $value10, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne11, $value11, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne12, $value12, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne13, $value13, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne14, $value14, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne15, $value15, PDO::PARAM_INT);

		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith16Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $nomColonne8, $value8, $nomColonne9, $value9, $nomColonne10, $value10, $nomColonne11, $value11, $nomColonne12, $value12, $nomColonne13, $value13, $nomColonne14, $value14, $nomColonne15, $value15, $nomColonne16, $value16, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);

		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne8, $value8, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne9, $value9, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne10, $value10, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne11, $value11, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne12, $value12, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne13, $value13, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne14, $value14, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne15, $value15, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne16, $value16, PDO::PARAM_INT);

		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function queryExecuteWith17Value($query, $nomColonne1, $value1, $nomColonne2, $value2, $nomColonne3, $value3, $nomColonne4, $value4, $nomColonne5, $value5, $nomColonne6, $value6, $nomColonne7, $value7, $nomColonne8, $value8, $nomColonne9, $value9, $nomColonne10, $value10, $nomColonne11, $value11, $nomColonne12, $value12, $nomColonne13, $value13, $nomColonne14, $value14, $nomColonne15, $value15, $nomColonne16, $value16, $nomColonne17, $value17, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query_preparation = $cnx->prepare($query);

		$query_preparation->bindValue($nomColonne1, $value1, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne2, $value2, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne3, $value3, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne4, $value4, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne5, $value5, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne6, $value6, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne7, $value7, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne8, $value8, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne9, $value9, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne10, $value10, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne11, $value11, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne12, $value12, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne13, $value13, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne14, $value14, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne15, $value15, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne16, $value16, PDO::PARAM_INT);
		$query_preparation->bindValue($nomColonne17, $value17, PDO::PARAM_INT);

		$query_preparation->execute();

		if ($lastInsertId == true)
		{
			return $cnx->lastInsertId();
		}
		else
		{
			return true;
		}
	}

	function wd_remove_accents($str, $charset='utf-8')
	{
	    $str = htmlentities($str, ENT_NOQUOTES, $charset);

	    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
	    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
	    $str = preg_replace('#&[^;]+;#', '', $str);

	    return $str;
	}

	function getListCVE($editeur, $faille, $status, $page, $idUser, $search)
	{
			include("SQLQuery.php");

			if (!empty($search))
			{
					$listCVE = queryFetchWith1Value($queryGetCveEditorByNameCve, ":nomCve", '%'.$search.'%');
			}
			else
			{
					$page = $page * 25;

					if (empty($editeur) && empty($faille) && empty($status))
					{
						$listCVE = queryFetchWith1Value($queryGetAllCVEWithEditor, ":offset", $page);
					}
					else if (!empty($editeur) && empty($faille) && empty($status))
					{
						$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur, ":offset", $page);
					}
					else if (empty($editeur) && !empty($faille) && empty($status))
					{
						$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeFaille, ":arrayIdFaille", $faille, ":offset", $page);
					}
					else if (empty($editeur) && empty($faille) && !empty($status))
					{
						if ($status == "all")
						{
							$listCVE = queryFetchWith1Value($queryGetAllCVEWithEditor, ":offset", $page);
						}
						else if ($status == "open")
						{
							$listCVE = queryFetchWith2Value($queryGetAllCVEWithStatus, ":statusCve", 1, ":offset", $page);
						}
						else if ($status == "close")
						{
							$listCVE = queryFetchWith2Value($queryGetAllCVEWithStatus, ":statusCve", 0, ":offset", $page);
						}
					}
					else if (!empty($editeur) && !empty($faille) && empty($status))
					{
						$listCVE = queryFetchWith2ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille, ":offset", $page);
					}
					else if (!empty($editeur) && empty($faille) && !empty($status))
					{
						if ($status == "all")
						{
							$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur, ":offset", $page);
						}
						else if ($status == "open")
						{
							$listCVE = queryFetchWith1ArrayAnd2Value($queryGetAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1, ":offset", $page);
						}
						else if ($status == "close")
						{
							$listCVE = queryFetchWith1ArrayAnd2Value($queryGetAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0, ":offset", $page);
						}
					}
					else if (empty($editeur) && !empty($faille) && !empty($status))
					{
						if ($status == "all")
						{
							$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeFaille, ":arrayIdFaille", $faille, ":offset", $page);
						}
						else if ($status == "open")
						{
							$listCVE = queryFetchWith1ArrayAnd2Value($queryGetAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1, ":offset", $page);
						}
						else if ($status == "close")
						{
							$listCVE = queryFetchWith1ArrayAnd2Value($queryGetAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 0, ":offset", $page);
						}
					}
					else if (!empty($editeur) && !empty($faille) && !empty($status))
					{
						if ($status == "all")
						{
							$listCVE = queryFetchWith2ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille, ":offset", $page);
						}
						else if ($status == "open")
						{
							$listCVE = queryFetchWith2ArrayAnd2Value($queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 1, ":offset", $page);
						}
						else if ($status == "close")
						{
							$listCVE = queryFetchWith2ArrayAnd2Value($queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 0, ":offset", $page);
						}
					}
			}

			if (!empty($idUser))
			{
				createListCVE($listCVE, $idUser);
			}
			else
			{
				createListCVE($listCVE, "");
			}
	}

	function getListEditeur($search)
	{
			include("SQLQuery.php");

			if (!empty($search))
			{
					$listEditeur = queryFetchWith1Value($queryGetEditeurByName, ":nomEditeur", '%'.$search.'%');
					createListEditeur($listEditeur);
			}
	}

	function getListFaille($search)
	{
			include("SQLQuery.php");

			if (!empty($search))
			{
					$listFaille = queryFetchWith1Value($queryGetFailleByName, ":nomFaille", '%'.$search.'%');
					createListFaille($listFaille);
			}
	}

	function createListCVE($listCVE, $idUser)
	{
		include("SQLQuery.php");

		$favoris = queryFetchWith1Value($queryGetFavorisUser, ":idUser", $idUser);

		echo '<tbody>';

		if (empty($listCVE) || $listCVE == "erreur")
		{
				echo '<tr data-status="">';
				echo '<td>';
				echo '<div class="media">';
				echo '<div class="media-body">';
				echo '<span class="media-meta pull-right"></span>';
				echo '<h4 class="title">';
				echo 'Aucun résultat à afficher';
				echo '<span class="pull-right pagado"></span>';
				echo '</h4>';
				echo '<p class="summary"></p>';
				echo '</div>';
				echo '</div>';
				echo '</td>';
				echo '</tr>';
		}
		else
		{
			for ($i=0; $i < sizeof($listCVE); $i++)
			{
					if ($listCVE[$i]["statusCve"] == 1)
					{
							echo '<tr data-status="open">';
					}
					else
					{
							echo '<tr data-status="close">';
					}

					echo '<td>';
					echo '<div class="media">';

					if (isset($listCVE[$i]["logoEditeur"]))
					{
							echo '<a href="editeur.php?idEditeur='.$listCVE[$i]["idEditeur"].'" class="pull-left">';
							echo '<img src="images/logoEditeur/'.$listCVE[$i]["logoEditeur"].'" class="media-photo"></img>';
							echo '</a>';
					}

					echo '<div class="media-body">';
					echo '<a href="cve.php?idCVE='.$listCVE[$i]["idCve"].'">';
					echo '<span class="media-meta pull-right">'.formaterDate($listCVE[$i]["dateCve"]).'</span>';
					echo '<h4 class="title">';
					echo $listCVE[$i]["nomCve"];

					if ($listCVE[$i]["statusCve"] == 1)
					{
							echo '<span class="pull-right pagado">Ouvertes</span>';
					}
					else
					{
							echo '<span class="pull-right cancelado">Fermées</span>';
					}

					echo '</h4>';
					echo '<p class="summary">'.substr($listCVE[$i]["descriptionCve"], 0, 100).'</p>';
					echo '</div>';
					echo '</a>';
					echo '</div>';
					echo '<td>';

					if (searchIfFavoris($favoris, $listCVE[$i]["idCve"]))
					{
						echo '<a class="star favoris">';
						echo '<input type="hidden" name="idCve" value="'.$listCVE[$i]["idCve"].'"></input>';
						echo '<input type="hidden" name="favoris" value="1"></input>';
						echo '<i class="glyphicon glyphicon-star"></i>';
						echo '</a>';
					}
					else
					{
						echo '<a class="star">';
						echo '<input type="hidden" name="idCve" value="'.$listCVE[$i]["idCve"].'"></input>';
						echo '<input type="hidden" name="favoris" value="0"></input>';
						echo '<i class="glyphicon glyphicon-star"></i>';
						echo '</a>';
					}

					echo '</td>';
					echo '</td>';
					echo '</tr>';
			}
		}
		echo '</tbody>';
	}

	function createListEditeur($listEditeur)
	{
		include("SQLQuery.php");
		echo '<tbody>';

		if (empty($listEditeur) || $listEditeur == "erreur")
		{
				echo '<tr data-status="">';
				echo '<td>';
				echo '<div class="media">';
				echo '<div class="media-body">';
				echo '<span class="media-meta pull-right"></span>';
				echo '<h4 class="title">';
				echo 'Aucun résultat à afficher';
				echo '<span class="pull-right pagado"></span>';
				echo '</h4>';
				echo '<p class="summary"></p>';
				echo '</div>';
				echo '</div>';
				echo '</td>';
				echo '</tr>';
		}
		else
		{
			for ($i=0; $i < sizeof($listEditeur); $i++)
			{
					echo '<td>';
					echo '<div class="media">';

					if (isset($listEditeur[$i]["logoEditeur"]))
					{
							echo '<a href="editeur.php?idEditeur='.$listEditeur[$i]["idEditeur"].'" class="pull-left">';
							echo '<img src="images/logoEditeur/'.$listEditeur[$i]["logoEditeur"].'" class="media-photo"></img>';
							echo '</a>';
					}

					echo '<div class="media-body">';
					echo '<a href="editeur.php?idEditeur='.$listEditeur[$i]["idEditeur"].'">';
					echo '<h4 class="title">';
					echo $listEditeur[$i]["nomEditeur"];
					echo '</h4>';
					echo '<p class="summary">'.substr($listEditeur[$i]["descriptionEditeur"], 0, 100).'</p>';
					echo '</div>';
					echo '</a>';
					echo '</div>';
					echo '<td>';
					echo '</td>';
					echo '</td>';
					echo '</tr>';
			}
		}
		echo '</tbody>';
	}

	function createListFaille($listFaille)
	{
		include("SQLQuery.php");
		echo '<tbody>';

		if (empty($listFaille) || $listFaille == "erreur")
		{
				echo '<tr data-status="">';
				echo '<td>';
				echo '<div class="media">';
				echo '<div class="media-body">';
				echo '<span class="media-meta pull-right"></span>';
				echo '<h4 class="title">';
				echo 'Aucun résultat à afficher';
				echo '<span class="pull-right pagado"></span>';
				echo '</h4>';
				echo '<p class="summary"></p>';
				echo '</div>';
				echo '</div>';
				echo '</td>';
				echo '</tr>';
		}
		else
		{
			for ($i=0; $i < sizeof($listFaille); $i++)
			{
					echo '<td>';
					echo '<div class="media">';
					echo '<div class="media-body">';
					echo '<a href="faille.php?idFaille='.$listFaille[$i]["idFaille"].'">';
					echo '<h4 class="title">';
					echo $listFaille[$i]["nomFaille"];

					if (!empty($listFaille[$i]["nomType"]))
					{
							echo '<span class="pull-right">'.$listFaille[$i]["nomType"].'</span>';
					}

					echo '</h4>';
					echo '<p class="summary">'.substr($listFaille[$i]["descriptionFaille"], 0, 100).'</p>';
					echo '</div>';
					echo '</a>';
					echo '</div>';
					echo '<td>';
					echo '</td>';
					echo '</td>';
					echo '</tr>';
			}
		}
		echo '</tbody>';
	}

	function getStatCVE($editeur, $faille, $status)
	{
			include("SQLQuery.php");

			if (empty($editeur) && empty($faille) && empty($status))
			{
				$nbCVE = getNbCVE("", "", "", "");
				$topFailleCVE = queryFetchWithoutValue($queryGetTopFailleAllCVE);
				$topEditeurCVE = queryFetchWithoutValue($queryGetTopEditeurAllCVE);
				$moyenneCVE = queryFetchWithoutValue($queryGetAVGAllCVE);
			}
			else if (!empty($editeur) && empty($faille) && empty($status))
			{
				$nbCVE = getNbCVE($editeur, "", "", "");
				$topFailleCVE = queryFetchWith1ArrayValue($queryGetTopFailleAllCVEWithEditor, ":arrayIdEditeur", $editeur);
				$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
			}
			else if (empty($editeur) && !empty($faille) && empty($status))
			{
				$nbCVE = getNbCVE("", $faille, "", "");
				$topEditeurCVE = queryFetchWith1ArrayValue($queryGetTopEditeurAllCVEWithFaille, ":arrayIdFaille", $faille);
				$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
			}
			else if (empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = getNbCVE("", "", "", "");
					$topFailleCVE = queryFetchWithoutValue($queryGetTopFailleAllCVE);
					$topEditeurCVE = queryFetchWithoutValue($queryGetTopEditeurAllCVE);
					$moyenneCVE = queryFetchWithoutValue($queryGetAVGAllCVE);
				}
				else if ($status == "open")
				{
					$nbCVE = getNbCVE("", "", $status, "");
					$topFailleCVE = queryFetchWith1Value($queryGetTopFailleAllCVEWithStatus, ":statusCve", 1);
					$topEditeurCVE = queryFetchWith1Value($queryGetTopEditeurAllCVEWithStatus, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithStatus, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = getNbCVE("", "", $status, "");
					$topFailleCVE = queryFetchWith1Value($queryGetTopFailleAllCVEWithStatus, ":statusCve", 0);
					$topEditeurCVE = queryFetchWith1Value($queryGetTopEditeurAllCVEWithStatus, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithStatus, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && empty($status))
			{
				$nbCVE = getNbCVE($editeur, $faille, "", "");
				$moyenneCVE = queryFetchWith2ArrayValue($queryGetAVGAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
			}
			else if (!empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = getNbCVE($editeur, "", "", "");
					$topFailleCVE = queryFetchWith1ArrayValue($queryGetTopFailleAllCVEWithEditor, ":arrayIdEditeur", $editeur);
					$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
				}
				else if ($status == "open")
				{
					$nbCVE = getNbCVE($editeur, "", $status, "");
					$topFailleCVE = queryFetchWith1ArrayAnd1Value($queryGetTopFailleAllCVEWithEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = getNbCVE($editeur, "", $status, "");
					$topFailleCVE = queryFetchWith1ArrayAnd1Value($queryGetTopFailleAllCVEWithEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
				}
			}
			else if (empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = getNbCVE("", $faille, $status, "");
					$topEditeurCVE = queryFetchWith1ArrayValue($queryGetTopEditeurAllCVEWithFaille, ":arrayIdFaille", $faille);
					$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$nbCVE = getNbCVE("", $faille, $status, "");
					$topEditeurCVE = queryFetchWith1ArrayAnd1Value($queryGetTopEditeurAllCVEWithFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = getNbCVE("", $faille, $status, "");
					$topEditeurCVE = queryFetchWith1ArrayAnd1Value($queryGetTopEditeurAllCVEWithFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = getNbCVE($editeur, $faille, "", "");
					$moyenneCVE = queryFetchWith2ArrayValue($queryGetAVGAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$nbCVE = getNbCVE($editeur, $faille, $status, "");
					$moyenneCVE = queryFetchWith2ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = getNbCVE($editeur, $faille, $status, "");
					$moyenneCVE = queryFetchWith2ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille, ":statusCve", 0);
				}
			}

			if (!isset($topFailleCVE))
			{
					$topFailleCVE = "";
			}

			if (!isset($topEditeurCVE))
			{
					$topEditeurCVE = "";
			}

			if (!isset($moyenneCVE))
			{
					$moyenneCVE = "";
			}

			createStatCVE($nbCVE, $topFailleCVE, $topEditeurCVE, $moyenneCVE);
	}

	function createStatCVE($nbCVE, $topFailleCVE, $topEditeurCVE, $moyenneCVE)
	{
		if (empty($nbCVE) && empty($topFailleCVE) && empty($topEditeurCVE) && empty($moyenneCVE))
		{
			echo '<h4>'.$nbCVE.' CVE</h4>';
		}
		else
		{
			if (!empty($nbCVE))
			{
				echo '<h4>'.$nbCVE[0]["Nb"].' CVE</h4>';
			}

			if (!empty($topFailleCVE))
			{
				echo '<h4>Top failles :</h4>';

				for ($i=0; $i < sizeof($topFailleCVE); $i++)
				{
					echo '<li><a href="faille.php?idFaille='.$topFailleCVE[$i]["idFaille"].'">'.$topFailleCVE[$i]["nomFaille"].'</a></li>';
				}
			}

			if (!empty($topEditeurCVE))
			{
				echo '<h4>Top éditeurs :</h4>';

				for ($i=0; $i < sizeof($topEditeurCVE); $i++)
				{
					echo '<li><a href="editeur.php?idEditeur='.$topEditeurCVE[$i]["idEditeur"].'">'.$topEditeurCVE[$i]["nomEditeur"].'</a></li>';
				}
			}

			if (!empty($moyenneCVE))
			{
				echo '<h4>Note moyenne : '.number_format($moyenneCVE[0]["Moyenne"], 2).'</h4>';
			}
		}
	}

	function getNbCVE($editeur, $faille, $status, $search)
	{
		include("SQLQuery.php");

		if (!empty($search))
		{
			return $nbCVE = queryFetchWith1Value($queryGetNbCveByName, ":nomCve", '%'.$search.'%');
		}
		else if (empty($editeur) && empty($faille) && empty($status))
		{
			return $nbCVE = queryFetchWithoutValue($queryGetNbAllCVEWithEditor);
		}
		else if (!empty($editeur) && empty($faille) && empty($status))
		{
			return $nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
		}
		else if (empty($editeur) && !empty($faille) && empty($status))
		{
			return $nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
		}
		else if (empty($editeur) && empty($faille) && !empty($status))
		{
			if ($status == "all")
			{
				return $nbCVE = queryFetchWithoutValue($queryGetNbAllCVEWithEditor);
			}
			else if ($status == "open")
			{
				return $nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithStatus, ":statusCve", 1);
			}
			else if ($status == "close")
			{
				return $nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithStatus, ":statusCve", 0);
			}
		}
		else if (!empty($editeur) && !empty($faille) && empty($status))
		{
			return $nbCVE = queryFetchWith2ArrayValue($queryGetNbAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
		}
		else if (!empty($editeur) && empty($faille) && !empty($status))
		{
			if ($status == "all")
			{
				return $nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
			}
			else if ($status == "open")
			{
				return $nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
			}
			else if ($status == "close")
			{
				return $nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
			}
		}
		else if (empty($editeur) && !empty($faille) && !empty($status))
		{
			if ($status == "all")
			{
				return $nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
			}
			else if ($status == "open")
			{
				return $nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
			}
			else if ($status == "close")
			{
				return $nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $editeur, ":statusCve", 0);
			}
		}
		else if (!empty($editeur) && !empty($faille) && !empty($status))
		{
			if ($status == "all")
			{
				return $nbCVE = queryFetchWith2ArrayValue($queryGetNbAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
			}
			else if ($status == "open")
			{
				return $nbCVE = queryFetchWith2ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 1);
			}
			else if ($status == "close")
			{
				return $nbCVE = queryFetchWith2ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 0);
			}
		}
	}

	function printInfoCVE($cve)
	{

		if (isset($cve[0]["severiteCve"]))
		{
				return true;
		}

		if (isset($cve[0]["severiteCve"]))
		{
				return true;
		}

		if (isset($cve[0]["noteImpactCve"]))
		{
				return true;
		}

		if (isset($cve[0]["noteExploitabiliteCve"]))
		{
				return true;
		}

		if (isset($cve[0]["accesComplexiteCve"]))
		{
				return true;
		}

		if (isset($cve[0]["adminAccesCve"]) || isset($cve[0]["userAccesCve"]))
		{
				return true;
		}

		if (isset($cve[0]["userInteractionRequiredCve"]))
		{
				return true;
		}

		if (isset($cve[0]["authentificationImpactCve"]) || isset($cve[0]["confidentialiteImpactCve"]) || isset($cve[0]["integriteImpactCve"]) || isset($cve[0]["disponibiliteImpactCve"]))
		{
				return true;
		}

		return false;
	}

	function formaterDate($date)
	{
		$annee = substr($date, 0, 4);
		$mois = substr($date, 5, 2);
		$jour = substr($date, 8, 2);

		return $jour."/".$mois."/".$annee;
	}

	function checkifUserExist($user, $mdp)
	{
		include("SQLQuery.php");

		$user = htmlspecialchars($user);
		$mdp = htmlspecialchars($mdp);

		$userInfo = queryFetchWith1Value($queryGetUserByName, ":nomUser", $user);

		if (!empty($userInfo))
		{
			if (hash('sha256', $mdp) == $userInfo[0]["passwordUser"])
			{
				return $userInfo;
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

	function createUser($email, $user, $password, $password1)
	{
		include("SQLQuery.php");

		$email = htmlspecialchars($email);
		$user = htmlspecialchars($user);
		$password = hash('sha256', htmlspecialchars($password));
		$password1 = hash('sha256', htmlspecialchars($password1));

		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			if($password == $password1)
			{
				$idUser = queryExecuteWith3Value($queryInsertUser, ":nomUser", $user, ":mailUser", $email, ":passwordUser", $password, true);
				return queryFetchWith1Value($queryGetUserByIdUser, ":idUser", $idUser);
			}
		}

		return false;
	}

	function searchIfFavoris($arrayFavoris, $value)
	{
		$favoris = false;

		for ($i=0; $i < sizeof($arrayFavoris); $i++)
		{
			if ($value == $arrayFavoris[$i]["idCve"])
			{
				$favoris = true;
			}
		}

		return $favoris;
	}

	function searchForExist($search, $type)
	{
		include("SQLQuery.php");

		if ($type == "cve")
		{
				if (getNbCVE("", "", "", $search)[0]["Nb"] != 0)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		else if ($type == "editeur")
		{
			if (queryFetchWith1Value($queryGetNbEditeurByName, ":nomEditeur", '%'.$search.'%', $search)[0]["Nb"] != 0)
			{
					return true;
			}
			else
			{
				return false;
			}
		}
		else if ($type == "faille")
		{
			if (queryFetchWith1Value($queryGetNbFailleByName, ":nomFaille", '%'.$search.'%', $search)[0]["Nb"] != 0)
			{
					return true;
			}
			else
			{
					return false;
			}
		}
	}

	function searchFor($search, $type)
	{
		include("SQLQuery.php");

		if (isset($_SESSION['idUser']))
		{
			$idUser = $_SESSION['idUser'];
		}
		else
		{
			$idUser = "";
		}

		if ($type == "cve")
		{
				getListCVE("", "", "", "", $idUser, $search);
		}
		else if ($type == "editeur")
		{
			getListEditeur($search);
		}
		else if ($type == "faille")
		{
			getListFaille($search);
		}
	}
?>
