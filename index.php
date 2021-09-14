<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" media="all">
	<title>Voter c'est facile</title>
</head>
<body>
	<?php
            if(isset($_GET['err']))
                $err = $_GET['err'];
                else
                $err = -1;

            if(isset($_GET['mail']))
                $monMail = $_GET['mail'];
            else
                $monMail="0";
        ?>
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
	 <div class="container">
		<center>
				<div style="margin-top: 100px" id="d">
					<form method="post" enctype="multipart/form-data" action="connexion.php">
						<table>
							<tr>
								<td><label>Identifiant</label></td>
								<td><input type="text" id="ndc" name="ndc" size="20" maxlength="55" required></td>	
							</tr>
							<tr>
								<td><label>Mot de passe</label></td>
								<td><input type="password" id="mdp" name="mdp"  size="20" maxlength="55" required></td>
								<td><input type="submit"></td>
							</tr>
							<tr>
								<td><a href="inscription.php">Inscription</a></td>
								<td><a href="mdprecovery.php">Mot de passe oublié ?</a></td>
							</tr>
						</table>
					</form>

				</div>
		</center>	
	 <script>
         function afficheMenu() {
    let letNav = window.document.getElementById("monNav");

    if (letNav.className === "ouvreMenu") {
        letNav.className += " fermeMenu";
    } else {
        letNav.className = "ouvreMenu";
    }
}
            function show()
            {
                let span = document.getElementById("s");
                span.parentNode.removeChild(span);
                let button = document.getElementById("b");
                button.parentNode.removeChild(button);
                let div = document.getElementById("d");
                div.style.display = "block";
            }
            let erreur = <?php print $err; ?>;
            let monMail = <?php echo json_encode($monMail); ?>;
            
            function verifLength(obj, taille)
            {
                if(obj.value.length > taille)
                {
                    if(document.getElementById("spanTaille") == null)
                    {
                        let monSpan = document.createElement("span");
                        monSpan.setAttribute('id', 'spanTaille');
                        monSpan.style.color = 'red';
                        monSpan.innerHTML = 'Le champ ne doit pas faire plus de '+taille+' caractères.';
                        let monBr = document.createElement("br");
                        obj.parentNode.appendChild(monBr);
                        obj.parentNode.appendChild(monSpan);
                    }
                }
            }
            
            let inputNdc = document.getElementById('ndc');
            inputNdc.addEventListener("keydown", function() {verifLength(this, 50);});
            
            if(erreur == 1)
            {
                var monDiv = document.getElementById("d");
                monDiv.style.display = "none";
                var monSpan = document.createElement("span");
                monSpan.setAttribute("id", "s");
                monSpan.innerHTML = "Echec de la connexion. Nom de compte ou mot de passe incorrect !";
                monDiv.parentElement.appendChild(monSpan);
                var monBr = document.createElement("br");
                monDiv.parentElement.appendChild(monBr);
                
               var monBoutton = document.createElement("button");
                monBoutton.setAttribute("id", "b");
                monBoutton.innerHTML = "Recommencer";
                monBoutton.setAttribute("type", "button");
                monBoutton.onclick = function() {show();};
                monBoutton.setAttribute("onclick", "show()");
                monDiv.parentElement.appendChild(monBoutton);
            }
            
            else if(erreur == 2)
            {
                var monDiv = document.getElementById("d");
                monDiv.style.display = "none";
                var monSpan = document.createElement("span");
                monSpan.setAttribute("id", "s");
                monSpan.innerHTML = "Erreur impossible de mettre le mot de passe a jour.";
                monDiv.parentElement.appendChild(monSpan);
                var monBr = document.createElement("br");
                monDiv.parentElement.appendChild(monBr);
                
                var monBoutton = document.createElement("button");
                monBoutton.setAttribute("id", "b");
                monBoutton.innerHTML = "Recommencer";
                monBoutton.setAttribute("type", "button");
                monBoutton.onclick = function() {show();};
                monBoutton.setAttribute("onclick", "show()");
                monDiv.parentElement.appendChild(monBoutton);
            }

            else if(erreur == 3)
            {
                var monSpan = document.createElement("span");
                monSpan.setAttribute("id", "s");
                monSpan.innerHTML = "Consulter le mail envoyé à "+monMail+" pour mettre a jour votre mot de passe";
                document.getElementById("d").appendChild(monSpan);                
                
            }

             else if(erreur == 4)
            {
                var monSpan = document.createElement("span");
                monSpan.setAttribute("id", "s");
                monSpan.innerHTML = "Veuillez vous connecter avec vos identifiants que vous venez d'enregistrer";
                document.getElementById("d").appendChild(monSpan); 
                }   
        </script>				 
</div>				 
</body>
</html>