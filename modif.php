<?php
  include("include/include.php");
  include("include/redirect.php");

  if (isset($_GET['idFaille']))
  {
    if (isset($_POST["descriptionFaille"]))
    {
      $descriptionFaille = $_POST["descriptionFaille"];
    }
    else
    {
      $descriptionFaille = "";
    }

    queryExecuteWith4Value($queryUpdateFaille, ":nomFaille", $_POST["nomFaille"], ":idType", $_POST["idType"], ":descriptionFaille", $_POST["descriptionFaille"], ":idFaille", $_GET['idFaille'], false);

    redirect('faille.php?idFaille='.$_GET['idFaille']);
  }
  else if (isset($_GET['idEditeur']))
  {
    if (isset($_POST["descriptionEditeur"]))
    {
      $descriptionEditeur = $_POST["descriptionEditeur"];
    }
    else
    {
      $descriptionEditeur = "";
    }

    if (file_exists($_FILES['logoEditeur']['tmp_name']) || is_uploaded_file($_FILES['logoEditeur']['name']))
		{
			$extension = pathinfo($_FILES['logoEditeur']['name'], PATHINFO_EXTENSION);
			$nomFichier = wd_remove_accents($_POST["nomEditeur"]).".".$extension;
			$nomFichier = str_replace(' ','-',$nomFichier);
			$fichier = rename($_FILES['logoEditeur']['tmp_name'], "images/logoEditeur/".$nomFichier);

      queryExecuteWith4Value($queryUpdateEditeurWithPhoto, ":nomEditeur", $_POST["nomEditeur"], ":descriptionEditeur", $_POST["descriptionEditeur"], ":logoEditeur", $nomFichier, ":idEditeur", $_GET['idEditeur'], false);
  	}
    else
    {
      queryExecuteWith3Value($queryUpdateEditeurWithoutPhoto, ":nomEditeur", $_POST["nomEditeur"], ":descriptionEditeur", $_POST["descriptionEditeur"], ":idEditeur", $_GET['idEditeur'], false);
    }

    redirect('editeur.php?idEditeur='.$_GET['idEditeur']);
  }
?>
