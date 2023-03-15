<?php
  require_once('../connexion.php');
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['mail'];
  $mdp=$_POST['mdp'];

  $sql="INSERT INTO candidats(NomCandidat,PrenomCandidat,MailCandidat,PasswordCandidat)  
  VALUES ('$nom', '$prenom', '$mail', PASSWORD('$mdp'))";

  $conn->query($sql);


?>