<?php
    class editeurCVE
    {
      private $idEditeur;
      private $idUser;
      private $favorisUserEditeur;
      private $commentaireUserEditeur;

      public function EditeurCVE($idEditeur, $idUser, $favorisUserEditeur, $commentaireUserEditeur)
      {
          $this->idEditeur = $idEditeur;
          $this->idUser = $idUser;
          $this->favorisUserEditeur= $favorisUserEditeur;
          $this->commentaireUserEditeur = $commentaireUserEditeur;
      }

      public function getIdEditeurUser()
      {
          return $this->idEditeur;
      }

      public function setIdEditeurUser($unId)
      {
          $this->idEditeur = $unId;
      }

      public function getIdUserEditeur()
      {
          return $this->idUser;
      }

      public function setIdUserEditeur($unId)
      {
          $this->idUser = $unId;
      }

      public function getFavorisUserEditeur()
      {
          return $this->favorisUserEditeur;
      }

      public function setFavorisUserEditeur($unFavoris)
      {
          $this->favorisUserEditeur= $unFavoris;
      }

      public function getCommentaireUserEditeur()
      {
          return $this->commentaireUserEditeur;
      }

      public function setCommentaireUserEditeur($unCommentaireUserEditeur)
      {
          $this->commentaireUserEditeur= $unCommentaireUserEditeur;
      }

      public function toString()
      {
          $msg = 'Editeur User: <br>';
          $msg .= 'idCVE : '.$this->getIdEditeurUser().'<br>';
          $msg .= 'idUSer : '.$this->getIdUserEditeur().'<br>';
          $msg .= 'Favoris : '.$this->getFavorisUserEditeur().'<br>';
          $msg .= 'Commentaire : '.$this->getCommentaireUserEditeur().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
