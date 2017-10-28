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
              echo '<div class="presentation col-md-offset-1 col-md-9">';
          }
          else
          {
            echo '<div class="presentation col-md-offset-1 col-md-11">';
          }

          echo '<div class="row">';
					echo '<h1 class="col-md-11">'.$faille[0]["nomFaille"].'</h1>';

					if (isset($_SESSION['niveauUser']) && $_SESSION['niveauUser'] == "administrateur")
					{
						echo '<button type="button" class="btn btn-default btn-circle col-md-1" data-toggle="modal" data-target="#modalModif"><i class="glyphicon glyphicon-repeat"></i></button>';
					}

          echo '</div>';

          if (isset($faille[0]["nomType"]))
					{
              echo '<div class="row">';
						  echo '<h3 class="col-md-2 editeur">'.$faille[0]["nomType"].'</h3>';
              echo '</div>';
					}

          if (isset($faille[0]["descriptionFaille"]))
					{
						echo '<div class="descriptionCve row">';
	          echo '<h3 class="titleDescription">Description : </h3>';
            echo '<p class="col-md-10 contenuDesc">'.$faille[0]["descriptionFaille"].'</p>';
            echo '</div>';
					}

          if (isset($_SESSION['idUser']))
					{
						$commentaire = queryFetchWith2Value($queryGetCommentaireFailleUser, ":idUser", $_SESSION['idUser'], ":idFaille", $faille[0]["idFaille"]);

						echo '<div class="descriptionCve row">';
						echo '<h3 class="titleDescription">Commentaire : </h3>';

						if(!empty($commentaire))
						{
		          echo '<textarea class="col-md-10 commentaire contenuDesc">'.$commentaire[0]["commentaire"].'</textarea>';
						}
						else
						{
							echo '<textarea class="col-md-10 commentaire contenuDesc"></textarea>';
						}

						 echo '</div>';
					}
        }
      }
			include("footer.php");

			if (isset($_SESSION['niveauUser']) && $_SESSION['niveauUser'] == "administrateur")
			{
				echo '<div class="modal fade" id="modalModif" role="dialog">';
        echo '<div class="modal-dialog modal-lg">';
        echo '<div class="modal-content">';
				echo '<div class="modal-header">';
				echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
				echo '<h1 class="modal-title">Modification</h1>';
				echo '</div>';
				echo '<div class="modal-body col-md-offset-1 row">';
				echo '<form class="form-horizontal" method="post" action="modif.php?idFaille='.$faille[0]["idFaille"].'">';
				echo '<div class="row">';
				echo '<h3>Nom :</h3><input name="nomFaille" value="'.$faille[0]["nomFaille"].'" required></input>';
				echo '</div>';
				echo '<div class="row">';
				echo '<h3>Type :</h3>';
				$listTypeFaille = queryFetchWithoutValue($queryAllTypeFaille);

				echo '<div class="col-md-5">';
				echo '<select name="idType" id="listStatus" class="multiselect-ui form-control" required>';

				for ($i=0; $i < sizeof($listTypeFaille); $i++)
				{
					if (isset($faille[0]["idType"]) && $faille[0]["idType"] == $listTypeFaille[$i]["idType"])
					{
						echo '<option value="'.$listTypeFaille[$i]["idType"].'" selected>'.$listTypeFaille[$i]["nomType"].'</option>';
					}
					else
					{
						echo '<option value="'.$listTypeFaille[$i]["idType"].'">'.$listTypeFaille[$i]["nomType"].'</option>';
					}
				}

				echo '</select>';
				echo '</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<h3>Description : </h3>';

				if (isset($faille[0]["descriptionFaille"]))
				{
					echo '<textarea class="col-md-10" name="descriptionFaille">'.$faille[0]["descriptionFaille"].'</textarea>';
				}
				else
				{
					echo '<textarea class="col-md-10" name="descriptionFaille">'.$faille[0]["descriptionFaille"].'</textarea>';
				}
				echo '</div>';
				echo '</div>';
				echo '<div class="modal-footer">';
				echo '<button type="submit" class="btn btn-default">Valider</button>';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>';
				echo '</div>';
				echo '</form>';
				echo '</div>';
				echo '</div>';
        echo '</div>';
			}
		?>
    <script>
			$('.commentaire').keyup(function()
			{
			    delay(function(){
						$.ajax({
								url: "ajax.php",
								type : 'POST',
								data : {'commentaireUser':$('.commentaire').val(), 'idFailleCommentaire': <?php echo $_GET["idFaille"]; ?>},

								success : function(result)
								{
								}
							});
			    }, 1000 );
			});

			var delay = (function(){
			  var timer = 0;
			  return function(callback, ms){
			    clearTimeout (timer);
			    timer = setTimeout(callback, ms);
			  };
			})();
		</script>
</body>
</html>
