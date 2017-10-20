<?php
include_once ('user.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe User</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
$unId = 1;
$unNom = "Batman";
$unMdp = "Robin";
$unUser = new User($unId, $unNom, $unMdp);

echo ('<b>Récupération des valeurs de la type faille dans la BDD (test de "get") <br></b>');
echo ('$id : ' . $unUser->getIdUser() . '<br>');
echo ('$Nom : ' . $unUser->getNomUser() . '<br>');
echo ('$MdpUser : ' . $unUser->getMdpUser() . '<br>');
echo ('<br>');
// tests des mutateurs (set)
echo ('<b>Changement des valeurs de la faille (test de "set") <br></b>');
$unUser->setIdUser(2);
$unUser->setNomUser("Joker");
$unUser->setMdpUser("AH AH");

echo ('$id : ' . $unUser->getIdUser() . '<br>');
echo ('$Nom : ' . $unUser->getNomUser() . '<br>');
echo ('$MdpUser : ' . $unUser->getMdpUser() . '<br>');
echo ('<br>');

echo ('<b>Récapitulatif de l\'user (test de "toString") <br></b>');
// test de la méthode toString
echo ($unUser->toString());
?>

</body>
</html>
