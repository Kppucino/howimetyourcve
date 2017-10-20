<?php
    class CVE
    {
      private $idCVE;
      private $nomCVE;
      private $dateCVE;
      private $statusCVE;
      private $descriptionCVE;
      private $noteCVE;

      public function CVE($idCVE, $nomCVE, $dateCVE, $statusCVE, $descriptionCVE, $noteCVE)
      {
          $this->idCVE = $idCVE;
          $this->nomCVE = $nomCVE;
          $this->dateCVE= $dateCVE;
          $this->statusCVE = $statusCVE;
          $this->descriptionCVE = $descriptionCVE;
          $this->noteCVE = $noteCVE;
      }

      public function getIdCVE()
      {
          return $this->idCVE;
      }

      public function setIdCVE($unId)
      {
          $this->idCVE = $unId;
      }

      public function getNomCVE()
      {
          return $this->nomCVE;
      }

      public function setNomCVE($unNom)
      {
          $this->nomCVE = $unNom;
      }

      public function getDateCVE()
      {
          return $this->dateCVE;
      }

      public function setDateCVE($uneDate)
      {
          $this->dateCVE= $uneDate;
      }

      public function getStatusCVE()
      {
          return $this->statusCVE;
      }

      public function setStatusCVE($unStatus)
      {
          $this->statusCVE= $unStatus;
      }

      public function getDescriptionCVE()
      {
          return $this->descriptionCVE;
      }

      public function setDescriptionCVE($uneDescription)
      {
          $this->descriptionCVE= $uneDescription;
      }

      public function getNoteCVE()
      {
          return $this->noteCVE;
      }

      public function setNoteCVE($uneNote)
      {
          $this->noteCVE= $uneNote;
      }

      public function toString()
      {
          $msg = 'CVE : <br>';
          $msg .= 'idCVE : '.$this->getIdCVE().'<br>';
          $msg .= 'nomCVE : '.$this->getNomCVE().'<br>';
          $msg .= 'dateCVE : '.$this->getDateCVE().'<br>';
          $msg .= 'statusCVE : '.$this->getStatusCVE().'<br>';
          $msg .= 'descriptionCVE : '.$this->getDescriptionCVE().'<br>';
          $msg .= 'noteCVE : '.$this->getNoteCVE().'<br>';
          $msg .= '<br>';
          return $msg;
      }
    }
?>
