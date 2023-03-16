<?php  

session_start();

$_SESSION['mail'] = $_POST['mail'];

if(isset($_POST['check'])){
	setcookie('mail', $_SESSION['mail'], time() + 365*24*3600, null, null, false, true);
	setcookie('mdp', $_POST['mdp'], time() + 365*24*3600, null, null, false, true);
}


header('location:../Formulaire_CV/Candidat_CV.php');




?>