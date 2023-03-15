<?php
   include("../connexion.php");
 
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $mail=$_POST['mail'];
    $tel=$_POST['tele'];
    $adresse=$_POST['adresse'];


    
   }
?>