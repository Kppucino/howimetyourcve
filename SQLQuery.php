<?php
  $queryGetAllCVEWithEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditor = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeFaille = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEByFavoris = "SELECT * FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndSomeFaille =  "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndStatus = "SELECT * FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorByFavoris = "SELECT * FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeFailleByFavoris = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur, link_cve_user.favoris FROM cve, link_cve_faille, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetAllCVEWithSomeEditorAndSomeFailleByFavoris = "SELECT DISTINCT cve.idCve, cve.nomCve, cve.dateCve, cve.statusCve, cve.descriptionCve, cve.noteBaseCve, editeur.idEditeur, editeur.nomEditeur, editeur.descriptionEditeur, editeur.logoEditeur, link_cve_user.favoris FROM cve, link_cve_faille, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC LIMIT 25 OFFSET :offset";
  $queryGetCveEditorByNameCve = "SELECT * FROM cve, editeur WHERE cve.nomCve LIKE :nomCve AND cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetProduitByIdCVE = "SELECT * FROM link_cve_produit, produit WHERE link_cve_produit.idCve = :idCve AND link_cve_produit.idProduit = produit.idProduit ORDER BY nomProduit";

  $queryGetFavorisUser = "SELECT idCve FROM link_cve_user WHERE idUser = :idUser AND favoris = 1";
  $queryCheckIfExistInCveUser = "SELECT COUNT(*) FROM link_cve_user WHERE idUser = :idUser AND idCve = :idCve";
  $queryUpdateFavorisUserCve = "UPDATE link_cve_user SET favoris = :favoris WHERE idUser = :idUser AND idCve = :idCve";
  $queryInsertFavorisUserCve = "INSERT INTO link_cve_user(idUser, idCve, favoris) VALUES (:idUser, :idCve, :favoris)";
  $queryDeleteEmptyLineLinkCveUser = "DELETE FROM link_cve_user WHERE (favoris IS NULL OR favoris = 0) AND (commentaire IS NULL OR commentaire = '')";

  $queryGetNbAllCVEWithEditor = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditor = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeFaille = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithStatus = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEByFavoris = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFaille =  "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetNbAllCVEWithSomeEditorAndStatus = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorByFavoris = "SELECT COUNT(cve.idCve) AS Nb FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeFailleByFavoris = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, link_cve_user WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetNbAllCVEWithSomeEditorAndSomeFailleByFavoris = "SELECT COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetNbCveByName = "SELECT COUNT(cve.idCve) AS Nb FROM cve WHERE cve.nomCve LIKE :nomCve";

  $queryGetTopFailleAllCVE = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithEditor = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithStatus = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.statusCve = :statusCve GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEByFavoris = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur, link_cve_user WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithEditorAndStatus = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";
  $queryGetTopFailleAllCVEWithEditorByFavoris = "SELECT faille.idFaille, faille.nomFaille, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, link_cve_faille, faille, editeur, link_cve_user WHERE cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 GROUP BY faille.idFaille, faille.nomFaille LIMIT 5";

  $queryGetTopEditeurAllCVE = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithFaille = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND faille.idFaille IN (:arrayIdFaille) GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithStatus = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEByFavoris = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithFailleAndStatus = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";
  $queryGetTopEditeurAllCVEWithFailleByFavoris = "SELECT editeur.idEditeur, editeur.nomEditeur, COUNT(DISTINCT(cve.idCve)) AS Nb FROM cve, editeur, link_cve_faille, faille, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_faille.idCve AND  link_cve_faille.idFaille = faille.idFaille AND faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 GROUP BY editeur.idEditeur, editeur.nomEditeur LIMIT 5";

  $queryGetAVGAllCVE = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeEditor = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeFaille = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithStatus = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEByFavoris = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorAndSomeFaille =  "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, editeur, link_cve_faille WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) ORDER BY dateCve DESC, statusCve";
  $queryGetAVGAllCVEWithSomeEditorAndStatus = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorByFavoris = "SELECT AVG(noteBaseCve) AS Moyenne FROM cve, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeFailleAndStatus = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeFailleByFavoris = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille, link_cve_user WHERE cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorAndSomeFailleAndStatus = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille, editeur WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.statusCve = :statusCve ORDER BY dateCve DESC";
  $queryGetAVGAllCVEWithSomeEditorAndSomeFailleByFavoris = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_faille, editeur, link_cve_user WHERE cve.idEditeur = editeur.idEditeur AND editeur.idEditeur IN (:arrayIdEditeur) AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille IN (:arrayIdFaille) AND cve.idCve = link_cve_user.idCve AND link_cve_user.idUser = :idUser AND link_cve_user.favoris = 1 ORDER BY dateCve DESC";

  $queryGetEditeur = "SELECT * FROM editeur ORDER BY nomEditeur";
  $queryGetRandEditor = "SELECT * FROM editeur ORDER BY rand() LIMIT 7";
  $queryGetEditeurAndCVEByIdEditeur = "SELECT * FROM editeur WHERE editeur.idEditeur = :idEditeur";
  $queryGetCommentaireEditeurUser = "SELECT * FROM link_editeur_user WHERE idUser = :idUser AND idEditeur = :idEditeur";
  $queryGetEditeurByName = "SELECT * FROM editeur WHERE editeur.nomEditeur LIKE :nomEditeur";
  $queryGetNbEditeurByName = "SELECT COUNT(editeur.idEditeur) AS Nb FROM editeur WHERE editeur.nomEditeur LIKE :nomEditeur";
  $queryUpdateCommentaireUserEditeur = "UPDATE link_editeur_user SET commentaire = :commentaire WHERE idUser = :idUser AND idEditeur = :idEditeur";
  $queryInsertCommentaireUserEditeur = "INSERT INTO link_editeur_user(idUser, idEditeur, commentaire) VALUES (:idUser, :idEditeur, :commentaire)";
  $queryDeleteEmptyLineLinkEditeurUser = "DELETE FROM link_editeur_user WHERE (favoris IS NULL OR favoris = 0) AND (commentaire IS NULL OR commentaire = '')";

  $queryUpdateEditeurWithPhoto = "UPDATE editeur SET nomEditeur = :nomEditeur, descriptionEditeur = :descriptionEditeur, logoEditeur = :logoEditeur WHERE idEditeur = :idEditeur";
  $queryUpdateEditeurWithoutPhoto = "UPDATE editeur SET nomEditeur = :nomEditeur, descriptionEditeur = :descriptionEditeur WHERE idEditeur = :idEditeur";

  $queryGetFaille = "SELECT * FROM faille ORDER BY nomFaille";
  $queryGetRandFaille = "SELECT * FROM faille ORDER BY rand() LIMIT 7";
  $queryGetFailleAndTypeById = "SELECT * FROM faille, typefaille WHERE faille.idType = typeFaille.idType AND faille.idFaille = :idFaille";
  $queryGetCommentaireFailleUser = "SELECT * FROM link_faille_user WHERE idUser = :idUser AND idFaille = :idFaille";
  $queryGetFailleByName = "SELECT * FROM faille, typefaille WHERE faille.nomFaille LIKE :nomFaille AND faille.idType = typeFaille.idtype";
  $queryGetNbFailleByName = "SELECT COUNT(faille.nomFaille) AS Nb FROM faille WHERE faille.nomFaille LIKE :nomFaille";
  $queryUpdateCommentaireUserFaille = "UPDATE link_faille_user SET commentaire = :commentaire WHERE idUser = :idUser AND idFaille = :idFaille";
  $queryInsertCommentaireUserFaille = "INSERT INTO link_faille_user(idUser, idFaille, commentaire) VALUES (:idUser, :idFaille, :commentaire)";
  $queryDeleteEmptyLineLinkFailleUser = "DELETE FROM link_faille_user WHERE (favoris IS NULL OR favoris = 0) AND (commentaire IS NULL OR commentaire = '')";

  $queryUpdateFaille = "UPDATE faille SET nomFaille = :nomFaille, descriptionFaille = :descriptionFaille, idType = :idType WHERE idFaille = :idFaille";

  $queryAllTypeFaille = "SELECT * FROM typefaille ORDER BY nomType";

  $queryGetCVEByIdCve = "SELECT * FROM cve, editeur WHERE cve.idCve = :idCve AND cve.idEditeur = editeur.idEditeur";
  $queryGetReferenceCVEByIdCVE = "SELECT * FROM cve, link_cve_reference, reference WHERE cve.idCve = :idCve AND cve.idCve = link_cve_reference.idCve AND link_cve_reference.idReference = reference.idReference";
  $queryGetFailleCVEByIdCVE = "SELECT * FROM cve, link_cve_faille, faille WHERE cve.idCve = :idCve AND cve.idCve = link_cve_faille.idCve AND link_cve_faille.idFaille = faille.idFaille";
  $queryGetCommentaireCveUser = "SELECT * FROM link_cve_user WHERE idUser = :idUser AND idCve = :idCve";
  $queryInsertCommentaireUserCve = "INSERT INTO link_cve_user(idUser, idCve, commentaire) VALUES (:idUser, :idCve, :commentaire)";
  $queryUpdateCommentaireUserCve = "UPDATE link_cve_user SET commentaire = :commentaire WHERE idUser = :idUser AND idCve = :idCve";

  $queryGetUserByName= "SELECT * FROM user WHERE nomUser = :nomUser";
  $queryGetUserByIdUser= "SELECT * FROM user WHERE idUser = :idUser";
  $queryGetUserWithNameAndMail = "SELECT * FROM user WHERE nomUser = :nomUser AND mailUser = :mail";

  $queryInsertUser = "INSERT INTO user(nomUser, mailUser, passwordUser) VALUES (:nomUser, :mailUser, :passwordUser)";
  $queryUpdateMdpUserById = "UPDATE user SET passwordUser = :passwordUser WHERE idUser = :idUser";
  $queryUpdateMdpUser = "UPDATE user SET passwordUser = :passwordUser WHERE nomUser = :nomUser AND mailUser = :mail";

  $queryGetNiveauById = "SELECT * FROM niveau WHERE idNiveau = :idNiveau";

  $queryGetProduit = "SELECT * FROM produit ORDER BY nomProduit";
  $queryGetProduitById = "SELECT * FROM produit, link_cve_produit, cve, editeur WHERE produit.idProduit = :idProduit AND produit.idProduit = link_cve_produit.idProduit AND link_cve_produit.idCve = cve.idCve AND cve.idEditeur = editeur.idEditeur";
  $queryGetNbCveForProduit = "SELECT COUNT(idCve) AS Nb FROM link_cve_produit WHERE idProduit = :idProduit";
  $queryGetAVGCveForProduit  = "SELECT AVG(DISTINCT(cve.noteBaseCve)) AS Moyenne FROM cve, link_cve_produit WHERE link_cve_produit.idProduit = :idProduit AND link_cve_produit.idCve = cve.idCVE";
  $queryUpdateProduit = "UPDATE produit SET nomProduit = :nomProduit, descriptionProduit = :descriptionProduit WHERE idProduit = :idProduit";
  $queryGetNbProduitByName = "SELECT COUNT(produit.idProduit) AS Nb FROM produit WHERE produit.nomProduit LIKE :nomProduit";
  $queryGetProduitByName = "SELECT * FROM produit, link_cve_produit, editeur, cve WHERE produit.nomProduit LIKE :nomProduit AND produit.idProduit = link_cve_produit.idProduit AND link_cve_produit.idCve = cve.idCve AND cve.idEditeur = editeur.idEditeur ORDER BY nomProduit";
  $queryGetOnlyProduitByName = "SELECT * FROM produit WHERE produit.nomProduit LIKE :nomProduit";

  $queryInsertEditeur = "INSERT INTO editeur(nomEditeur) VALUES (:nomEditeur)";
  $queryInsertProduit = "INSERT INTO produit(nomProduit) VALUES (:nomProduit)";
  $queryInsertReference = "INSERT INTO reference(urlReference) VALUES (:urlReference)";
  $queryInsertCve = "INSERT INTO cve(nomCve, dateCve, descriptionCve, noteBaseCve, noteExploitabiliteCve, noteImpactCve, adminAccesCve, userAccesCve, userInteractionRequiredCve, confidentialiteImpactCve, integriteImpactCve, disponibiliteImpactCve, complexiteAttaqueCve, severiteCve, idEditeur) VALUES (:nomCve, :dateCve, :descriptionCve, :noteBaseCve, :noteExploitabiliteCve, :noteImpactCve, :adminAccesCve, :userAccesCve, :userInteractionRequiredCve, :confidentialiteImpactCve, :integriteImpactCve, :disponibiliteImpactCve, :complexiteAttaqueCve, :severiteCve, :idEditeur)";
  $queryInsertLinkCveFaille = "INSERT INTO link_cve_faille(idCve, idFaille) VALUES (:idCve, :idFaille)";
  $queryInsertLinkCveProduit = "INSERT INTO link_cve_produit(idCve, idProduit) VALUES (:idCve, :idProduit)";
  $queryInsertLinkCveReference = "INSERT INTO link_cve_reference(idCve, idReference) VALUES (:idCve, :idReference)";
?>
