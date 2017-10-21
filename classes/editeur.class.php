<?php
    class editeur
    {
      private $idEditeur;
      private $nomEditeur;
      private $descriptionEditeur;
      private $logoEditeur;

      public function editeur($idEditeur, $nomEditeur, $descriptionEditeur, $logoEditeur)
      {
          $this->idEditeur = $idEditeur;
          $this->nomEditeur = $nomEditeur;
          $this->descriptionEditeur= $descriptionEditeur;
          $this->logoEditeur = $logoEditeur;
      }

      public function getIdEditeur()
      {
          return $this->idEditeur;
      }

      public function setIdEditeur($unId)
      {
          $this->idEditeur = $unId;
      }

      public function getNomEditeur()
      {
          return $this->nomEditeur;
      }

      public function setNomEditeur($unNom)
      {
          $this->nomEditeur = $unNom;
      }

      public function getDescriptionEditeur()
      {
          return $this->descriptionEditeur;
      }

      public function setDescriptionEditeur($uneDescription)
      {
          $this->descriptionEditeur = $uneDescription;
      }

      public function getLogoEditeur()
      {
          return $this->logoEditeur;
      }

      public function setLogoEditeur($unLogo)
      {
          $this->logoEditeur= $unLogo;
      }

      public function toString()
      {
          $msg = 'Editeur : <br>';
          $msg .= 'idEditeur : '.$this->getIdEditeur().'<br>';
          $msg .= 'nomEditeur : '.$this->getNomEditeur().'<br>';
          $msg .= 'descriptionEditeur : '.$this->getDescriptionEditeur().'<br>';
          $msg .= 'logoEditeur : '.$this->getLogoEditeur().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
