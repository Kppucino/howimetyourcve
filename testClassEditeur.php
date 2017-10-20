<?php
include_once ('editeur.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Editeur</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 5;
$unNom = "TestEditeur";
$uneDescription = "Ceci est test";
$unLogo = "/test/test.jpg";
$unEditeur = new editeur($unId, $unNom, $uneDescription, $unLogo);

echo ('<b>Récupération des valeurs de l\'éditeur dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $unEditeur->getIdEditeur() . '<br>');
echo ('$Nom : ' . $unEditeur->getNomEditeur() . '<br>');
echo ('$Description : ' . $unEditeur->getDescriptionEditeur() . '<br>');
echo ('$Logo : ' . $unEditeur->getLogoEditeur() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de l\'éditeur (test de "set") <br></b>');
$unEditeur->setIdEditeur(7);
$unEditeur->setNomEditeur("TestEditeurChangement");
$unEditeur->setDescriptionEditeur("Ceci est test de Changement");
$unEditeur->setLogoEditeur("/images/testChangement.jpg");

echo ('$id : ' . $unEditeur->getIdEditeur() . '<br>');
echo ('$Nom : ' . $unEditeur->getNomEditeur() . '<br>');
echo ('$Description : ' . $unEditeur->getDescriptionEditeur() . '<br>');
echo ('$Logo : ' . $unEditeur->getLogoEditeur() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur de l\'éditeur (test de "toString") <br></b>');
// test de la méthode toString
echo ($unEditeur->toString());
?>

</body>
</html>
