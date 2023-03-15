<?php
  require_once('../connexion.php');
  
  $mail=$_POST['mail'];
  $mdp=$_POST['mdp'];

  $res=$conn->query('SELECT MailCandidat,PasswordCandidat FROM candidats');
  $rows=$res->fetchAll(PDO::FETCH_ASSOC);
  $i=0;
  foreach($rows as $row) { 
    if($mail==$row['MailCandidat'] && $mdp==$row['PasswordCandidat']){ 
        $i=$i+1;
    exit;
    }
}
if($i==1){
    header('Location:SignUp.html');
}
else echo('error');

?>