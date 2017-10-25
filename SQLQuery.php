<?php
  $queryGetAllCVEWithEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeFaille = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndSomeFaille =  "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";

  $queryGetFavorisUser = "SELECT idCve FROM link_cve_user WHERE idUser = :idUser AND favoris = 1";
  $queryCheckIfExistInCveUser = "SELECT COUNT(*) FROM link_cve_user WHERE idUser = :idUser AND idCve = :idCve";
  $queryUpdateFavorisUserCve = "UPDATE link_cve_user SET favoris = :favoris WHERE idUser = :idUser AND idCve = :idCve";
  $queryInsertFavorisUserCve = "INSERT INTO link_cve_user(idUser, idCve, favoris) VALUES (:idUser, :idCve, :favoris)";
  $queryDeleteEmptyLineLinkCveUser = "DELETE FROM link_cve_user WHERE (favoris IS NULL OR favoris = 0) AND commentaire IS NULL";

  $queryGetNbAllCVEWithEditor = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditor = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeFaille = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithStatus = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFaille =  "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditorAndStatus = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetTopFailleAllCVE = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithEditor = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithStatus = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.statusCve = :statusCve GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithEditorAndStatus = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";

  $queryGetTopEditeurAllCVE = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithFaille = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND faille.idFaille IN (:arrayIdFaille) GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithStatus = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithFailleAndStatus = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";

  $queryGetAVGAllCVE = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeEditor = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeFaille = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithStatus = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorAndSomeFaille =  "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeEditorAndStatus = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeFailleAndStatus = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";

  $queryGetEditeur = "SELECT * FROM editeur";
  $queryGetRandEditor = "SELECT * FROM editeur ORDER BY rand() LIMIT 7";
  $queryGetEditeurAndCVEByIdEditeur = "SELECT * FROM editeur WHERE editeur.idEditeur = :idEditeur";
  $queryGetCommentaireEditeurUser = "SELECT * FROM link_editeur_user WHERE idUser = :idUser AND idEditeur = :idEditeur";

  $queryGetFaille = "SELECT * FROM faille";
  $queryGetRandFaille = "SELECT * FROM faille ORDER BY rand() LIMIT 7";
  $queryGetFailleAndTypeById = "SELECT * FROM faille, typefaille WHERE faille.idType = typeFaille.idType AND faille.idFaille = :idFaille";
  $queryGetCommentaireFailleUser = "SELECT * FROM link_faille_user WHERE idUser = :idUser AND idFaille = :idFaille";

  $queryGetCVEByIdCve = "SELECT * FROM cve, editeur WHERE cve.idCve = :idCve AND cve.idEditeur = editeur.idEditeur";
  $queryGetReferenceCVEByIdCVE = "SELECT * FROM cve, link_cve_reference, reference WHERE cve.idCve = :idCve AND cve.idCve = link_cve_reference.idCve AND link_cve_reference.idReference = reference.idReference";
  $queryGetFailleCVEByIdCVE = "SELECT * FROM cve, link_cve_faille, faille WHERE cve.idCve = :idCve AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille = faille.idFaille";
  $queryGetCommentaireCveUser = "SELECT * FROM link_cve_user WHERE idUser = :idUser AND idCve = :idCve";

  $queryGetUserByName= "SELECT * FROM user WHERE nomUser = :nomUser";
  $queryGetUserByIdUser= "SELECT * FROM user WHERE idUser = :idUser";

  $queryInsertUser = "INSERT INTO user(nomUser, mailUser, passwordUser) VALUES (:nomUser, :mailUser, :passwordUser)";
?>
