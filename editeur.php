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
              echo '<div class="presentation col-md-offset-1 col-md-9">';
          }
          else
          {
            echo '<div class="presentation col-md-offset-1 col-md-11">';
          }

          echo '<div class="row">';
          echo '<h1 class="col-md-11">'.$editeur[0]["nomEditeur"].'</h1>';

          if (isset($editeur[0]["logoEditeur"]))
					{
							echo '<img class="col-md-1 img-responsive" src="images/logoEditeur/'.$editeur[0]["logoEditeur"].'" class="media-photo"></img>';
							echo '</a>';
					}

          echo '</div>';

          if (isset($editeur[0]["descriptionEditeur"]))
					{
						echo '<div class="descriptionCve row">';
	          echo '<h3 class="titleDescription">Description : </h3>';
	          echo '<p class="col-md-10 contenuDesc">'.$editeur[0]["descriptionEditeur"].'</p>';
	          echo '</div>';
					}

          if (isset($_SESSION['idUser']))
					{
						$commentaire = queryFetchWith2Value($queryGetCommentaireEditeurUser, ":idUser", $_SESSION['idUser'], ":idEditeur", $editeur[0]["idEditeur"]);

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
		?>
    <script>
			$('.commentaire').keyup(function()
			{
			    delay(function(){
						$.ajax({
								url: "ajax.php",
								type : 'POST',
								data : {'commentaireUser':$('.commentaire').val(), 'idEditeurCommentaire': <?php echo $_GET["idEditeur"]; ?>},

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
