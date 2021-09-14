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
		<div style="float:right;";>
    		<a href="deconnexion.php">Déconnexion</a>
		</div>
		<div class="container" style="margin-top: 100px">
        <div class="card" style="text-align: center;">
        	
			<div class="card-body">
					<a href="participation.php"> Participez à un sondage</a></br>
					<a href="creation.php">Créer un sondage</a>
			</div>
		</div>
	</div>
	<?php
}}
?>
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