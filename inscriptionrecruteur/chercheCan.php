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
                </span>
                </h1>
                <br>


                <h5>Le classement des candidats:</h5>
                <hr>
                <form action="" method="POST">
                    <input type="text" name="domaine" placeholder="enter le domaine" >
                    <input type="text" name="categorie" placeholder="enter la categorie" >
                    <input type="submit" id="chercher" name="valider" value="Chercher" >
                </form>

                <br>
                <?php
                  if(isset($valider)){
                    include("../connexion.php");
                    $dom=$_POST['domaine'];
                    $cat=$_POST['categorie'];
                    $res=$conn->prepare("select * from candidatcv where domaine=? and categorie=? order by
                    score ,dureeExp desc");
                    $res->setFetchMode(PDO::FETCH_ASSOC);
                    $res->execute(array($dom,$cat));
                    $tab=$res->fetchAll();

                    ?>
                    <table>
                        <tr>
                            <th>E-mail</th>
                            <th>Tele</th>
                            <th>Adresse</th>
                            <th>Score</th>
                            <th>Domaine</th>
                            <th>Categorie</th>
                            <th>Duree d'experiences</th>
                        </tr>
                    <?php
                        foreach($tab as $row){ ?>
                        <tr>
                            <td><?php echo $row['mail'] ?></td>
                            <td><?php echo $row['tel'] ?></td>
                            <td><?php echo $row['adresse'] ?></td>
                            <td><?php echo $row['score'] ?></td>
                            <td><?php echo $row['domaine'] ?></td>
                            <td><?php echo $row['categorie'] ?></td>
                            <td><?php echo $row['dureeExp'] ?></td>
                        </tr>
                    
                    <?php } ?>
                    </table>
                    <?php    
                  }
                ?>
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