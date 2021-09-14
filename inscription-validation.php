<?php 
require_once("base.php");
try
        {
            $bdd = new PDO($dsn, $util, $pwd);
        }
        catch(\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

$log=$_POST['log'];
$mail=$_POST['mail'];
$password=$_POST['p1'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];

 $reqIdUti = $bdd->prepare("SELECT max(idutilisateur)+1  FROM utilisateur");
                    $reqIdUti->execute();
                    $resIdUti = $reqIdUti->fetch(PDO::FETCH_ASSOC);
 $reshash = password_hash($password, PASSWORD_DEFAULT);
 
  $reqIns = $bdd->prepare("INSERT INTO utilisateur(idutilisateur, prenom, nom, login, MotDePasse, mail ) VALUES (:id, :prenom, :nom, :log, :p1, :mail)");
  						$reqIns->bindParam(':id', $resIdUti['id'],PDO::PARAM_INT);
                        $reqIns->bindParam(':log', $log,PDO::PARAM_STR);
                        $reqIns->bindParam(':mail', $mail,PDO::PARAM_STR);
                        $reqIns->bindParam(':p1', $reshash,PDO::PARAM_STR);
                        $reqIns->bindParam(':nom', $nom,PDO::PARAM_STR);
                        $reqIns->bindParam(':prenom', $prenom,PDO::PARAM_STR);
                        $res = $reqIns->execute();

        if ($res) {
        	header('Location:index.php?err=4');
        }
        else
        	echo "Une erreur s'est produite, veuillez recommencer votre inscription.Merci.<br>
                  <a href = \"inscription.php\"> Retour Page Inscription</a><br>
                <a href = \"index.php\"> Retour Page Accueil</a>";
            //print_r($reqIns->errorInfo());
           // var_dump($res);
 ?>
