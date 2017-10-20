<?php
    class CVEUser
    {
      private $idCVE;
      private $idUser;
      private $favorisCVEUser;
      private $commentaireCVEUser;

      public function CVEUser($idCVE, $idUser, $favorisCVEUser, $commentaireCVEUser)
      {
          $this->idCVE = $idCVE;
          $this->idUser = $idUser;
          $this->favorisCVEUser= $favorisCVEUser;
          $this->commentaireCVEUser = $commentaireCVEUser;
      }

      public function getIdCVEUser()
      {
          return $this->idCVE;
      }

      public function setIdCVEUser($unId)
      {
          $this->idCVE = $unId;
      }

      public function getIdUserCVE()
      {
          return $this->idUser;
      }

      public function setIdUSerCVE($unId)
      {
          $this->idUser = $unId;
      }

      public function getFavorisCVEUser()
      {
          return $this->favorisCVEUser;
      }

      public function setFavorisCVEUser($unFavoris)
      {
          $this->favorisCVEUser= $unFavoris;
      }

      public function getCommentaireCVEUser()
      {
          return $this->commentaireCVEUser;
      }

      public function setCommentaireCVEUser($unCommentaireCVEUser)
      {
          $this->commentaireCVEUser= $unCommentaireCVEUser;
      }

      public function toString()
      {
          $msg = 'CVE User: <br>';
          $msg .= 'idCVE : '.$this->getIdCVEUser().'<br>';
          $msg .= 'idUSer : '.$this->getIdUserCVE().'<br>';
          $msg .= 'Favoris : '.$this->getFavorisCVEUser().'<br>';
          $msg .= 'Commentaire : '.$this->getCommentaireCVEUser().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
