<?php
     session_start();

    if(isset($_SESSION['id']) && $_SESSION['id']<0)
    {
        header("Location: index.php");
    }
    else
    {
 if(isset($_POST["choix"]) && $_POST["choix"] != "")
    {
 setlocale(LC_ALL, 'fr_FR.utf8');
        $dateNow = date('Y-m-d_h-i-s');
        
        require_once("base.php");
        try
        {
            $bdd = new PDO($dsn, $util, $pwd);
        }
        catch(\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
$idU=$_SESSION['id'];
$idV=$_POST['hid'];
$choix=$_POST['choix'];
             $reqVote = $bdd->prepare("INSERT INTO `resultat`(`utilisateur_idutilisateur`, `vote_idvote`, `resultat`) VALUES (:idutilisateur, :idvote, :choix) ");
                $reqVote->execute(array(
                    'idutilisateur'=>$idU,
                    'idvote'=>$idV,
                    'choix'=>($choix)));

             if($reqVote){
                       echo "Merci d'avoir voter<br>
                            <a href = \"participation.php\"> Retour Page Principale Voter c'est facile</a>";
                            }
             else{
                        echo "Une erreur s'est produite, veuillez recommencer votre sondage.Merci.
                    <a href=\"participation.php\"> Retour Page Principale Voter c'est facile</a>";
        }
}
    else
        echo "Une erreur s'est produite, veuillez recommencer votre sondage.Merci.";
  }      
?>