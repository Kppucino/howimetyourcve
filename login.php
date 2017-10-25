<?php
  include("include/include.php");
  include("include/redirect.php");

  if (isset ($_GET['action']))
  {
  	if ($_GET['action'] == 'connexion')
  	{
  		if ($_POST['userid'] != '' && $_POST['passwordinput'] != '')
  		{
        $user = checkifUserExist($_POST['userid'], $_POST['passwordinput']);

        if ($user != false)
        {
          session_unset();

          $_SESSION['idUser'] = $user[0]["idUser"];
          $_SESSION['nomUser'] = $user[0]["nomUser"];
          $_SESSION['mailUser'] = $user[0]["mailUser"];
        }
  		}
  	}
    else if ($_GET['action'] == 'inscription')
    {
      if ($_POST['Email'] != '' && $_POST['userid'] != '' && $_POST['password'] != '' && $_POST['reenterpassword'] != '')
  		{
        $user = checkifUserExist($_POST['userid'], $_POST['password']);

        if ($user == false)
        {
          $user = createUser($_POST['Email'], $_POST['userid'], $_POST['password'], $_POST['reenterpassword']);

          if ($user != false)
          {
            session_unset();

            $_SESSION['idUser'] = $user[0]["idUser"];
            $_SESSION['nomUser'] = $user[0]["nomUser"];
            $_SESSION['mailUser'] = $user[0]["mailUser"];
          }
        }
  		}
    }
  }

  redirect("index.php");
?>
