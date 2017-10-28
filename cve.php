<html>
<head>
	<?php
      include ("menu.php");
  ?>
</head>
<body>
  <?php
      if (isset($_GET["idCVE"]))
      {
        if (is_int(intval($_GET["idCVE"])))
        {
          $cve = queryFetchWith1Value($queryGetCVEByIdCve, ":idCve", $_GET["idCVE"]);
          $reference = queryFetchWith1Value($queryGetReferenceCVEByIdCVE, ":idCve", $_GET["idCVE"]);
          $faille = queryFetchWith1Value($queryGetFailleCVEByIdCVE, ":idCve", $_GET["idCVE"]);

          echo '<div class="container-fluid">';

          if (printInfoCVE($cve) == true || !empty($faille))
          {
            echo '<div class="col-md-2 statPanel">';

            if (printInfoCVE($cve))
            {
                echo '<h2>Informations :</h2>';

                if (isset($cve[0]["severiteCve"]))
                {
                    echo '<h4>'.number_format($cve[0]["severiteCve"], 2).'</h4>';
                }

                if (isset($cve[0]["severiteCve"]))
                {
                    echo '<h4>'.number_format($cve[0]["noteBaseCve"], 2).'</h4>';
                }

                if (isset($cve[0]["noteImpactCve"]))
                {
                    echo '<h4>'.number_format($cve[0]["noteImpactCve"], 2).'</h4>';
                }

                if (isset($cve[0]["noteExploitabiliteCve"]))
                {
                    echo '<h4>'.number_format($cve[0]["noteExploitabiliteCve"], 2).'</h4>';
                }

                if (isset($cve[0]["accesComplexiteCve"]))
                {
                    echo '<h4>'.$cve[0]["accesComplexiteCve"].'</h4>';
                }

                if (isset($cve[0]["adminAccesCve"]) || isset($cve[0]["userAccesCve"]))
                {
                    echo '<h3>Droit</h3>';

                    if (isset($cve[0]["adminAccesCve"]) && isset($cve[0]["userAccesCve"]))
                    {
                      if ($cve[0]["adminAccesCve"] == 1 && $cve[0]["userAccesCve"] == 1)
                      {
                          echo '<li>Administration</li>';
                          echo '<li>Utilisateur</li>';
                      }
                      else if (isset($cve[0]["adminAccesCve"]))
                      {
                        echo '<li>Administration</li>';
                      }
                      else if (isset($cve[0]["userAccesCve"]))
                      {
                        echo '<li>Utilisateur</li>';
                      }
                    }
                }

                if (isset($cve[0]["userInteractionRequiredCve"]))
                {
                    if ($cve[0]["userInteractionRequiredCve"] == 0)
                    {
                      echo '<h4>Interaction utilisateur non nécessaire</h4>';
                    }
                    else
                    {
                      echo '<h4>Interaction utilisateur nécessaire</h4>';
                    }

                }

                if (isset($cve[0]["authentificationImpactCve"]) || isset($cve[0]["confidentialiteImpactCve"]) || isset($cve[0]["integriteImpactCve"]) || isset($cve[0]["disponibiliteImpactCve"]))
                {
                    echo '<h3>Impact sur</h3>';

                    if (isset($cve[0]["authentificationImpactCve"]))
                    {
                        echo '<li>Authentification ('.$cve[0]["authentificationImpactCve"].')</li>';
                    }

                    if (isset($cve[0]["confidentialiteImpactCve"]))
                    {
                        echo '<li>Confidentialite ('.$cve[0]["confidentialiteImpactCve"].')</li>';
                    }

                    if (isset($cve[0]["integriteImpactCve"]))
                    {
                        echo '<li>Integrite ('.$cve[0]["integriteImpactCve"].')</li>';
                    }

                    if (isset($cve[0]["disponibiliteImpactCve"]))
                    {
                        echo '<li>Disponibilite ('.$cve[0]["disponibiliteImpactCve"].')</li>';
                    }
                  }
              }

              if (!empty($faille))
              {
                echo '<h2>Faille :</h2>';

                $compteurCSS = 0;

                for ($i=0; $i < sizeof($faille); $i++)
    						{
    							if ($compteurCSS == 0)
    	            {
    	                echo '<div class="row">';
    	            }

    							echo '<a href="faille.php?idFaille='.$faille[$i]["idFaille"].'"><button type="button" class="btn btn-default btn-sm">'.$faille[$i]["nomFaille"].'</button></a>';

    							$compteurCSS ++;

    	            if ($compteurCSS == 4 || $i + 1 == sizeof($faille))
    	            {
    	                echo '</div>';
    	                $compteurCSS = 0;
    	            }
    						}
              }

              echo '</div>';
          }

          if (printInfoCVE($cve) == true || !empty($faille))
          {
              echo '<div class="presentation col-md-offset-1 col-md-9">';
          }
          else
          {
            echo '<div class="presentation col-md-offset-1 col-md-11">';
          }

					echo '<div class="row">';
					echo '<h1 class="col-md-9 titre">'.$cve[0]["nomCve"].'</h1>';

					if ($cve[0]["statusCve"] == 1)
					{
							echo '<h4 class="col-md-3 date">'.formaterDate($cve[0]["dateCve"]).' - Ouverte</h4>';
					}
					else
					{
						echo '<h4 class="col-md-3 date">'.formaterDate($cve[0]["dateCve"]).' - Fermée</h4>';
					}

          echo '</div>';
          echo '<div class="row">';
          echo '<h3 class="col-md-2 editeur"><a href="editeur.php?idEditeur='.$cve[0]["idEditeur"].'">'.$cve[0]["nomEditeur"].'</a></h3>';
          echo '</div>';

          echo '<div class="descriptionCve row">';
          echo '<h3 class="titleDescription">Description : </h3>';
          echo '<p class="col-md-10 contenuDesc">'.$cve[0]["descriptionCve"].'</p>';
          echo '</div>';

          if (isset($_SESSION['idUser']))
					{
						$commentaire = queryFetchWith2Value($queryGetCommentaireCveUser, ":idUser", $_SESSION['idUser'], ":idCve", $cve[0]["idCve"]);

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

          if (!empty($reference))
          {
            echo '<div class="descriptionCve reference row">';
            echo '<h3 class="titleDescription">Reference : </h3>';

            for ($i=0; $i < sizeof($reference); $i++)
            {
                echo '<li><a target="_blank" href="'.$reference[$i]["urlReference"].'">'.$reference[$i]["urlReference"].'</a></li>';
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
								data : {'commentaireUser':$('.commentaire').val(), 'idCveCommentaire': <?php echo $_GET["idCVE"]; ?>},

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
