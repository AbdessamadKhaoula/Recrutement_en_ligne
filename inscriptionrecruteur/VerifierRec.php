<?php
 include "../connexion.php";


if (isset($_POST['mail']) && isset($_POST['mdp'])) {
  $mail = $_POST['mail'];
  $mdp =$_POST['mdp'];

  $stmt = $conn->prepare('SELECT * FROM recruteurs WHERE mailRecruteur = ?');
  $stmt->execute([$mail]);

  $candidat=$stmt->fetch();
  if ($candidat){
    $passHash=$candidat['passwordRecruteur'];

  if(password_verify($mdp,$passHash)) {
   
  header('location:../Offre_Form/annonce.php');

  } else {
    header('Location: index.php');
  }
}
}
?>