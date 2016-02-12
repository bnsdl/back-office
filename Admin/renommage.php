<?php

if(isset($_GET['techno'])&&isset($_GET['renom'])){
    
    $techno = trim($_GET['techno']);
    $renom = trim($_GET['renom']);
    if($renom == ""){
        echo "aucune donnée saise";
        return;
    }else{
        
            try
        {
            $connect = new PDO('mysql:host=localhost; dbname=simplonsite; charset=utf8', 'root', 'root');
        }
            catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }        
            $request = $connect->prepare("UPDATE  `simplonsite`.`techno` SET `techno` =  :renom WHERE  `techno`.`techno`=:techno");
            $request->bindParam(':renom', $renom, PDO::PARAM_STR);
            $request->bindParam(':techno', $techno, PDO::PARAM_STR);
            $result = $request->execute();
            echo 'Result : '.$result;
    }
        }else{
            echo 'Result : '.$result;
        }
?>