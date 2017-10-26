<!DOCTYPE html>
<html lang="fr">
<head>
    <title>How I Met Your CVE</title>
    <meta name=viewport content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
  <link href="style/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="style/styles.css" rel="stylesheet" media="screen">
  <link rel="icon" href="images/logo/favicon.ico">

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
      <a class="navbar-brand" href="index.php"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-sm-3 col-md-3">
          <form class="navbar-form" role="search" method="post" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <div class="input-group-btn">
                  <button class="btn btn-default searchIcon" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          </form>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">CVE</a></li>
        <li><a href="presentation.php">Présentation</a></li>
        <li><a  href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Connexion</a></li>
      </ul>
    </div>
  </nav>
</header>

<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Connexion</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Créer un compte</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" method="post" action="login.php?action=connexion">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="userid">Identifiant:</label>
              <div class="controls">
                <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="Captain Crunch" class="input-medium" required="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="passwordinput">Mot de passe:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-success">Se connecter</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" method="post" action="login.php?action=inscription">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="Email" class="form-control" type="text" placeholder="c0mrade@nasa.com" class="input-large" required="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="userid">Identifiant:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="c0mrade" class="input-large" required="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Mot de passe:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-saisir mot de passe:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">S'inscrire</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </center>
      </div>
    </div>
  </div>
</div>
