<?php
  $queryGetAllCVEWithEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeFaille = "SELECT * FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeEditorAndSomeFaille =  "SELECT * FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeEditorAndStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeFailleAndStatus = "SELECT * FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT * FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetEditeur = "SELECT * FROM editeur";

  $queryGetFaille = "SELECT * FROM faille";
?>
