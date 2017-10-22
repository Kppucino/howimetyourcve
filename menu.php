<!DOCTYPE html>
<html lang="fr">
<head>
    <title>How I Met Your CVE</title>
    <meta name=viewport content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
  <link href="style/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="style/styles.css" rel="stylesheet" media="screen">

	<script src="jquery-1.12.4.js"></script>
  <script src="style/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<script src="multiselectScript.js"></script>

 	<?php
 		include("include/include.php");
 	?>

</head>
<header>
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Dérouler</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-sm-3 col-md-3">
          <form class="navbar-form" role="search">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="q">
              <div class="input-group-btn">
                  <button class="btn btn-default searchIcon" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          </form>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">CVE</a></li>
        <li><a href="presentation.php">Présentation</a></li>
        <li><a href="#">Sources</a></li>
        <li><a href="#">Connexion</a></li>
      </ul>
    </div>
  </nav>
</header>
