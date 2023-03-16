<?php
 include "../connexion.php";


if (isset($_POST['mail']) && isset($_POST['mdp'])) {
  $mail = $_POST['mail'];
  $mdp =$_POST['mdp'];

  $stmt = $conn->prepare('SELECT * FROM candidats WHERE MailCandidat = ?');
  $stmt->execute([$mail]);

  $candidat=$stmt->fetch();
  if ($candidat && password_verify($mdp,$candidat['PasswordCandidat'])) {
    
    header('Location:connexionCan.php');
    exit;
  } else {
    header('Location: SignUp.php');
  }
}
?>