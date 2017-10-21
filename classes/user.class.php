<?php
    class user
    {
      private $idUser;
      private $nomUser;
      private $mdpUser;
      private $lesCVEUser;

      public function user($idUser, $nomUser, $mdpUser)
      {
          $this->idUser = $idUser;
          $this->nomUser = $nomUser;
          $this->mdpUser = $mdpUser;
          $this->lesCVEUser = array();
          $this->lesEditeurUser = array();
      }

      public function getIdUser()
      {
          return $this->idUser;
      }

      public function setIdUser($unId)
      {
          $this->idUser = $unId;
      }

      public function getNomUser()
      {
          return $this->nomUser;
      }

      public function setNomUser($unNom)
      {
          $this->nomUser = $unNom;
      }

      public function getMdpUser()
      {
          return $this->mdpUser;
      }

      public function setMdpUser($unMdp)
      {
          $this->mdpUser = $unMdp;
      }

      public function getLesCVEUser()
      {
          return $this->lesCVEUser;
      }

      public function ajouteCVEUser($unCVEUser)
    	{
    		  $this->lesCVEUser[] = $unCVEUser;
    	}
    	public function getLeCVEUser($i)
    	{
    		  return $this->lesCVEUser[$i];
    	}
    	public function getNbCVEUser()
    	{
    		  return sizeof($this->lesCVEUser);
    	}
    	public function viderListeCVEUser()
    	{
    		  $this->lesCVEUser = array();
    	}

      public function getLesEditeursUser()
      {
          return $this->lesEditeurUser;
      }

      public function ajouteEditeurUser($unEditeurUser)
    	{
    		  $this->lesEditeurUser[] = $unEditeurUser;
    	}
    	public function getLeEditeurUser($i)
    	{
    		  return $this->lesEditeurUser[$i];
    	}
    	public function getNbEditeurUSer()
    	{
    		  return sizeof($this->lesEditeurUser);
    	}
    	public function viderListeEditeurUser()
    	{
    		  $this->lesEditeurUser = array();
    	}

      public function toString()
      {
          $msg = 'User : <br>';
          $msg .= 'idUser : '.$this->getIdUser().'<br>';
          $msg .= 'nomUser : '.$this->getNomUser().'<br>';
          $msg .= 'mdpUser : '.$this->getMdpUser().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
