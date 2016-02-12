<?php
$newTech = $_GET['name'];

try
{
    $connect = new PDO('mysql:host=localhost; dbname=simplonsite; charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}



$insertion = "INSERT INTO techno (`id`, `techno`) VALUES (NULL, :newTech)";
$requete = $connect->prepare($insertion);
$requete->bindParam(':newTech', $newTech, PDO::PARAM_STR);
$result = $requete->execute(); // renvoie TRUE || FALSE
?>
