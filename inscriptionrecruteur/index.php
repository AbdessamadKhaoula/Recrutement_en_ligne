<?php
	session_start();
	@$mail=$_POST["email"];
	@$mdp=$_POST["pass"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		include("../connexion.php");
		$res=$conn->prepare("select * from Recruteurs where mailRecruteur=? and passwordRecruteur=? limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($mail,md5($mdp)));
		$tab=$res->fetchAll();
		if(count($tab)==0)
			$message="<li>Mauvais mail ou mot de passe!</li>";
		else{
			$_SESSION['mail']=$_POST["email"];
			$_SESSION["Rec"]=strtoupper($tab[0]["nomRecruteur"]." ".$tab[0]["prenomRecruteur"]);
            if(isset($_POST['check'])){
                setcookie("mail",$_SESSION['mail'],time()+365*24*3600);
                setcookie("mdp",$_POST['pass'],time()+365*24*3600);
            }
			header("location:session.php");
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
        <title>Espace Recreteurs</title>

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
                    <li >
                        <a href="index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
        <img src="../imgs/ImgRec.png" alt="recrutementImage">
        <section>
            <h1>Espace Recreteurs</h1>
            <div class="container">
                <div class="form login">
                    <span class="title">Se connecter</span>
                    <form method="post" action="">
                        <div class="input-field">
                            <input type="email" placeholder="Enter ton mail" name="email" value="<?php if(isset($_COOKIE['mail'])) echo $_COOKIE['mail'] ; ?>" required>
                            <i class="uil uil-envelope icon1"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="Enter le mot de passe" name="pass" value="<?php if(isset($_COOKIE['mdp'])) echo $_COOKIE['mdp'] ; ?>" required>
                            <i class="uil uil-lock icon1"></i>
                        </div>

                        <div class="input-field button">
                            <input type="submit" name="valider" value="Login now" >
                        </div>
                        <div>
                            <input type="checkbox"  id="check" name="check">
                            <label for="check">se souvenir de moi</label>
                        </div>
                    </form>
                    <?php if(!empty($message)){ ?>
                    <div id="message"><?php echo $message ?></div>
                    <?php } ?>
                    <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="Sign.php" class="text signup-text"> Sign up now</a>

                    </span>
                    </div>
                </div>
            </div>
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