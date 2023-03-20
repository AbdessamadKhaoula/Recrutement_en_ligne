<?php

    session_start();
    if(!isset($_SESSION["mail"])){
        header("location:../InscriptionCandidat/index.php");
    }


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
        $tr=$conn->prepare("select * from Candidatcv where mail=? ");
		$tr->setFetchMode(PDO::FETCH_ASSOC);
		$tr->execute(array($mail));
        $res=$tr->fetchAll();
        $id=$res[0]['id'];


        // Récupération les formations
            
        $nomFor=$_POST['formation_nom'];
        $etab=$_POST['etablisement'];
        $datesDebutFor=$_POST['dateDebutFor'];
        $datesFinFor=$_POST['dateFinFor'];

        if(!empty($nomFor) && !empty($etab) && !empty($datesDebutFor) && !empty($datesFinFor) ){
        for ($i = 0; $i < count($nomFor); $i++) {
            $nom_i = $nomFor[$i];
            $etab_i = $etab[$i];
            $dateDebut_i = $datesDebutFor[$i];
            $dateFin_i = $datesFinFor[$i];

            $stmt = $conn->prepare("INSERT INTO formations (nomForation,etablisement,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?)");
            $stmt->execute([$nom_i, $etab_i, $dateDebut_i, $dateFin_i,$id]);
        }}
        //Récupération des experiences
        $nomexp=$_POST['exp_nom'];
        $societes=$_POST['societe'];
        $types=$_POST['type'];
        $datesDebutexp=$_POST['dateDebutExp'];
        $datesFinexp=$_POST['dateFinExp'];

        if(!empty($nomexp) && !empty($societes) && !empty($types) && !empty($datesDebutexp) && !empty($datesFinexp) ){
        for ($i = 0; $i < count($nomexp); $i++) {
            $nom_i = $nomexp[$i];
            $societe_i = $societes[$i];
            $type_i = $types[$i];
            $dateDebut_i = $datesDebutexp[$i];
            $dateFin_i = $datesFinexp[$i];

            $stmt = $conn->prepare("INSERT INTO experiences (nomExp,societe,type,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?,?)");
            $stmt->execute([$nom_i, $societe_i, $type_i, $dateDebut_i, $dateFin_i,$id]);
        }}

         // Récupération des competences
            
         $nomcomp=$_POST['competences'];
         if(!empty($nomcomp)){
         for ($i = 0; $i < count($nomcomp); $i++) {
             $nom_i = $nomcomp[$i];
 
             $stmt = $conn->prepare("INSERT INTO competences(nom,idCandidat)   VALUES (?,?)");
             $stmt->execute([$nom_i,$id]);
         }}
         header("location:../InscriptionCandidat/session.php");
    }
   }else{
    $ins=$conn->prepare("update  candidatcv set tel=?,adresse=?,score=?,domaine=?,categorie=?,dureeExp=? where mail=?  ");
    $ins->execute(array($tel,$adresse,$score,$domaine,$categorie,$duree,$mail));


    if($ins){
        $tr=$conn->prepare("select * from Candidatcv where mail=? ");
		$tr->setFetchMode(PDO::FETCH_ASSOC);
		$tr->execute(array($mail));
        $res=$tr->fetchAll();
        $id=$res[0]['id'];

        //Suppression des infos precedantes

        $ins1=$conn->prepare("delete from experiences where idCandidat=?  ");
        $ins1->execute(array($id));

        $ins1=$conn->prepare("delete from formations where idCandidat=?  ");
        $ins1->execute(array($id));

        $ins1=$conn->prepare("delete from competences where idCandidat=?  ");
        $ins1->execute(array($id));

        // Récupération des nouvelles formations
            
        $nomFor=$_POST['formation_nom'];
        $etab=$_POST['etablisement'];
        $datesDebutFor=$_POST['dateDebutFor'];
        $datesFinFor=$_POST['dateFinFor'];

        
        if(!empty($nomFor) && !empty($etab) && !empty($datesDebutFor) && !empty($datesFinFor) ){
        for ($i = 0; $i < count($nomFor); $i++) {
            $nom_i = $nomFor[$i];
            $etab_i = $etab[$i];
            $dateDebut_i = $datesDebutFor[$i];
            $dateFin_i = $datesFinFor[$i];

            $stmt = $conn->prepare("INSERT INTO formations (nomForation,etablisement,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?)");
            $stmt->execute([$nom_i, $etab_i, $dateDebut_i, $dateFin_i,$id]);
        }}
        //Récupération des nouvelles experiences
        $nomexp=$_POST['exp_nom'];
        $societes=$_POST['societe'];
        $types=$_POST['type'];
        $datesDebutexp=$_POST['dateDebutExp'];
        $datesFinexp=$_POST['dateFinExp'];

        if(!empty($nomexp) && !empty($societes) && !empty($types) && !empty($datesDebutexp) && !empty($datesFinexp) ){

        for ($i = 0; $i < count($nomexp); $i++) {
            $nom_i = $nomexp[$i];
            $societe_i = $societes[$i];
            $type_i = $types[$i];
            $dateDebut_i = $datesDebutexp[$i];
            $dateFin_i = $datesFinexp[$i];

            $stmt = $conn->prepare("INSERT INTO experiences (nomExp,societe,type,dateDebut,dateFin,idCandidat)   VALUES (?,?,?,?,?,?)");
            $stmt->execute([$nom_i, $societe_i, $type_i, $dateDebut_i, $dateFin_i,$id]);
        }}

         // Récupération des nouvelles competences
            
         $nomcomp=$_POST['competences'];

         if(!empty($nomcomp)){
         for ($i = 0; $i < count($nomcomp); $i++) {
             $nom_i = $nomcomp[$i];
 
             $stmt = $conn->prepare("INSERT INTO competences(nom,idCandidat)   VALUES (?,?)");
             $stmt->execute([$nom_i,$id]);
         }}
         
   }
   header("location:../InscriptionCandidat/session.php");
   }
   
?>