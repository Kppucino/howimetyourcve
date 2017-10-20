<?php
    class typeFaille
    {
      private $idTypeFaille;
      private $nomTypeFaille;

      public function typeFaille($idTypeFaille, $nomTypeFaille)
      {
          $this->idTypeFaille = $idTypeFaille;
          $this->nomTypeFaille = $nomTypeFaille;
      }

      public function getIdTypeFaille()
      {
          return $this->idTypeFaille;
      }

      public function setIdTypeFaille($unId)
      {
          $this->idTypeFaille = $unId;
      }

      public function getNomTypeFaille()
      {
          return $this->nomTypeFaille;
      }

      public function setNomTypeFaille($unNom)
      {
          $this->nomTypeFaille = $unNom;
      }

      public function toString()
      {
          $msg = 'TypeFaille : <br>';
          $msg .= 'idTypeFaille : '.$this->getIdTypeFaille().'<br>';
          $msg .= 'nomTypeFaille : '.$this->getNomTypeFaille().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
