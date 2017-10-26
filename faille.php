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

          if (isset($_SESSION['idUser']))
					{
						$commentaire = queryFetchWith2Value($queryGetCommentaireFailleUser, ":idUser", $_SESSION['idUser'], ":idFaille", $faille[0]["idFaille"]);

						echo '<div class="descriptionCve row">';
						echo '<h3>Commentaire : </h3>';

						if(!empty($commentaire))
						{
		          echo '<textarea class="col-md-10 commentaire">'.$commentaire[0]["commentaire"].'</textarea>';
						}
						else
						{
							echo '<textarea class="col-md-10 commentaire"></textarea>';
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
