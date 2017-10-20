<?php
include_once ('cveuser.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe CVE User</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unCVEUser = new CVEUser(8, 4, 1, "Test Commentaire");

echo ('<b>Récupération des valeurs de la CVE dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $unCVEUser->getIdCVEUser() . '<br>');
echo ('$Nom : ' . $unCVEUser->getIdUserCVE() . '<br>');
echo ('$Favoris : ' . $unCVEUser->getFavorisCVEUser() . '<br>');
echo ('$Commentaire : ' . $unCVEUser->getCommentaireCVEUser() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la CVE (test de "set") <br></b>');
$unCVEUser->setIdCVEUser(7);
$unCVEUser->setIdUSerCVE(9);
$unCVEUser->setFavorisCVEUser(0);
$unCVEUser->setCommentaireCVEUser("Fermé");

echo ('$id : ' . $unCVEUser->getIdCVEUser() . '<br>');
echo ('$Nom : ' . $unCVEUser->getIdUserCVE() . '<br>');
echo ('$Favoris : ' . $unCVEUser->getFavorisCVEUser() . '<br>');
echo ('$Commentaire : ' . $unCVEUser->getCommentaireCVEUser() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur la CVE (test de "toString") <br></b>');
// test de la méthode toString
echo ($unCVEUser->toString());
?>

</body>
</html>
