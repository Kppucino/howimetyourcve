<<<<<<< HEAD
<?php
function redirect($url, $time=3)
{
	//On vérifie si aucun entête n'a déjà été envoyé
	if (!headers_sent())  {
		header("refresh: $time;url=$url"); // on redirige avec header si un entête a déjà été envoyé
		exit;
	}
	else
	{
		echo '<meta http-equiv="refresh" content="',$time,';url=',$url,'">'; // sinon on redirige avec un entête
	}
}
=======
<?php
function redirect($url, $time=3)
{
	//On vérifie si aucun entête n'a déjà été envoyé
	if (!headers_sent())  {
		header("refresh: $time;url=$url"); // on redirige avec header si un entête a déjà été envoyé
		exit;
	}
	else
	{
		echo '<meta http-equiv="refresh" content="',$time,';url=',$url,'">'; // sinon on redirige avec un entête
	}
}
>>>>>>> b875e9ad5df5d6d987f0c73e5224299994958af3
?>