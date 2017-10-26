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
          echo '<h3 class="col-md-12">CVE</h3>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-cve">';

          searchFor($search, "cve");

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
          echo '<h3 class="col-md-12">Editeur</h3>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-editeur">';

          searchFor($search, "editeur");

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
          echo '<h3 class="col-md-12">Faille</h3>';
          echo '</div>';
          echo '<div class="table-container">';
          echo '<table class="table table-filter table-faille">';

          searchFor($search, "faille");

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
<script>
$(document).on('click', '.star', function()
{
  $.ajax({
      url: "ajax.php",
      type : 'POST',
      data : "favoris=" + $(this).closest('.star').find('input[name="favoris"]').val() + "&idCve=" + $(this).closest('.star').find('input[name="idCve"]').val(),
      context: this,

      success : function()
      {
        if ($(this).closest('.star').find('input[name="favoris"]').val() == 1)
        {
          $(this).removeClass('favoris');
        }
        else
        {
          $(this).addClass('favoris');
        }
      }
  });
});
</script>
</body>
</html>
