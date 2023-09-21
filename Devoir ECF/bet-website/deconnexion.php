<?php 
    session_start();

    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["username"]);
    unset($_SESSION["email"]);
    unset($_SESSION["role"]);
    unset($_SESSION["connecte"]);

    header('Location: login.php');
?>