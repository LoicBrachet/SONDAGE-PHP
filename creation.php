<?php
	 session_start();
	 if(!isset($_SESSION['id']))
    {
        header("Location: index.php");
    }
    else{
        if($_SESSION['grade']!=1)
            header("Location: participation.php");
        else{
        require_once("base.php");
        try{
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
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
 		<a href="sondage.php">retour page principale</a>
 		<div class="container" style="margin-top: 100px">
        <div class="card" style="text-align: center;">
        	<div class="card-header">
        		<h1>Créer un vote</h1>
        	</div>
        	<div class="card-body">
        			<form method="post" enctype="multipart/form-data" action="crea-valid.php">
						<table>
							<tr>
								<td><label>Posez la question que vous voulez soumettre au vote</label></td>
								<td><textarea id="qap" name="qap" rows="2" cols="48"required></textarea></td>	
							</tr>
							<tr>
								<td><label>Réponse 1</label></td>
								<td><input type="text" id="r1" name="r1" size="50" required></td>
							</tr>
							<tr>
								<td><label>Réponse 2</label></td>
								<td><input type="text" id="r2" name="r2" size="50" required></td>
							</tr>
							<tr>
								<td><label>Réponse 3</label></td>
								<td><input type="text" id="r3" name="r3" size="50" required></td>
							</tr>
							<tr>
							<tr>
								<td></td>
								<td><input type="submit" name="valider"><input type="reset" name="reset"></td>
							</tr>
						</table>
					</form>
                     <?php  $reqvote = $bdd->prepare("SELECT * FROM vote");
                    $reqvote->execute();
                    foreach ($reqvote as $i) {
                    ?>
                    <table>
                        <tr>
                            <td>Sondage en cours</td>
                        </tr>
                        <tr>
                            <td>Question</td>
                        <td><?php echo $i['question'];?></td>
                        </tr>
                        <tr>
                        <td>Proposition 1: </td>
                        <td><?php echo $i['reponse1'];?></td>
                        </tr>
                        <tr>
                        <td>Proposition 2: </td>
                        <td><?php echo $i['reponse2'];?></td>
                        </tr>
                        <td>Proposition 3: </td>
                        <td><?php echo $i['reponse3'];?></td>
                    </table>
                   <form action="sup.php" method="post">
                        <label>Supprimer le vote et ses résultats</label>
                        <button>Supprimer</button>
                    </form>

			</div>
		</div>
	</div>
    <script type="text/javascript">
       
                    function afficheMenu() {
    let letNav = window.document.getElementById("monNav");

    if (letNav.className === "ouvreMenu") {
        letNav.className += " fermeMenu";
    } else {
        letNav.className = "ouvreMenu";
    }
}

		 function verifLength(obj, taille)
            {
                if(obj.value.length > taille)
                {
                    if(document.getElementById("spanTaille") == null)
                    {
                        var monSpan = document.createElement("span");
                        monSpan.setAttribute('d', 'spanTaille');
                        monSpan.style.color = 'red';
                        monSpan.innerHTML = 'Le champ ne doit pas faire plus de '+taille+' caractères.';
                        var monBr = document.createElement("br");
                        obj.parentNode.appendChild(monBr);
                        obj.parentNode.appendChild(monSpan);
                    }
                }
            }
            
            var inputQap = document.getElementById('qap');
            inputQap.addEventListener("keydown", function() {verifLength(this, 120);});
            var inputR1 = document.getElementById('r1');
            inputR1.addEventListener("keydown",function() {verifLength(this, 55);});
            var inputR2 = document.getElementById('r2');
            inputR1.addEventListener("keydown",function() {verifLength(this, 55);});
            var inputR3 = document.getElementById('r3');
            inputR1.addEventListener("keydown",function() {verifLength(this, 55);});
	</script>
	<?php }}}
  ?>
 </body>
 </html>
 