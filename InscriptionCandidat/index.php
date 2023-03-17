<?php
	session_start();
	@$mail=$_POST["mail"];
	@$mdp=$_POST["mdp"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		include("../connexion.php");
		$stmt = $conn->prepare('SELECT * FROM candidats WHERE mailCandidat = ?');
        $stmt->execute([$mail]);
        $candidat=$stmt->fetch();
        if ($candidat){ 
             $passHash=$candidat['passwordCandidat'];

            if(password_verify($mdp,$passHash)) {
		
                $_SESSION["autoriser"]="oui";
                $_SESSION["nomPrenom"]=strtoupper($tab[0]["nomCandidat"]." ".$tab[0]["prenomCandidat"]);
                header("location:session.php");
          }
        }
         else{
             $message="<li>Mauvais login ou mot de passe!</li>";
         }
	}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="style.css">
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
                </ul>
            </nav>
        </header>
        <main>
        <img src="../imgs/ImgCan.png" alt="recrutementImage">
        <section>
            <div class="container">
                <div class="form login">
                    <span class="title">Se connecter</span>
                    <form method="post" action="">
                        <div class="input-field">
                            <input type="email" placeholder="Enter ton mail" name="mail" required>
                            <i class="uil uil-envelope icon1"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="Enter le mot de passe" name="mdp"  required>
                            <i class="uil uil-lock icon1"></i>
                        </div>
                        

                        <div class="input-field button">
                            <button type="submit" name="valider">Login now</button>
                           
                        </div>
                        <div>
                            <input type="checkbox" id="check">
                            <label for="check">se souvenir de moi</label>
                        </div>
                    </form>
                    <?php if(!empty($message)){ ?>
                    <div id="message"><?php echo $message ?></div>
                    <?php } ?>
                    <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="SignUp.php" class="text signup-text"> Sign up now</a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        </main>
        
        <?php     include('../footer.php');  ?>
        <script>
            btn=document.querySelector(".BarBtn");
            btn.onclick=function(){
                navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }
        </script>

    </body>
</html>