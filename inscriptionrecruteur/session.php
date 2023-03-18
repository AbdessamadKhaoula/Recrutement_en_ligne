<?php
	session_start();
	if(!isset($_SESSION["mail"])){
		header("location:index.php");
	}
?>
<!DOCYTPE html>
<html>
    <head>
        <title>Espace Candidat</title>
	</head>
	<body>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="style.css">
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
                        <a href="deconnexion.php">Deconnecter</a>
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
                <?=$_SESSION["nomPrenom"]?>
                </span>!!
                </h1>
                <ul>
                    <li>
                        <a class="CV" href="../Offre_Form/Annonce.php">Remplir vos annonces</a>
                    </li>
                </ul>
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