<?php
include("fonctions.php");
include("SQLQuery.php");

$str = file_get_contents('cve/nvdcve-1.0-recent.json');
$array = json_decode($str, true);

for ($i=0; $i < sizeof($array); $i++)
{
  if (isset($array['CVE_Items'][$i]['cve']['affects']['vendor']['vendor_data'][0]['vendor_name']))
  {
    $editeur = $array['CVE_Items'][$i]['cve']['affects']['vendor']['vendor_data'][0]['vendor_name'];
  }
  else
  {
    $editeur = "Non renseigné";
  }

  if (isset($array['CVE_Items'][$i]['cve']['affects']['vendor']['vendor_data'][0]['product']['product_data']))
  {
    for ($y=0; $y < sizeof($array['CVE_Items'][$i]['cve']['affects']['vendor']['vendor_data'][0]['product']['product_data']); $y++)
    {
      $listProduit[$y] = $array['CVE_Items'][$i]['cve']['affects']['vendor']['vendor_data'][0]['product']['product_data'][$y]["product_name"];
    }
  }

  if (isset($array['CVE_Items'][$i]['cve']['references']['reference_data'][0]['url']))
  {
    for ($y=0; $y < sizeof($array['CVE_Items'][$i]['cve']['references']['reference_data'][0]['url']); $y++)
    {
      $listReference[$y] = $array['CVE_Items'][$i]['cve']['references']['reference_data'][$y]['url'];
    }
  }

  $cve[0]["nomCve"] = $array['CVE_Items'][$i]['cve']["CVE_data_meta"]["ID"];
  $cve[0]["dateCve"] = formaterDateInsert($array['CVE_Items'][0]["publishedDate"]);

  if(isset($array['CVE_Items'][$i]['cve']['description']['description_data'][0]['value']))
  {
    $cve[0]["descriptionCve"] = $array['CVE_Items'][$i]['cve']['description']['description_data'][0]['value'];
  }
  else
  {
    $cve[0]["descriptionCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["baseScore"]))
  {
    $cve[0]["noteBaseCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["baseScore"];
  }
  else
  {
    $cve[0]["noteBaseCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["exploitabilityScore"]))
  {
    $cve[0]["noteExploitabiliteCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["exploitabilityScore"];
  }
  else
  {
    $cve[0]["noteExploitabiliteCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["impactScore"]))
  {
    $cve[0]["noteImpactCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["impactScore"];
  }
  else
  {
    $cve[0]["noteImpactCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["obtainAllPrivilege"]))
  {
    if($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["obtainAllPrivilege"] == false)
    {
      $cve[0]["adminAccesCve"] = 0;
    }
    else
    {
      $cve[0]["adminAccesCve"] = 1;
    }
  }
  else
  {
    $cve[0]["adminAccesCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["obtainUserPrivilege"]))
  {
    if($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["obtainUserPrivilege"] == false)
    {
      $cve[0]["userAccesCve"] = 0;
    }
    else
    {
      $cve[0]["userAccesCve"] = 1;
    }
  }
  else
  {
    $cve[0]["userAccesCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["userInteractionRequired"]))
  {
    if($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["userInteractionRequired"] == false)
    {
      $cve[0]["userInteractionRequiredCve"] = 0;
    }
    else
    {
      $cve[0]["userInteractionRequiredCve"] = 1;
    }
  }
  else
  {
    $cve[0]["userInteractionRequiredCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["confidentialityImpact"]))
  {
    $cve[0]["confidentialiteImpactCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["confidentialityImpact"];
  }
  else
  {
    $cve[0]["confidentialiteImpactCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["integrityImpact"]))
  {
    $cve[0]["integriteImpactCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["integrityImpact"];
  }
  else
  {
    $cve[0]["integriteImpactCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["availabilityImpact"]))
  {
    $cve[0]["disponibiliteImpactCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["availabilityImpact"];
  }
  else
  {
    $cve[0]["disponibiliteImpactCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["attackComplexity"]))
  {
    $cve[0]["complexiteAttaqueCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV3"]["cvssV3"]["attackComplexity"];
  }
  else
  {
    $cve[0]["complexiteAttaqueCve"] = null;
  }

  if(isset($array['CVE_Items'][$i]["impact"]["baseMetricV2"]["severity"]))
  {
    $cve[0]["severiteCve"] = $array['CVE_Items'][$i]["impact"]["baseMetricV2"]["severity"];
  }
  else
  {
    $cve[0]["severiteCve"] = null;
  }

  if (searchForExist($editeur, "editeur") == true)
  {
      $idEditeur = queryFetchWith1Value($queryGetEditeurByName, ":nomEditeur", $editeur)[0]["idEditeur"];
  }
  else
  {
    $idEditeur = queryExecuteWith1Value($queryInsertEditeur, ":nomEditeur", $editeur, true);
  }

  if (isset($listProduit))
  {
    for ($y=0; $y < sizeof($listProduit); $y++)
    {
      if (searchForExist($listProduit[$y], "produit") == true)
      {
          $idProduit[$y] = queryFetchWith1Value($queryGetOnlyProduitByName, ":nomProduit", $listProduit[$y])[0]["idProduit"];
      }
      else
      {
        $idProduit[$y] = queryExecuteWith1Value($queryInsertProduit, ":nomProduit", $listProduit[$y], true);
      }
    }
  }

  if (isset($listReference))
  {
    for ($y=0; $y < sizeof($listReference); $y++)
    {
      $idReference[$y] = queryExecuteWith1Value($queryInsertReference, ":urlReference", $listReference[$y], true);
    }
  }

  if (searchForExist($cve[0]["nomCve"], "cve") == true)
  {
      $idCve = queryFetchWith1Value($queryGetCveEditorByNameCve, ":nomCve", $cve[0]["nomCve"])[0]["idCve"];
  }
  else
  {
    $idCve = queryExecuteWith15Value($queryInsertCve, ":nomCve", $cve[0]["nomCve"], ":dateCve", $cve[0]["dateCve"], ":descriptionCve", $cve[0]["descriptionCve"], ":noteBaseCve", $cve[0]["noteBaseCve"], ":noteExploitabiliteCve", $cve[0]["noteExploitabiliteCve"], ":noteImpactCve", $cve[0]["noteImpactCve"], ":adminAccesCve", $cve[0]["adminAccesCve"], ":userAccesCve", $cve[0]["userAccesCve"], ":userInteractionRequiredCve", $cve[0]["userInteractionRequiredCve"], ":confidentialiteImpactCve", $cve[0]["confidentialiteImpactCve"], ":integriteImpactCve", $cve[0]["integriteImpactCve"], ":disponibiliteImpactCve", $cve[0]["disponibiliteImpactCve"], ":complexiteAttaqueCve", $cve[0]["complexiteAttaqueCve"], ":severiteCve", $cve[0]["severiteCve"], ":idEditeur", $idEditeur, true);
  }

  if (isset($idProduit))
  {
    for ($y=0; $y < sizeof($idProduit); $y++)
    {
      queryExecuteWith2Value($queryInsertLinkCveProduit, ":idCve", $idCve, ":idProduit", $idProduit[$y], false);
    }
  }

  if (isset($idReference))
  {
    for ($y=0; $y < sizeof($idReference); $y++)
    {
      queryExecuteWith2Value($queryInsertLinkCveReference, ":idCve", $idCve, ":idReference", $idReference[$y], false);
    }
  }

  searchForFaille($array['CVE_Items'][$i]['cve']['description']['description_data'][0]['value'], $idCve);
}
?>
