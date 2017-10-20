<?php
    class user
    {
      private $idUser;
      private $nomUser;
      private $mdpUser;

      public function user($idUser, $nomUser, $mdpUser)
      {
          $this->idUser = $idUser;
          $this->nomUser = $nomUser;
          $this->mdpUser = $mdpUser;
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
