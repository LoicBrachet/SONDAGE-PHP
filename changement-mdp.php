<?php
    require_once("base.php");
    try{
        $bdd = new PDO($dsn, $util, $pwd);
    }
    catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $code = $_GET["code"];

    if(isset($code))
    {
        ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" media="all">
        <title>Cryptoblog</title>
        <script>
            function verif(){
                 if(document.getElementById("p1").value != document.getElementById("p2").value)
                    document.getElementById("err").innerHTML = "<p style='color:red'>Erreur</p>";
                else
                    document.getElementById("err").innerHTML = "<p style='color:green'>Ok</p>";
            }
        </script>
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
                    <center>
                        <div style="margin-top:150px;" >
                            <form method="post" enctype="multipart/form-data" action="changement-mdp-validation.php">
                                <table>
                                    <tr>
                                        <td><label>Nouveau mot de passe</label></td>
                                        <td><input id="p1" name="p1" type="password"></td>
                                    </tr>
                                    <tr>
                                         <td><label>Verification mot de passe</label></td>
                                         <td><input id="p2" name="p2" type="password" onkeyup="verif()"></td>
                                    </tr>
                                    <tr>
                                        <td><div id="err"></div>
                                                <?php echo'<input value="'.$code.'" name="code" type="hidden">' ?></td>
                                        <td><input type="submit"></td>
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
</script>
                </body>
            </html>

            <?php          
    }
    else
        echo '<html><body><h1>Erreur <a href="sondage.php">retour à l\'accueil</a></h1></body></html>';

?>