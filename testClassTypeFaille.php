<?php
include_once ('typeFaille.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe typeFaille</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 5;
$unNom = "TestTypeFaille";
$unTypeFaille = new typeFaille($unId, $unNom);

echo ('<b>Récupération des valeurs de la type faille dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $unTypeFaille->getIdTypeFaille() . '<br>');
echo ('$Nom : ' . $unTypeFaille->getNomTypeFaille() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la faille (test de "set") <br></b>');
$unTypeFaille->setIdTypeFaille(7);
$unTypeFaille->setNomTypeFaille("TestFailleChangement");

echo ('$id : ' . $unTypeFaille->getIdTypeFaille() . '<br>');
echo ('$Nom : ' . $unTypeFaille->getNomTypeFaille() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur de la faille (test de "toString") <br></b>');
// test de la méthode toString
echo ($unTypeFaille->toString());
?>

</body>
</html>
