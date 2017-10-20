<<<<<<< HEAD
<?php
try
{
	$cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD,$USER,$PWD);
	$cnx->exec("SET CHARACTER SET utf8");
}
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}						
=======
<?php
try
{
	$cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD,$USER,$PWD);
	$cnx->exec("SET CHARACTER SET utf8");
}
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}						
>>>>>>> b875e9ad5df5d6d987f0c73e5224299994958af3
?>