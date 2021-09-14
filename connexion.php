<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['id']<0)
    {
        header("Location: index.php");
    }
    else
    {

    require_once("base.php");
    $nomDeCompte = $_POST['ndc'];
    $pass = $_POST['mdp'];


    try{
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    $req = $bdd->prepare("SELECT idutilisateur, motDePasse, grade FROM utilisateur WHERE login = :name");
    $req->execute(['name' => $nomDeCompte]);
    $res = $req->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id'] = $res['idutilisateur'];
    $_SESSION['login'] = $res['login'];
    $_SESSION['grade'] = $res['grade'];
    setcookie("cookie", $res['login'], time()+6000);

 if(!password_verify($pass, $res['motDePasse']))
       header("Location: index.php?err=1");
    else{
        if ($res['grade']==='1')
            header("Location: sondage.php");
        else
        header("Location: participation.php");
    }
    }
?>