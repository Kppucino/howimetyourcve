<?php
include_once ('faille.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe Faille</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 5;
$unNom = "TestFaille";
$uneDescription = "Ceci est test";
$uneFaille = new Faille($unId, $unNom, $uneDescription);

echo ('<b>Récupération des valeurs de la faille dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $uneFaille->getIdFaille() . '<br>');
echo ('$Nom : ' . $uneFaille->getNomFaille() . '<br>');
echo ('$Description : ' . $uneFaille->getDescriptionFaille() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la faille (test de "set") <br></b>');
$uneFaille->setIdFaille(7);
$uneFaille->setNomFaille("TestFailleChangement");
$uneFaille->setDescriptionFaille("Ceci est test de Changement");

echo ('$id : ' . $uneFaille->getIdFaille() . '<br>');
echo ('$Nom : ' . $uneFaille->getNomFaille() . '<br>');
echo ('$Description : ' . $uneFaille->getDescriptionFaille() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur de la faille (test de "toString") <br></b>');
// test de la méthode toString
echo ($uneFaille->toString());
?>

</body>
</html>
