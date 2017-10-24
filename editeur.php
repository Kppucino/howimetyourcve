<html>
<head>
	<?php
      include ("menu.php");
  ?>
</head>
<body>
  <?php
      if (isset($_GET["idEditeur"]))
      {
        if (is_int(intval($_GET["idEditeur"])))
        {
          $editeur = queryFetchWith1Value($queryGetEditeurAndCVEByIdEditeur, ":idEditeur", $_GET["idEditeur"]);

          echo '<div class="container-fluid">';

          $nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithSomeEditor, ":arrayIdEditeur", $_GET["idEditeur"]);
  				$topFailleCVE = queryFetchWith1Value($queryGetTopFailleAllCVEWithEditor, ":arrayIdEditeur", $_GET["idEditeur"]);
  				$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithSomeEditor, ":arrayIdEditeur", $_GET["idEditeur"]);

          if (!empty($nbCVE) || !empty($topFailleCVE) || !empty($moyenneCVE))
          {
            echo '<div class="col-md-2 statPanel">';
            echo '<h2>Statistiques :</h2>';
            createStatCVE($nbCVE, $topFailleCVE, "", $moyenneCVE);
            echo '</div>';
          }

          if (!empty($nbCVE) || !empty($topFailleCVE) || !empty($moyenneCVE))
          {
              echo '<div class="col-md-10">';
          }
          else
          {
            echo '<div class="col-md-12">';
          }

          echo '<div class="row">';
          echo '<h1 class="col-md-2">'.$editeur[0]["nomEditeur"].'</h1>';

          if (isset($editeur[0]["logoEditeur"]))
					{
							echo '<img class="col-md-offset-9 col-md-1 img-responsive" src="images/logoEditeur/'.$editeur[0]["logoEditeur"].'" class="media-photo"></img>';
							echo '</a>';
					}

          echo '</div>';

          if (isset($editeur[0]["descriptionEditeur"]))
					{
            echo '<div class="descriptionCve">';
            echo '<h3>Description : </h3>';
            echo '<p>'.$editeur[0]["descriptionEditeur"].'</p>';
            echo '</div>';
					}

          //PARTIE COMMENTAIRE USER
        }
      }
			include("footer.php");
		?>
</body>
</html>
