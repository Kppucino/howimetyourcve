<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Phonograph</title>
    <meta name=viewport content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<link href="style/bootstrap 3/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="style/css.css" rel="stylesheet" media="screen">

	<script src="jquery-1.12.4.js"></script>
	<script src="style/bootstrap 3/js/bootstrap.min.js"></script>

	<link rel="apple-touch-icon" sizes="57x57" href="images/Logo/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/Logo/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/Logo/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/Logo/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/Logo/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/Logo/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/Logo/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/Logo/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/Logo/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="images/Logo/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/Logo/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/Logo/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/Logo/favicon-16x16.png">
	<link rel="manifest" href="images/Logo/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

 	<?php
 		include("fonctions.php");
 		include("SQLQuery.php");
 	?>
</head>
<header>
	<div class="navbar navbar-default navbar-tt navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-reorder"></i>
				</button>
				<a class="navbar-brand" class="linkMenu" href="index.php">
					<img alt="Brand" src="images/Logo/MyPhonograph.png" width="40" height="40">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-ex-collapse">
				<div>
					<ul class="nav navbar-nav nav-tt navbar-right navbar-uppr">
						<li>
							<a class="linkMenu" href="morceaux.php">Morceaux</a>
						</li>
						<li>
							<a class="linkMenu" href="artistes.php">Artistes</a>
						</li>
						<li>
							<a class="linkMenu" href="albums.php">Albums</a>
						</li>
						<li>
							<a class="linkMenu" href="playlist.php">Playlist</a>
						</li>
						<li>
					        <form class="navbar-form" role="search" method="post" action="search.php">
						        <div class="input-group">
						            <input type="text" class="form-control" placeholder="Rechercher" name="searchFor">
						            <div class="input-group-btn">
						                <button class="btn btn-default btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						            </div>
						        </div>
					        </form>
					    </li>
					    <li>
							<a href="addTune.php"><button type="button" class="btn btn-default btn-circle addTunePlus" id="addTune"><i class="glyphicon glyphicon-plus"></i></button></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
	<div class="modal fade" id="modalDeleteTag" role="dialog">
    	<div class="modal-dialog modal-lg">
        	<div class="modal-content">
        	</div>
        </div>
    </div>
<script>
	$(document).on("dblclick", '.label', function()
    {
    	$.ajax({
            url: "ajax.php",
            type : 'POST',
            data : "idTagForModal=" + $(this).closest('.label').find('input[name=idTag]').val(),

            success : function(result)
            {
            	$(".modal-content").html(result);
            	$('#modalDeleteTag').modal({show:true});
            }
        });
    });

    $(document).on('click', '.submitDeleteTag', function()
    {
        $.ajax({
            url: "ajax.php",
            type : 'POST',
            data : "deleteTag=" + $(this).closest('.modal-body').find('input[name=idTagToDelete]').val(),

            success : function(result)
            {
            	$('#modalDeleteTag').modal('hide');
            	location.reload();
            }
        });
    });
</script>
