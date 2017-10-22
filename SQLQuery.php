<?php
  $queryGetAllCVEWithEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeFaille = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteCve FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeEditorAndSomeFaille =  "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteCve, editeur.idEditeur, editeur.nomEditeur FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAllCVEWithSomeEditorAndStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteCve, editeur.idEditeur, editeur.nomEditeur FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteCve, editeur.idEditeur, editeur.nomEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetNbAllCVEWithEditor = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditor = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeFaille = "SELECT COUNT(DISTINCT(cve.idCve)) FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithStatus = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFaille =  "SELECT COUNT(DISTINCT(cve.idCve)) FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditorAndStatus = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetTopFailleAllCVEWithEditor = "SELECT faille.idFaille, COUNT(DISTINCT(cve.idCve)) FROM cve, link_cve_faille, faille WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille GROUP BY faille.idFaille";
  $queryGetTopFailleAllCVEWithSomeEditor = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetTopFailleAllCVEWithSomeFaille = "SELECT COUNT(DISTINCT(cve.idCve)) FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetTopFailleAllCVEWithStatus = "SELECT COUNT(cve.idCve) FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetEditeur = "SELECT * FROM editeur";

  $queryGetFaille = "SELECT * FROM faille";
?>
