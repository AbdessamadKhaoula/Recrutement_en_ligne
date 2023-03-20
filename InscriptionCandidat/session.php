<?php
	session_start();
    $valider=$_POST['valider'];
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
        <title>Espace Candidats</title>
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
                        <a href="index.php">Candidats</a>

                    </li>
                    <li>
                        <a href="../inscriptionrecruteur/index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
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
                <?=$_SESSION["Can"]?>
                </span>!!
                </h1>
                <br>
                <ul class="pos">
                    <li>
                        <a class="btn1" href="../Formulaire_CV/Candidat_CV.php"> <strong>Remplir votre cv</strong></a>
                    </li>
                    <li>
                    <form action="" method="POST">
                    <select name="domaine"  required>
                    <?php
                    // Connexion à la base de données MySQL
                        require_once('../connexion.php');
                        $res=$conn->query('SELECT *FROM Domaines');
                        $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row) { ?>
                        <option value="<?php echo $row['NomDomaine'];?>" >
                            <?php echo $row['NomDomaine'];?>
                        </option>
                            <?php }
                        ?>
                    </select>
                        <input type="submit" id="chercher" name="valider" value="Chercher" >
                    </form>
                    </li>
                </ul>
                <br>
                <p class="offre">Voici les annonces:</p>
                <?php 
                    include("../connexion.php");
                    if(isset($valider)){
                        $dom=$_POST['domaine'];
                        $sql="SELECT *from annonce where domaine=? ";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute([$dom]);}
                    else{
                        include("../connexion.php");
                        $sql="SELECT *from annonce ";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute();

                    }
                       $resultat=$stmt->fetchAll();

                       foreach($resultat as $row){
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
                    <?php }?>
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