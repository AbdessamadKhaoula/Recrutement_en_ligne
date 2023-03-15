<?php
require_once('../connexion.php');


if (isset($_POST['mail']) && isset($_POST['mdp'])) {
  $mail = $_POST['mail'];
  $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare('SELECT MailCandidat, PasswordCandidat FROM candidats WHERE MailCandidat = ? AND PasswordCandidat = ?');
  $stmt->execute([$mail, $mdp]);

  
  if ($stmt->rowCount() == 1) {
    
    header('Location:../Formulaire_CV/Candidat_CV.php');
    exit;
  } else {
    header('Location: SignUp.html');
  }
}
?>