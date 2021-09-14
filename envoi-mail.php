<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" media="all">
    <title>CrytpoBlog</title>
</head>
<?php
    require_once("base.php");
    try{
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $mel = $_POST['mel'];
    $req = $bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE mail = :mail");
    $req->execute(['mail' => $mel]);
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if($res)
    {
        $codeAleatoire = rand(1000000, 10000000);
        $req = $bdd->query("UPDATE `Utilisateur` SET `recovmdp`=$codeAleatoire WHERE idUtilisateur =".$res['idUtilisateur']);
        $req->execute();
       
       $sujet = "Changement de votre mot de passe - Cryptoblog";
        
        $message = "<h1>Bonjour,</h1><br>
                     Pour changer votre mot de passe rendez-vous à l'adresse suivante :<br>
                     <a href='http://localhost/SONDAGE/changement-mdp.php?code=$codeAleatoire'>http://localhost/SONDAGE/changement-mdp.php?code=$codeAleatoire</a>";
        $destinataire = $_POST["mel"];
        
        
        $headers = "From: \"Cryptoblog\"<cryptoblog@mail.fr>\n";
        $headers .= "Reply-To: no-reply@mail.fr\n";
        $headers .= "Content-Type: text/html; charset=\"utf-8\"";
        
        mail($destinataire,$sujet,$message,$headers);
        header("Location: index.php?err=3&mail=".$_POST['mel']);
    }
    else
    {
        echo "Email inconnu";
    }
?>

