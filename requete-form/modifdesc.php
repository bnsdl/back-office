<?php

session_start();
$iduser=$_SESSION["iduser"];
$desc=$_GET["desc"];



try {
  $connect=new PDO('mysql:host=localhost;dbname=simplonsite;charset=utf8','root','root');
}
  catch (Exception $e){
die ('erreur : '.$e->getMessage());
}



       // preparation de la requete
       $insertion ="UPDATE apprenant SET description=:description WHERE id=:iduser";
       $requete = $connect->prepare($insertion);
       $requete->bindParam(':description', $desc, PDO::PARAM_STR);
       $requete->bindParam(':iduser', $iduser, PDO::PARAM_INT);
       $requete->execute(); // renvoie TRUE || FALSE
?>
