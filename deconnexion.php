<?php
    session_start();
    $_SESSION["id"] = "-1";
    session_unset();
    session_destroy();
    setcookie("mdp","--", time()-1);
    header("Location: sondage.php");
?>