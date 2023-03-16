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
        <title>login</title>

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
                    <form method="post" action="Verifier.php">
                        <div class="input-field">
                            <input type="email" placeholder="Enter ton mail" name="mail"value="<?php if(isset($_COOKIE['mail'])) echo $_COOKIE['mail'];?>" required>
                            <i class="uil uil-envelope icon1"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="Enter le mot de passe" name="mdp" value="<?php if(isset($_COOKIE['mdp'])) echo $_COOKIE['mdp'];?>" required>
                            <i class="uil uil-lock icon1"></i>
                        </div>
                        

                        <div class="input-field button">
                            <button type="submit">Login now</button>
                           
                        </div>
                        <div>
                            <input type="checkbox" name="check" id="check">
                            <label for="check">se souvenir de moi</label>
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="SignUp.php" class="text signup-text"> Sign up new</a>
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