<?php
include_once ('editeurUser.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Editeur User</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unEditeurUser = new editeurCVE(8, 4, 1, "Test Commentaire");

echo ('<b>Récupération des valeurs de la CVE dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $unEditeurUser->getIdEditeurUser() . '<br>');
echo ('$Nom : ' . $unEditeurUser->getIdUserEditeur() . '<br>');
echo ('$Favoris : ' . $unEditeurUser->getFavorisUserEditeur() . '<br>');
echo ('$Commentaire : ' . $unEditeurUser->getCommentaireUserEditeur() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la CVE (test de "set") <br></b>');
$unEditeurUser->setIdEditeurUser(7);
$unEditeurUser->setIdUserEditeur(9);
$unEditeurUser->setFavorisUserEditeur(0);
$unEditeurUser->setCommentaireUserEditeur("Fermé");

echo ('$id : ' . $unEditeurUser->getIdEditeurUser() . '<br>');
echo ('$Nom : ' . $unEditeurUser->getIdUserEditeur() . '<br>');
echo ('$Favoris : ' . $unEditeurUser->getFavorisUserEditeur() . '<br>');
echo ('$Commentaire : ' . $unEditeurUser->getCommentaireUserEditeur() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur la CVE (test de "toString") <br></b>');
// test de la méthode toString
echo ($unEditeurUser->toString());
?>

</body>
</html>
