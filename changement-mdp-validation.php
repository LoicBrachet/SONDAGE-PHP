<?php
    $newPwd = $_POST["p1"];
    $newPwd2 = $_POST["p2"];
    $code = $_POST["code"];
    if($newPwd == $newPwd2)
    {
        require_once("base.php");
        try{
            $bdd = new PDO($dsn, $util, $pwd);
        }
        catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $req = $bdd->prepare("UPDATE Utilisateur SET MotDePasse= :mdp, recovmdp=NULL WHERE recovmdp = :code");
        $res = $req->execute(['code' => $code, 'mdp' => password_hash($newPwd, PASSWORD_DEFAULT)]);

        
        if($res)  
            header("Location: index.php?err=4");
        else
            print_r($req->errorInfo());
           //header("Location: index.php?err=2");
    }
    else
        header("Location: index.php?err=1");
    
?>