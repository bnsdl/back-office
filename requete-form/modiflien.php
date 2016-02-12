<?php

session_start();
$iduser=$_SESSION["iduser"];
$git=$_GET["git"];
$linked=$_GET["linked"];
$codepen=$_GET["codepen"];
$twitter=$_GET["twitter"];
$siteperso=$_GET["siteperso"];


try {
  $connect=new PDO('mysql:host=localhost;dbname=simplonsite;charset=utf8','root','');
}
  catch (Exception $e){
die ('erreur : '.$e->getMessage());
}




       $insertion ="UPDATE lien SET git=:git , linked=:linked , codepen= :codepen, twitter=:twitter, siteperso=:siteperso WHERE id=:iduser";
       echo $insertion;
       $requete = $connect->prepare($insertion);
       $requete->bindParam(':git', $git, PDO::PARAM_STR);
       $requete->bindParam(':linked', $linked, PDO::PARAM_STR);
       $requete->bindParam(':codepen', $codepen, PDO::PARAM_STR);
       $requete->bindParam(':twitter', $twitter, PDO::PARAM_STR);
       $requete->bindParam(':siteperso', $siteperso, PDO::PARAM_STR);
       $requete->bindParam(':iduser', $iduser, PDO::PARAM_INT);
       $requete->execute(); // renvoie TRUE || FALSE
?>
