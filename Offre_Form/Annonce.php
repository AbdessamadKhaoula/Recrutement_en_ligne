<?php
	session_start();
    
	if(!isset($_SESSION["mail"])){
		header("location:../inscriptionrecruteur/index.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>s'inscrire!</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="annonce.css">
        <link rel="stylesheet" href="../Formulaire_CV/navbar.css">
        <script src="https://kit.fontawesome.com/b356ad9dc8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../footer.css">
        <script src="Form.js"></script>
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
                        <a href="../inscriptionrecreteur/index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
                    </li>
                    <li>
                        <a href="../inscriptionrecruteur/deconnexion.php">Deconnecter</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
        <section>
            <div class="div1">
                <div class="div2">
                    <h1>Formulaire d'annonce</h1>
                </div>
                <form>
                    <table>
                       <tr>
                            <td>E-mail:</td>
                            <td>
                                
                                <input type="email" name="mail" required value="<?php  if(isset($_SESSION['mail'])) echo $_SESSION['mail'] ; ?>" required/>  
                            </td>
                        </tr>
                        <tr>
                            <td>Nom de la societé:</td>
                            <td><input type="text" name="societe" required></td>
                        </tr>
                        <tr>
                            <td>Emploi ou Stage?</td> 
                            <td>
                                <input type="text" name="type" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Domaine:</td>
                            <td>                           
                                <select name="domaine" id="domaine" required>
                                 <?php
                                    // Connexion à la base de données MySQL
                                     require_once('../connexion.php');
                                     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                     $res=$pdo->query('SELECT *FROM Domaines');
                                     $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                                       foreach($rows as $row) { ?>
                                       <option value="<?php echo $row['idDomaine'];?>">
                                         <?php echo $row['NomDomaine'];?>
                                       </option>
                                         <?php }
                                     ?>
                               </select>
                           </td>
                        </tr>
                        <tr>
                            <td>Catégorie:</td>
                            <td>
                                <select name="categorie" id="categorie" required>
                                    <?php
                                    $res=$pdo->query('SELECT *FROM Categories');
                                    $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($rows as $row) { ?>
                                    <option value="<?php echo $row['idCategorie'];?>">
                                        <?php echo $row['NomCategorie'];?>
                                    </option>
                                        <?php }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Réference:</td>
                            <td><input type="text" max="10" name="ref" required></td>
                        </tr>
                        <tr>
                            <td>Poste:</td>
                            <td><input type="text" required></td>
                        </tr>
                        <tr>
                            <td>Date de début:</td>
                            <td><input type="date" name="date" required></td>
                        </tr>
                        <tr>
                            <td>Plus d'informations?</td>
                            <td><textarea  id="text" cols="40" rows="5" placeholder="Description....." required></textarea>
                                <p id="indication"></p></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Enregistrer"></td>
                            <td><input type="reset" value="Annuler"></td>
                        </tr>
                    </table>
                </form> 
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

            var text=document.getElementById("text");
            var indication=document.getElementById("indication");
            var limit=300;
            indication.innerHTML= 0 + "/" + limit;
            text.addEventListener("input",function(){
            var textlenght=text.value.length;
            if(textlenght>limit){
                alert("vous avez depasse la longueur autorisee!");
                text.value=text.value.substring(0,limit);
                textlenght=textlenght-1;
            }
            indication.innerHTML=textlenght +"/" +limit;

            });
        </script>
    </body>
</html>