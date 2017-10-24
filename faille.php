<html>
<head>
	<?php
      include ("menu.php");
  ?>
</head>
<body>
  <?php
      if (isset($_GET["idFaille"]))
      {
        if (is_int(intval($_GET["idFaille"])))
        {
          $faille = queryFetchWith1Value($queryGetFailleAndTypeById, ":idFaille", $_GET["idFaille"]);

          echo '<div class="container-fluid">';

          $nbCVE = queryFetchWith1Value($queryGetNbAllCVEWithSomeFaille, ":arrayIdFaille", $_GET["idFaille"]);
  				$topEditeurCVE = queryFetchWith1Value($queryGetTopEditeurAllCVEWithFaille, ":arrayIdFaille", $_GET["idFaille"]);
  				$moyenneCVE = queryFetchWith1Value($queryGetAVGAllCVEWithSomeFaille, ":arrayIdFaille", $_GET["idFaille"]);

          if (!empty($nbCVE) || !empty($topEditeurCVE) || !empty($moyenneCVE))
          {
            echo '<div class="col-md-2 statPanel">';
            echo '<h2>Statistiques :</h2>';
            createStatCVE($nbCVE, "", $topEditeurCVE, $moyenneCVE);
            echo '</div>';
          }

          if (!empty($nbCVE) || !empty($topEditeurCVE) || !empty($moyenneCVE))
          {
              echo '<div class="col-md-10">';
          }
          else
          {
            echo '<div class="col-md-12">';
          }

          echo '<div class="row">';
          echo '<h1>'.$faille[0]["nomFaille"].'</h1>';
          echo '</div>';

          if (isset($faille[0]["nomType"]))
					{
              echo '<div class="row">';
						  echo '<h3>'.$faille[0]["nomType"].'</h3>';
              echo '</div>';
					}

          if (isset($faille[0]["descriptionFaille"]))
					{
            echo '<div class="descriptionCve">';
            echo '<h3>Description : </h3>';
            echo '<p>'.$faille[0]["descriptionFaille"].'</p>';
            echo '</div>';
					}

          //PARTIE COMMENTAIRE USER
        }
      }
			include("footer.php");
		?>
</body>
</html>
