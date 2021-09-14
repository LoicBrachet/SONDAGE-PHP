<?php 
session_start();
 if(!isset($_SESSION['id']))
    {
        header("Location: index.php");
    }
    else{
?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" media="all">
 	<title>Cryptoblog</title>
 </head>
 <body>
 <nav id="monNav" class="intro" style='text-align:center'>
 <a href="#" id="burger" onclick="afficheMenu()"><div id="carre"><div id="menu">Menu</div></div></a>
            <ul>
                <li><a href="http://127.0.0.1:8000/">Home</a></li>
                <li><a href="http://127.0.0.1:8000/actualites/">Listes des Posts</a></li>
                <li><a href="http://127.0.0.1:8000/actualites/article/ajouter">Ecrire un post</a></li>
                <li><a href="http://localhost/SONDAGE/">Sondage</a></li>
                <li><a href="http://localhost:3000" target="_blank">Crypto Chat</a></li>
            </ul>
        </nav>
        <h1 style='text-align:center; display:inline-block'><a href="http://127.0.0.1:8000/" style="text-decoration: none;color:black;">Crypto blog</a><img src="image/bitcoin.png" class="img"></h1>
           <div style="float:right">
    		<a href="deconnexion.php">Déconnexion</a>
		</div>
 		<div class="container" style="margin-top: 100px">
        <div class="card" style="text-align: center;">
        	<div class="card-header">
        		<h1>Votez!!!</h1>
        	</div>
        	<div class="card-body" id="d">
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
 		$reqQ=$bdd->prepare("SELECT * from vote ");
        $reqQ->execute();
        $resQ=$reqQ->fetch(PDO::FETCH_ASSOC);
        if ($resQ<1) {
          echo "<center>Pas de sondage en ce moment. Revenez plus tard.<br>
                <a href=\"sondage.php\">Retour Page Principale</a></center>";
        }
        else{
        $req=$bdd->prepare("SELECT COUNT(resultat) as re FROM resultat");
        $req->execute();
        $res=$req->fetch(PDO::FETCH_ASSOC);

       echo"A la question, ".$resQ['question']."<br>";
        if ($res['re']<1) {
            echo " Personne n'a voté pour ce sondage <br>";
          }
          else{
       echo "Il y a eut ".$res['re']." vote(s) <br>";

       $reqtotal1=$bdd->prepare("SELECT vote.reponse1, COUNT(resultat.resultat) as re1 from vote, resultat where resultat = reponse1 ");
       $reqtotal1->execute();
       $reqtot1= $reqtotal1->fetch(PDO::FETCH_ASSOC);
       $reqtotal2=$bdd->prepare("SELECT vote.reponse2, COUNT(resultat.resultat) as re2 from vote, resultat where resultat = reponse2 ");
       $reqtotal2->execute();
       $reqtot2= $reqtotal2->fetch(PDO::FETCH_ASSOC);
       $reqtotal3=$bdd->prepare("SELECT vote.reponse3, COUNT(resultat.resultat) as re3 from vote, resultat where resultat = reponse3 ");
       $reqtotal3->execute();
       $reqtot3= $reqtotal3->fetch(PDO::FETCH_ASSOC);
      

       $Pourcent1 = ($reqtot1['re1']*100)/$res['re'];
       $Pourcent1 = round ($Pourcent1);
       echo"".$resQ['reponse1'].": ".$Pourcent1.'% <br>';
      $Pourcent2 = ($reqtot2['re2']*100)/$res['re'];
       $Pourcent2 = round ($Pourcent2);
       echo"".$resQ['reponse2'].": ".$Pourcent2.'% <br>';
       $Pourcent3 = ($reqtot3['re3']*100)/$res['re'];
       $Pourcent3 = round ($Pourcent3);
       echo''.$resQ['reponse3'].": ".$Pourcent3.'% <br>';
   }}
          $reqres=$bdd->prepare("SELECT utilisateur_idutilisateur from resultat where utilisateur_idutilisateur= :id");
          $reqres->execute(['id'=>$_SESSION['id']]);
           $resres=$reqres->fetchAll(PDO::FETCH_ASSOC);

              if ($resres) {
                echo "<center>Vous avez déjà pris part au sondage</center>";
                  }
                  else{
$reqvote = $bdd->prepare("SELECT * FROM vote");
$reqvote->execute();
//(print_r($reqvote->errorInfo()));
foreach ($reqvote as $i) {
?>
    <center> <form method="post" enctype="multipart/form-data" action="vote-valid.php">
        <table><div id= "sond">
          <tr>
            <td>Question</td>
            <td><?php echo $i['question'];?></td>
            <td></td>
          </tr>
          <tr><div id="choix">
            <td><label>Proposition 1: </label></td>
            <td><label><?php echo $i['reponse1'];?></label></td>
            <td><input type="radio" name="choix" value="<?php echo $i['reponse1']; ?>"></td>
          </tr>
          <tr>
            <td><label>Proposition 2: </label></td>
            <td><label><?php echo $i['reponse2'];?></label></td>
            <td><input type="radio" name="choix" value="<?php echo $i['reponse2']; ?>"></td>
          </tr>
          <tr>
            <td><label>Proposition 3: </label></td>
            <td><label><?php echo $i['reponse3'];?></label></td>
            <td><input type="radio" name="choix" value="<?php echo $i['reponse3']; ?>"></td>
          </tr></div>
          <tr>
          <td></td>
          <td><?php  echo "<input type='hidden' name ='hid' value='".$i['idvote']."'>"; ?></td>
          <td><input type="submit" name="valider"></td>
          </tr>
        </div></table>
      </form></center>
    </div>

  </div>

</div>
<script> 
                    function afficheMenu() {
    let letNav = window.document.getElementById("monNav");

    if (letNav.className === "ouvreMenu") {
        letNav.className += " fermeMenu";
    } else {
        letNav.className = "ouvreMenu";
    }
}
</script>
<?php }}
}
?>


  