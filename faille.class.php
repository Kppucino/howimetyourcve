<?php
    class faille
    {
      private $idFaille;
      private $nomFaille;
      private $descriptionFaille;

      public function faille($idFaille, $nomFaille, $descriptionFaille)
      {
          $this->idFaille = $idFaille;
          $this->nomFaille = $nomFaille;
          $this->descriptionFaille= $descriptionFaille;
      }

      public function getIdFaille()
      {
          return $this->idFaille;
      }

      public function setIdFaille($unId)
      {
          $this->idFaille = $unId;
      }

      public function getNomFaille()
      {
          return $this->nomFaille;
      }

      public function setNomFaille($unNom)
      {
          $this->nomFaille = $unNom;
      }

      public function getDescriptionFaille()
      {
          return $this->descriptionFaille;
      }

      public function setDescriptionFaille($uneDescription)
      {
          $this->descriptionFaille = $uneDescription;
      }

      public function toString()
      {
          $msg = 'Faille : <br>';
          $msg .= 'idFaille : '.$this->getIdFaille().'<br>';
          $msg .= 'nomFaille : '.$this->getNomFaille().'<br>';
          $msg .= 'descriptionFaille : '.$this->getDescriptionFaille().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
