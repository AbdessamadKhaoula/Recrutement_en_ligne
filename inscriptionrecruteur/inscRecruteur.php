<?php
  include "../connexion.php";
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['mail'];
  $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
  
  $sql="INSERT INTO recruteurs(nomRecruteur,prenomRecruteur,mailRecruteur,passwordRecruteur)  
  VALUES ('$nom', '$prenom', '$mail', '$mdp')";

  $conn->query($sql);
  header('location:../Offre_Form/annonce.php');

?>