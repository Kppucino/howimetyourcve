<?php
 	include("SQLQuery.php");
  include("fonctions.php");

    if (isset($_POST["idArtiste"]))
    {
        $artiste = queryFetchWith1Value($queryGetArtistById, ":idArtiste", $_POST["idArtiste"]);
        $album = queryFetchWith1Value($queryGetAlbumArtist, ":idArtiste", $_POST["idArtiste"]);

        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        echo '<h1 class="modal-title">'.$artiste[0]["nomArtiste"].'</h1>';
        echo '</div>';

        echo '<div class="modal-body row">';
        echo '<div class="col-sm-5">';

        $photo = queryFetchWith1Value($queryGetPhotoArtist, ":idArtiste", $artiste[0]["idArtiste"]);

        if (!empty($photo[0]["nomPhoto"]))
        {
            echo '<div class="photo">';
            echo '<img src="images/Artistes/'.$photo[0]["nomPhoto"].'" class="img-responsive modal-Img-Product" alt=""/>';
            echo '</div>';
        }
        else
        {
            echo '<div class="photo">';
            echo '<img src="images/Logo/MyPhonograph.png" height="300" width="290" alt="">';
            echo '</div>';
        }

        echo '</div>';
        echo '<div class="col-sm-7">';
        echo '<h3>'.$artiste[0]["nomArtiste"].'</h3>';

        if (!empty($artiste[0]["anneeNaissanceArtiste"]) AND !empty($artiste[0]["anneeDecesArtiste"]))
        {
            echo '<p>'.$artiste[0]["anneeNaissanceArtiste"].' - '.$artiste[0]["anneeDecesArtiste"].'</p>';
        }
        else if(!empty($artiste[0]["anneeNaissanceArtiste"]) AND empty($artiste[0]["anneeDecesArtiste"]))
        {
            echo '<p>'.$artiste[0]["anneeNaissanceArtiste"].'</p>';
        }

        if (!empty($artiste[0]["bioArtiste"]))
        {
            echo '<p class="encart-description"><I>Biographie :</I><br/>&nbsp;'.$artiste[0]["bioArtiste"].'</p>';
        }
    }
?>
