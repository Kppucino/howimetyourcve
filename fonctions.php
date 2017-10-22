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

	function queryExecuteWithoutValue($query, $lastInsertId)
	{
		include("include/_inc_parametres.php");
		include("include/_inc_connexion.php");

		$query->execute();

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
	    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
	    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

	    return $str;
	}

	function getListCVE($editeur, $faille, $status)
	{
			include("SQLQuery.php");

			if (empty($editeur) && empty($faille) && empty($status))
			{
				$listCVE = queryFetchWithoutValue($queryGetAllCVEWithEditor);
			}
			else if (!empty($editeur) && empty($faille) && empty($status))
			{
				$listCVE = queryFetchWith1ArrayValue($queryGetAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
			}
			else if (empty($editeur) && !empty($faille) && empty($status))
			{
				$listCVE = queryFetchWith1ArrayValue($queryGetAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
			}
			else if (empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$listCVE = queryFetchWithoutValue($queryGetAllCVEWithEditor);
				}
				else if ($status == "open")
				{
					$listCVE = queryFetchWith1Value($queryGetAllCVEWithStatus, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$listCVE = queryFetchWith1Value($queryGetAllCVEWithStatus, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && empty($status))
			{
				$listCVE = queryFetchWith1ArrayValue($queryGetAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
			}
			else if (!empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$listCVE = queryFetchWith1ArrayValue($queryGetAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
				}
				else if ($status == "open")
				{
					$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
				}
			}
			else if (empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$listCVE = queryFetchWith1ArrayValue($queryGetAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$listCVE = queryFetchWith1ArrayAnd1Value($queryGetAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $editeur, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$listCVE = queryFetchWith2ArrayValue($queryGetAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$listCVE = queryFetchWith2ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$listCVE = queryFetchWith2ArrayAnd1Value($queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 0);
				}
			}

			createListCVE($listCVE);
	}

	function createListCVE($listCVE)
	{
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
							echo '<img src="images/logoEditeur/'.$listCVE[$i]["logoEditeur"].'" class="media-photo">';
							echo '</a>';
					}

					echo '<div class="media-body">';
					echo '<a href="cve.php?idCVE='.$listCVE[$i]["idCve"].'">';
					echo '<span class="media-meta pull-right">'.$listCVE[$i]["dateCve"].'</span>';
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
					echo '<a href="javascript:;" class="star">';
					echo '<i class="glyphicon glyphicon-star"></i>';
					echo '</a>';
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
				$nbCVE = queryFetchWithoutValue($queryGetNbAllCVEWithEditor);
				$topFailleCVE = queryFetchWithoutValue($queryGetTopFailleAllCVE);
				$topEditeurCVE = queryFetchWithoutValue($queryGetTopEditeurAllCVE);
				$moyenneCVE = queryFetchWithoutValue($queryGetAVGAllCVE);
			}
			else if (!empty($editeur) && empty($faille) && empty($status))
			{
				$nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
				$topFailleCVE = queryFetchWith1ArrayValue($queryGetTopFailleAllCVEWithEditor, ":arrayIdEditeur", $editeur);
				$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
			}
			else if (empty($editeur) && !empty($faille) && empty($status))
			{
				$nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
				$topEditeurCVE = queryFetchWith1ArrayValue($queryGetTopEditeurAllCVEWithFaille, ":arrayIdFaille", $faille);
				$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
			}
			else if (empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = queryFetchWithoutValue($queryGetNbAllCVEWithEditor);
					$topFailleCVE = queryFetchWithoutValue($queryGetTopFailleAllCVE);
					$topEditeurCVE = queryFetchWithoutValue($queryGetTopEditeurAllCVE);
					$moyenneCVE = queryFetchWithoutValue($queryGetAVGAllCVE);
				}
				else if ($status == "open")
				{
					$nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithStatus, ":statusCve", 1);
					$topFailleCVE = queryFetchWith1Value($queryGetTopFailleAllCVEWithStatus, ":statusCve", 1);
					$topEditeurCVE = queryFetchWith1Value($queryGetTopEditeurAllCVEWithStatus, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithStatus, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithStatus, ":statusCve", 0);
					$topFailleCVE = queryFetchWith1Value($queryGetTopFailleAllCVEWithStatus, ":statusCve", 0);
					$topEditeurCVE = queryFetchWith1Value($queryGetTopEditeurAllCVEWithStatus, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithStatus, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && empty($status))
			{
				$nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
				$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
			}
			else if (!empty($editeur) && empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
					$topFailleCVE = queryFetchWith1ArrayValue($queryGetTopFailleAllCVEWithEditor, ":arrayIdEditeur", $editeur);
					$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeEditor, ":arrayIdEditeur", $editeur);
				}
				else if ($status == "open")
				{
					$nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
					$topFailleCVE = queryFetchWith1ArrayAnd1Value($queryGetTopFailleAllCVEWithEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
					$topFailleCVE = queryFetchWith1ArrayAnd1Value($queryGetTopFailleAllCVEWithEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndStatus, ":arrayIdEditeur", $editeur, ":statusCve", 0);
				}
			}
			else if (empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = queryFetchWith1ArrayValue($queryGetNbAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
					$topEditeurCVE = queryFetchWith1ArrayValue($queryGetTopEditeurAllCVEWithFaille, ":arrayIdFaille", $faille);
					$moyenneCVE = queryFetchWith1ArrayValue($queryGetAVGAllCVEWithSomeFaille, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
					$topEditeurCVE = queryFetchWith1ArrayAnd1Value($queryGetTopEditeurAllCVEWithFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = queryFetchWith1ArrayAnd1Value($queryGetNbAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $editeur, ":statusCve", 0);
					$topEditeurCVE = queryFetchWith1ArrayAnd1Value($queryGetTopEditeurAllCVEWithFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 0);
					$moyenneCVE = queryFetchWith1ArrayAnd1Value($queryGetAVGAllCVEWithSomeFailleAndStatus, ":arrayIdFaille", $faille, ":statusCve", 0);
				}
			}
			else if (!empty($editeur) && !empty($faille) && !empty($status))
			{
				if ($status == "all")
				{
					$nbCVE = queryFetchWith2ArrayValue($queryGetNbAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
					$moyenneCVE = queryFetchWith2ArrayValue($queryGetAVGAllCVEWithSomeEditorAndSomeFaille, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $faille);
				}
				else if ($status == "open")
				{
					$nbCVE = queryFetchWith2ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 1);
					$moyenneCVE = queryFetchWith2ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 1);
				}
				else if ($status == "close")
				{
					$nbCVE = queryFetchWith2ArrayAnd1Value($queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 0);
					$moyenneCVE = queryFetchWith2ArrayAnd1Value($queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus, ":arrayIdEditeur", $editeur, ":arrayIdFaille", $editeur, ":statusCve", 0);
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
?>
