<?php

session_start();
$iduser=$_SESSION["iduser"];

if (isset($_GET["git"])){
  $git=$_GET["git"];
}
if (isset($_GET["linked"])){
  $linked=$_GET["linked"];
}
if (isset($_GET["codepen"])){
  $codepen=$_GET["codepen"];
}
if (isset($_GET["twitter"])){
  $twitter=$_GET["twitter"];
}
if (isset($_GET["siteperso"])){
  $siteperso=$_GET["siteperso"];
}
if(isset($_GET["cv"])){
  $cv=$_GET["cv"];
}

try {
  $connect=new PDO('mysql:host=localhost;dbname=simplonsite;charset=utf8','root','root');
}
catch (Exception $e){
  die ('erreur : '.$e->getMessage());
}

$insertion ="UPDATE `lien` SET git=:git , linked=:linked , codepen= :codepen, twitter=:twitter, siteperso=:siteperso, cv=:cv WHERE id=:iduser";
// echo $insertion;
$requete = $connect->prepare($insertion);
$requete->bindParam(':git', $git, PDO::PARAM_STR);
$requete->bindParam(':linked', $linked, PDO::PARAM_STR);
$requete->bindParam(':codepen', $codepen, PDO::PARAM_STR);
$requete->bindParam(':twitter', $twitter, PDO::PARAM_STR);
$requete->bindParam(':siteperso', $siteperso, PDO::PARAM_STR);
$requete->bindParam(':cv', $cv, PDO::PARAM_STR);
$requete->bindParam(':iduser', $iduser, PDO::PARAM_INT);
$requete->execute(); // renvoie TRUE || FALSE
?>
