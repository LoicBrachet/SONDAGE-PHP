<?php
require_once("base.php");

session_start();
     if(isset($_SESSION['id']) && $_SESSION['id']<0)
    {
        header("Location: sondage.php");
    }

    $question = $_POST['qap'];
    $rep_1 = $_POST['r1'];
    $rep_2 = $_POST['r2'];
    $rep_3 = $_POST['r3'];

 try{
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

                        
 $reqvote = $bdd->prepare("INSERT INTO vote(question, reponse1, reponse2, reponse3, utilisateur_idutilisateur) VALUES(:qap, :r1, :r2, :r3, :id)");
	$reqvote->bindValue(':qap', $question);
	$reqvote->bindValue(':r1', $rep_1);
	$reqvote->bindValue(':r2', $rep_2);
	$reqvote->bindValue(':r3', $rep_3);
    $reqvote->bindValue(':id',$_SESSION['id']);
	$res = $reqvote->execute();
 	if($res)
            header("Location: sondage.php");
        else
        	echo "Une erreur s'est produite, veuillez recommencer votre sondage.Merci.
                    <a href = \"creation.php\"> Retour Page Créer un sondage</a>";
                    var_dump($question);
                    var_dump($_SESSION['id']);
                    print_r($reqvote->errorInfo());
 
?>