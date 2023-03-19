<head>
    <title>RecruitNow</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Accueil.css">
    <link rel="stylesheet" href="styleOffre.css">
    <link rel="stylesheet" href="Formulaire_CV/navbar.css">
    <script src="https://kit.fontawesome.com/b356ad9dc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="footer.css">

</head>
<body onload="banner()">
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
                    <a href="index.php">Accueil</a>

                </li>
                <li>
                    <a href="InscriptionCandidat/index.php">Candidats</a>

                </li>
                <li>
                    <a href="inscriptionrecruteur/index.php">Recreteurs</a>

                </li>
                <li>
                    <a href="#Contacts">Contacts</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1 id="titre"></h1>
            <br>
            <div class="container">
                
                <p>
                    <img src="imgs/index.png" alt="recrutementImage">
                     La plateforme de recrutement en ligne qui simplifie et accélère le processus
                     de recrutement pour les employeurs et les candidats. <br><br>
                    Notre entreprise a été créée avec la mission de rendre le recrutement plus efficace, 
                    plus équitable et plus transparent. Nous croyons que tout le monde mérite une chance 
                    égale de trouver l'emploi de ses rêves, et notre application de recrutement en ligne 
                    facilite cette recherche en connectant les meilleurs candidats aux meilleures offres d'emploi.
                    <br><br>
                    Avec des offres d'emploi mises à jour quotidiennement,
                     une CVthèque de qualité supérieure et des fonctionnalités de recrutement avancées.
                     <br><br>
                    <strong >RecruitNow </strong>est l'outil idéal pour les employeurs qui cherchent à trouver les meilleurs
                     talents et pour les candidats qui cherchent à trouver leur prochaine opportunité de carrière.
                      Explorez notre site dès maintenant pour découvrir comment RecruitNow peut vous aider 
                      à trouver l'emploi de vos rêves ou à recruter les meilleurs talents.
                </p>
            </div>
            <h1>Les Offres disponibles:</h1>
            <?php 
                include("connexion.php");
                $sql="SELECT *from annonce  ";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
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
    
    <?php     include('footer.php');  ?>
    <script>
        btn=document.querySelector(".BarBtn");
        btn.onclick=function(){
            navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }


        var str="Welcome To RecruitNow";
        var i=1;
        var right=true;
        function banner(){
            t=setTimeout("banner()",60);
            var title=document.getElementById("titre");
            title.innerHTML=str.substring(0,i);
            if(right){
                if(i<str.length)
                    i++;
                else right=false;
            }
            else{
                if(i>1)
                    i--;
                else right=true;
            }
        }
        </script>
    </body>
</html>
