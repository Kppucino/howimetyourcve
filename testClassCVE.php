<?php
include_once ('cve.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe CVE</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 5;
$unNom = "TestCVE";
$uneDate = "1996-09-29";
$unStatus = "Ouvert";
$uneDescription = "Ceci est test";
$uneNote = 5;
$uneCVE = new CVE($unId, $unNom, $uneDate, $unStatus, $uneDescription, $uneNote);

echo ('<b>Récupération des valeurs de la CVE dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $uneCVE->getIdCVE() . '<br>');
echo ('$Nom : ' . $uneCVE->getNomCVE() . '<br>');
echo ('$Date : ' . $uneCVE->getDateCVE() . '<br>');
echo ('$Status : ' . $uneCVE->getStatusCVE() . '<br>');
echo ('$Description : ' . $uneCVE->getDescriptionCVE() . '<br>');
echo ('$Note : ' . $uneCVE->getNoteCVE() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la CVE (test de "set") <br></b>');
$uneCVE->setIdCVE(7);
$uneCVE->setNomCVE("TestCVEChangement");
$uneCVE->setDateCVE("2017-01-01");
$uneCVE->setStatusCVE("Fermé");
$uneCVE->setDescriptionCVE("Ceci est test de Changement");
$uneCVE->setNoteCVE(10);

echo ('$id : ' . $uneCVE->getIdCVE() . '<br>');
echo ('$Nom : ' . $uneCVE->getNomCVE() . '<br>');
echo ('$Date : ' . $uneCVE->getDateCVE() . '<br>');
echo ('$Status : ' . $uneCVE->getStatusCVE() . '<br>');
echo ('$Description : ' . $uneCVE->getDescriptionCVE() . '<br>');
echo ('$Note : ' . $uneCVE->getNoteCVE() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif sur la CVE (test de "toString") <br></b>');
// test de la méthode toString
echo ($uneCVE->toString());
?>

</body>
</html>
