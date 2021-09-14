<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" media="all">
	<title>Cryptoblog</title>
	<script>
            function verif(){
                    if(document.getElementById("p1").value != document.getElementById("p2").value)
                        document.getElementById("err").innerHTML = "<p style='color:red'>Erreur</p>";
                     else
                        document.getElementById("err").innerHTML = "<p style='color:blue'>Ok</p>";
                        }
    </script>
</head>
<body>
	<?php
    require_once("base.php");
        ?>
	 	<header>
 			
	</header>
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
 		<div class="container" style="margin-top: 100px">
        <div class="card" style="text-align: center;">
    
			<h1 style='text-align:center; display:inline-block'><a href="http://127.0.0.1:8000/" style="text-decoration: none;color:black;">Crypto blog</a><img src="image/bitcoin.png" class="img"></h1>
        	<div class="card-body">
				<center>
						<div style="margin-top: 80px" id="d">
							<form method="post" enctype="multipart/form-data" action="inscription-validation.php">
								<table>
									<tr>
										<td><label>Identifiant/Login</label></td>
										<td><input type="text" id="log" name="log" size="60" maxlength="55" required></td>	
									</tr>
									<tr>
										<td><label>Nom</label></td>
										<td><input type="text" id="nom" name="nom" size="60" maxlength="55" required></td>	
									</tr>
									<tr>
										<td><label>Prénom</label></td>
										<td><input type="text" id="prenom" name="prenom" size="60" maxlength="55" required></td>	
									</tr>
									<tr>
										<td><label>E-mail</label></td>
										<td><input type="text" id="mail" name="mail" size="60" maxlength="55" required></td>	
									</tr>
									<tr>
                                        <td><label>Mot de passe</label></td>
                                        <td><input id="p1" name="p1" type="password" size="60"></td>
                                    </tr>
                                    <tr>
                                         <td><label>Verification mot de passe</label></td>
                                         <td><input id="p2" name="p2" type="password" onkeyup="verif()" size="60"></td>
                                    </tr>
                                    <tr>
                                    	<td><div id="err"></div></td>
                                    	<td><input type="reset">
                                    		<input type="submit"></td>
                                     </tr>
								</table>
							</form>

						</div>
				</center>	
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
</body>
	