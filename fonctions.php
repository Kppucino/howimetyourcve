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
?>
