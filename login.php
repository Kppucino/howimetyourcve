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

          if(!empty($user[0]["idNiveau"]))
          {
            $niveau = queryFetchWith1Value($queryGetNiveauById, ":idNiveau", $user[0]["idNiveau"]);

            $_SESSION['niveauUser'] = $niveau[0]["nomNiveau"];
          }
          else
          {
              $_SESSION['niveauUser'] = "";
          }
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

            if(!empty($user[0]["idNiveau"]))
            {
              $niveau = queryFetchWith1Value($queryGetNiveauById, ":idNiveau", $user[0]["idNiveau"]);

              $_SESSION['niveauUser'] = $niveau[0]["nomNiveau"];
            }
            else
            {
                $_SESSION['niveauUser'] = "";
            }
          }
        }
  		}
    }
    elseif ($_GET['action'] == 'changerMdp')
    {
      if ($_POST['passwordinput'] != '' && $_POST['NewPasswordInput'] != '' && $_POST['NewPasswordInput2'] != '')
      {
        $user = queryFetchWith1Value($queryGetUserByIdUser, ":idUser", $_SESSION['idUser']);

        if ($user[0]["passwordUser"] == hash("sha256", $_POST['passwordinput']))
        {
          if ($_POST['NewPasswordInput'] == $_POST['NewPasswordInput2'])
          {
            queryExecuteWith2Value($queryUpdateMdpUserById, ":idUser", $_SESSION['idUser'], ":passwordUser", hash("sha256", $_POST['NewPasswordInput']), false);
          }
        }
      }
    }
    elseif ($_GET['action'] == 'deconnect')
    {
      session_destroy();
    }
  }

  redirect("index.php");
?>
