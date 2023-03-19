<?php
	$mail=$_POST["mail"];
	$tel=$_POST["tele"];
	$adresse=$_POST["adresse"];
    $score=$_POST["score"];
    $domaine=$_POST["domaine"];
	$categorie=$_POST["categorie"];
	$duree=$_POST["dureeExp"];

    
	include("../connexion.php");


    $req=$conn->prepare("select id from candidatcv where mail=? limit 1");
	$req->setFetchMode(PDO::FETCH_ASSOC);
	$req->execute(array($mail));
	$tab=$req->fetchAll();
	if(count($tab)==0){

    //insertion des candidats
    $ins=$conn->prepare("insert into  candidatcv(mail,tel,adresse,score,domaine,categorie,dureeExp)  values(?,?,?,?,?,?,?)");
    $ins->execute(array($mail,$tel,$adresse,$score,$domaine,$categorie,$duree));


    //insertion des autres champs avec une cle etrangere "idcandidat"

    if($ins){
        $stmt=$conn->prepare("select * from Candidatcv where mail=? ");
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(array($mail));
        $res=$stmt->fetchAll();
        $id=$res[0]['id'];

        echo ($id);

        // Récupération les formations
            
        $nomFor=$_POST['formation_nom'];
        $etab=$_POST['etablisement'];
        $datesDebutFor=$_POST['dateDebutFor'];
        $datesFinFor=$_POST['dateFinFor'];

        for ($i = 0; $i < count($nomFor); $i++) {
            $nom_i = $nomFor[$i];
            $etab_i = $etab[$i];
            $dateDebut_i = $datesDebutFor[$i];
            $dateFin_i = $datesFinFor[$i];

            $stmt = $conn->prepare("INSERT INTO formations (nomForation,etablisement,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?)");
            $stmt->execute([$nom_i, $etab_i, $dateDebut_i, $dateFin_i,$id]);
        }
        //Récupération des experiences
        $nomexp=$_POST['exp_nom'];
        $societes=$_POST['societe'];
        $types=$_POST['type'];
        $datesDebutexp=$_POST['dateDebutExp'];
        $datesFinexp=$_POST['dateFinExp'];

        for ($i = 0; $i < count($nomexp); $i++) {
            $nom_i = $nomexp[$i];
            $societe_i = $societes[$i];
            $type_i = $types[$i];
            $dateDebut_i = $datesDebutexp[$i];
            $dateFin_i = $datesFinexp[$i];

            $stmt = $conn->prepare("INSERT INTO experiences (nomExp,societe,type,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?,?)");
            $stmt->execute([$nom_i, $societe_i, $type_i, $dateDebut_i, $dateFin_i,$id]);
        }

         // Récupération des competences
            
         $nomcomp=$_POST['competences'];

         for ($i = 0; $i < count($nomcomp); $i++) {
             $nom_i = $nomcomp[$i];
 
             $stmt = $conn->prepare("INSERT INTO competences(nom,idCandidat)   VALUES (?,?)");
             $stmt->execute([$nom_i,$id]);
         }

    }
   }

?>