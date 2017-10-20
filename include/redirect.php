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
?>
