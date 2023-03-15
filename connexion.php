<?php
   // Connexion à la base de données MySQL
   $host = "localhost";
   $dbname = "recrutement_en_ligne";
   $username = "root";
   $password = "";

  try{
    $str="mysql:host=$host;dbname=$dbname";
    $conn = new PDO($str, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
  }catch(PDOException $e){
    die('Erreur:'.$e->getMessage());

  }

?>