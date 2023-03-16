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
        <title>Sign Up</title>

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
                    <li>
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
            <div class="container">
                <div class="form login">
                     <span class="title">Creér un compte</span>
 
                     <form method="post" action="#">
                         <div class="input-field">
                             <input type="text" placeholder="enter ton prénom" required>
                             <i class="uil uil-user"></i>
                         </div>
                         <div class="input-field">
                             <input type="text" placeholder="enter ton nom" required>
                             <i class="uil uil-user"></i>
                         </div>
 
                         <div class="input-field">
                             <input type="email" placeholder="enter ton email" required>
                             <i class="uil uil-envelope icon1"></i>
                         </div>
 
                         <div class="input-field">
                             <input type="password" placeholder="enter le mdp" required>
                             <i class="uil uil-lock icon1"></i>
                             
                         </div>
 
                         <div class="input-field">
                             <input type="password" placeholder="confirmer le mdp" required>
                             <i class="uil uil-lock icon1"></i>
                         </div>
                         <!--<div class="chekbox-text">
                             <div class="checkbox-content">
                                 <input type="checkbox" id="logCheck1">
                                 <label for="logCheck1" class="text">Remember me</label>
                             </div>-->
 
                             <a href="#" class="text">Mot de passe oublié</a>
                     <!--   </div>--> 
 
                         <div class="input-field button">
                             <input type="submit" value="Sign up now" >
                            
                         </div>
 
 
                     </form>
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