<?php
	session_start();
	if(!isset($_SESSION["mail"])){
		header("location:index.php");
	}
?>
<!DOCYTPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="../styleOffre.css">
        <link rel="stylesheet" href="../Formulaire_CV/navbar.css">
        <script src="https://kit.fontawesome.com/b356ad9dc8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../footer.css">
        <title>Espace Recruteur</title>
    </head>
    <body>
        <header>
            <div class="logo">RecruitNow</div>
            <div class="BarBtn">
                <div class="ligne"></div>
                <div class="ligne"></div>
                <div class="ligne"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    <li>
                        <a href="../index.php">Accueil</a>

                    </li>
                    <li>
                        <a href="../InscriptionCandidat/index.php">Candidats</a>

                    </li>
                    <li>
                        <a href="index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a id="active" href="#Contacts">Contacts</a>
                    </li>
                    <li>
                        <a href="deconnexion.php">Déconnecter</a>
                    </li>
                </ul>
            </nav>
        </header>
		<main>
            <section>
                <h1>
                <?php 
                    echo ("Bonjour");
                ?>
                <span>
                <?=$_SESSION["Rec"]?>
                </span>!!
                </h1>
                <br>
                <ul class="pos">
                    <li>
                        <a class="btn1" href="../Offre_Form/Annonce.php"> <strong>Créer une annonce</strong></a>
                    </li>
                    <li>
                       <a class="btn1" href="chercheCan.php"> <strong>Chercher les candidats</strong></a>
                    </li>
                </ul>
                <br>

                <p class="offre">Voici vos annonces:</p>
                <?php 
                       include("../connexion.php");
                       $sql="SELECT *from annonce";
                       $stmt=$conn->prepare($sql);
                       $stmt->execute();
                       $resultat=$stmt->fetchAll();

                       foreach($resultat as $row){
                        if($row['mail']==$_SESSION['mail']){
                        ?>
                        <div class="annonce">
                            <h3>La societé 
                        <?php echo($row['societe']); ?>        
                            </h3>
                            <p>  
                                Propose pour vous un ofrre <?php
                                 if($row['type']=="Stage") echo('de stage, ');
                                 else echo('d\'emploi, ');
                                 echo  "dans le domaine ".$row['domaine'].".";

                                ?>
                                <hr>
                                A partir du date : <?php
                                echo($row['dateDebut']);
                                ?>
                                <hr>
                                <i>
                                    <strong>Description d'offre: </strong>
                                    <br>
                                  <?php echo($row['description']); ?>  
                                </i>
                                <hr>
                                <h5>
                                    Le candidat doit avoir un diplome :
                                  <?php echo($row['categorie']); ?>  en  <?php echo($row['domaine']); ?>

                                </h5><hr>
                                <h4>
                                    Si vous etes interesse par cette offre, veuillez envoyer votre candidature a l'adresse 
                                    e-mail suivante:
                                    <b>
                                       <?php echo($row['mail']); ?>
                                    </b>
                                </h4>

                            </p>
                        </div><br><br>
                      <?php }}?>
            </section>
        </main>

        <?php     include('../footer.php');  ?>
        <script>src="script.js"</script>
        <script>
            btn=document.querySelector(".BarBtn");
            btn.onclick=function(){
                navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }
        </script>
	</body>
</html>