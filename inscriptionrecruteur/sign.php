<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$mail=$_POST["mail"];
	@$pass=$_POST["mdp"];
	@$repass=$_POST["mdp1"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li>Non vide!</li>";
		if(empty($prenom)) $message.="<li>Prénom vide!</li>";
		if(empty($mail)) $message.="<li>mail vide!</li>";
		if(empty($pass)) $message.="<li>Mot de passe vide!</li>";
		if($pass!=$repass) $message.="<li> vérifier le mot de passe </li>";	
		if(empty($message)){
			include("../connexion.php");
            $req=$conn->prepare("select idRecruteur from Recruteurs where mailRecruteur=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$tab=$req->fetchAll();
			if(count($tab)>0)
			     $message="<li>Mail existe déjà!</li>";
			else{
                $ins=$conn->prepare("insert into  Recruteurs(nomRecruteur,prenomRecruteur,mailRecruteur,passwordRecruteur)  values(?,?,?,?)");
                $ins->execute(array($nom,$prenom,$mail,md5($pass)));
                header("location:index.php");
            }
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
                        <a href="../inscriptionCandidat/index.php">Candidats</a>

                    </li>
                    <li id="active">
                        <a href="index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
        <section>
            <h1>Espace Recreteurs</h1>
            <div class="container">
                <div class="form login">
                     <span class="title">Créer un compte</span>
 
                     <form method="post" action="">
                         <div class="input-field">
                             <input type="text" placeholder="enter ton prénom" name="prenom" required>
                             <i class="uil uil-user"></i>
                         </div>
                         <div class="input-field">
                             <input type="text" placeholder="enter ton nom" name="nom"  required>
                             <i class="uil uil-user"></i>
                         </div>
 
                         <div class="input-field">
                             <input type="email" placeholder="enter ton email"name="mail"  required>
                             <i class="uil uil-envelope icon1"></i>
                         </div>
 
                         <div class="input-field">
                             <input type="password" placeholder="enter le mdp"name="mdp"  required>
                             <i class="uil uil-lock icon1"></i>
                             
                         </div>
 
                         <div class="input-field">
                             <input type="password" placeholder="confirmer le mdp" name="mdp1"  required>
                             <i class="uil uil-lock icon1"></i>
                         </div>
 
                         <div class="input-field button">
                            <input type="submit" name="valider" value="Login now" >
                        </div>
                    </form>
                    <?php if(!empty($message)){ ?>
                    <div id="message"><?php echo $message ?></div>
                    <?php } ?>
 
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