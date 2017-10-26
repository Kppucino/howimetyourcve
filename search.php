<html>
<head>
	<?php
        include ("menu.php");
  ?>
</head>
<body>
<div class="container-fluid">
  <?php
    if (isset($_POST["search"]))
    {
        $search = htmlspecialchars($_POST["search"]);

        if (searchForExist($search, "cve") == true)
        {
          echo '<div class="col-md-12">';
          echo '<div class="panel panel-default">';
          echo '<div class="panel-body">';
          echo '<div class="filtre row">';
          echo '<h3 class="col-md-11">CVE</h3>';
          echo '<div class="col-md-1">';
          echo '<input type="hidden" value="0" name="pageCve"></input>';
          echo '<button class="btn btn-default previous previous-cve"><i class="glyphicon glyphicon-chevron-left"></i></button>';
          echo '<button class="btn btn-default next next-cve"><i class="glyphicon glyphicon-chevron-right"></i></button>';
          echo '</div>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-cve">';

          searchFor($search, "cve", 0);

          echo '</table>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        if (searchForExist($search, "editeur") == true)
        {
          echo '<div class="col-md-12">';
          echo '<div class="panel panel-default">';
          echo '<div class="panel-body">';
          echo '<div class="filtre row">';
          echo '<h3 class="col-md-11">Editeur</h3>';
          echo '<div class="col-md-1">';
          echo '<input type="hidden" value="0" name="pageEditeur"></input>';
          echo '<button class="btn btn-default previous previous-editeur"><i class="glyphicon glyphicon-chevron-left"></i></button>';
          echo '<button class="btn btn-default next next-editeur"><i class="glyphicon glyphicon-chevron-right"></i></button>';
          echo '</div>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-editeur">';

          searchFor($search, "editeur", 0);

          echo '</table>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        if (searchForExist($search, "faille") == true)
        {
          echo '<div class="col-md-12">';
          echo '<div class="panel panel-default">';
          echo '<div class="panel-body">';
          echo '<div class="filtre row">';
          echo '<h3 class="col-md-11">Faille</h3>';
          echo '<div class="col-md-1">';
          echo '<input type="hidden" value="0" name="pageFaille"></input>';
          echo '<button class="btn btn-default previous previous-faille"><i class="glyphicon glyphicon-chevron-left"></i></button>';
          echo '<button class="btn btn-default next next-faille"><i class="glyphicon glyphicon-chevron-right"></i></button>';
          echo '</div>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-faille">';

          searchFor($search, "faille", 0);

          echo '</table>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      }

			include("footer.php");
		?>
</div>
</body>
</html>
