<html>
<head>
	<?php
      include ("menu.php");
  ?>
</head>
<body>
  <?php
      if (isset($_GET["idProduit"]))
      {
        if (is_int(intval($_GET["idProduit"])))
        {
          $produit = queryFetchWith1Value($queryGetProduitById, ":idProduit", $_GET["idProduit"]);

          echo '<div class="container-fluid">';
          $nbCVE = queryFetchWith1Value($queryGetNbCveForProduit, ":idProduit", $_GET["idProduit"]);
  				$moyenneCVE = queryFetchWith1Value($queryGetAVGCveForProduit, ":idProduit", $_GET["idProduit"]);

          if (!empty($nbCVE) || !empty($moyenneCVE))
          {
            echo '<div class="col-md-2 statPanel">';
            echo '<h2>Statistiques :</h2>';
            createStatCVE($nbCVE, "", "", $moyenneCVE);
            echo '</div>';
          }

          if (!empty($nbCVE) || !empty($moyenneCVE))
          {
              echo '<div class="presentation col-md-offset-1 col-md-9">';
          }
          else
          {
            echo '<div class="presentation col-md-offset-1 col-md-11">';
          }

          echo '<div class="row">';
					echo '<h1 class="col-md-11">'.$produit[0]["nomProduit"].'</h1>';

					if (isset($_SESSION['niveauUser']) && $_SESSION['niveauUser'] == "administrateur")
					{
						echo '<button type="button" class="btn btn-default btn-circle col-md-1" data-toggle="modal" data-target="#modalModif"><i class="glyphicon glyphicon-repeat"></i></button>';
					}

          echo '</div>';
          echo '<div class="row">';
				  echo '<h3 class="col-md-2 editeur">'.$produit[0]["nomEditeur"].'</h3>';
          echo '</div>';

          if (isset($produit[0]["descriptionProduit"]))
					{
						echo '<div class="descriptionCve row">';
	          echo '<h3 class="titleDescription">Description : </h3>';
            echo '<p class="col-md-10 contenuDesc">'.$produit[0]["descriptionProduit"].'</p>';
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
				echo '<form class="form-horizontal" method="post" action="modif.php?idProduit='.$produit[0]["idProduit"].'">';
				echo '<div class="row">';
				echo '<h3>Nom :</h3><input name="nomProduit" value="'.$produit[0]["nomProduit"].'" required></input>';
				echo '</div>';
				echo '<div class="row">';
				echo '<h3>Description : </h3>';

				if (isset($produit[0]["descriptionProduit"]))
				{
					echo '<textarea class="col-md-10" name="descriptionProduit">'.$produit[0]["descriptionProduit"].'</textarea>';
				}
				else
				{
					echo '<textarea class="col-md-10" name="descriptionProduit"></textarea>';
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
