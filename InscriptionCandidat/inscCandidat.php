<?php
  include "../connexion.php";
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['mail'];
  $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
  

  $sql="INSERT INTO candidats(nomCandidat,prenomCandidat,mailCandidat,passwordCandidat)  
  VALUES ('$nom', '$prenom', '$mail', '$mdp')";

  $conn->query($sql);
  header('location:../Formulaire_CV/Candidat_CV.php');

?>