<?php
session_start();
     if(isset($_SESSION['id']) && $_SESSION['id']<0)
    {
        header("Location: sondage.php");
    }
     else{
    require_once("base.php");
    try
    {
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e)
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }   
    //$req=$bdd->prepare("delete from vote" );
 
$req = $bdd->prepare("TRUNCATE TABLE `resultat`");
$req->execute();
$res= $bdd->prepare("DELETE from vote");
$res->execute();
  	header("Location:creation.php");
}
    ?>