<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" media="all">
	<title>Votez c'est facile</title>
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
		<h1 style='text-align:center;display:block'><a href="http://127.0.0.1:8000/" style="text-decoration: none;color:black;">Crypto blog</a><img src="image/bitcoin.png" class="img"></h1>
        <div style="margin-top: 150px;">
            <center>
	            <form method='post' enctype="multipart/form-data" action='envoi-mail.php'>
	                <tr>
	                	<td><label>Adresse e-mail</label></td>
	                	<td><input name="mel" type="email"></td>
	                	<td><input type=submit></td>
	                </tr>
	            </form>
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
</html>