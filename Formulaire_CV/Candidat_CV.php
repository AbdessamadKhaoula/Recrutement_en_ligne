<!DOCTYPE html>
<html>
    <head>
        <title>s'inscrire!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Form.css">
        <link rel="stylesheet" href="navbar.css">
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
                        <a href="../index.html">Accueil</a>

                    </li>
                    <li>
                        <a href="../InscriptionCandidat/index.html">Candidats</a>

                    </li>
                    <li>
                        <a href="">Admin</a>

                    </li>
                    <li>
                        <a href="">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
        <section>
            <h2>Curriculum Vitae</h2>
            <br>
            <form method="post" action="cv.php">
                <fieldset>
                    <legend>Informations personnelles</legend>
  
                    <label for="nom">Nom: </label>   
                    <input type="text" name="nom" id="nom" required/> <br>    
                       
                    <label for="prenom">Prénom: </label>   
                    <input type="text" name="prenom" id="prenom" required/> <br>    
                      
                    <label for="mail">E-mail:</label>    
                    <input type="email" name="mail" id="mail" required/>  <br>   
                        
                    <label for="tele">Numéro de téléphone: </label>   
                    <input type="tel" name="tele" id="tele" required/> <br>    
                       
                    <label for="adresse">Adresse: </label>   
                    <input type="text" name="adresse" id="adresse" required/> <br>    
                       
                    <label for="profil">Profil:</label>  
                    <textarea id="profil" name="profil" cols="21" r="4"></textarea>  <br>

                    <label for="photo">Photo:</label>    
                    <input type="file" name="photo" id="photo" required/> <br>  
                </fieldset>
                <br>
                <div id="formations">
                    <fieldset >
                        <legend>Formations</legend>
                    
                        <label for="nomFor">Nom :</label>    
                        <input type="text" name="formation_nom[]" id="nomFor"><br>

                        <label for="etablisement">Nom d'établisement:</label>    
                        <input type ="text" id="etablisement" name="etablisement[]"/> <br>

                        <label for="dateDebut">Date de début:</label>    
                        <input type ="date" id="dateDebut" name="dateDebutFor[]"/> <br> 
                            
                        <label for="dateFin">Date de fin:</label>    
                        <input type ="date" id="dateFin" name="dateFinFor[]"/>  <br>     
                            
                        <button type="button" onclick="ajouterFormation()">Ajouter une formation</button>                        
                     </fieldset>
                </div>  
                <br>
                <div id="expriences">
                    <fieldset >
                        <legend>Expriences Professionnelles</legend>
                         
                        <label for="nomExp">Nom :</label>    
                        <input type="text" name="exp_nom[]" id="nomExp"> <br> 
                        
                        <label for="societe">Nom de la societe:</label>    
                        <input type ="text" id="societe" name="societe[]"/> <br>   
                         
                        <label for="type">Stage ou emploi?</label>    
                        <input type ="text" id="type" name="type[]"/><br>
                        
                        <label for="dateDebut">Date de début:</label>    
                        <input type ="date" id="dateDebut" name="dateDebutExp[]"/><br> 
                              
                        <label for="dateFin">Date de  fin:</label>    
                        <input type ="date" id="dateFin" name="dateFinExp[]"/> <br>   
                           
                        <button type="button" onclick="ajouterExprience()">Ajouter une exprience</button>  
                    </fieldset>
                </div>
                <br>
                <div id="Competences">
                    <fieldset>
                        <legend>Les Compétences</legend>
                        <label for="comp">Compétence :</label>    
                        <input type="text" name="competences[]" id="comp"> <br>   

                        <button type="button" onclick="ajouterCompetence()">Ajouter une  competence</button>      
                    </fieldset>
                </div>
                <br>
                <div id="Langues">
                    <fieldset>
                        <legend>Les Langues</legend>
                        <label for="langue">Langue :</label>    
                        <input type="text" name="langue[]" id="langue"> 
                        <br>   

                        <button type="button" onclick="ajouterLangue()">Ajouter une langue</button>      
                    </fieldset>
                </div>
                <br>
                <div id="Qualites">
                    <fieldset>
                        <legend>Les Qualités</legend>
                        <label for="qualite">Nom :</label>    
                        <input type="text" name="qualites[]" id="qualite"> <br>   

                        <button type="button" onclick="ajouterQualite()">Ajouter une qualite</button>      
                    </fieldset>
                </div>
                <br>
                <div id="score">
                    <fieldset>
                        <legend>Informations Supplémentaires</legend>
                        <?php
                           // Connexion à la base de données MySQL
                           $host = "localhost";
                           $dbname = "recrutement_en_ligne";
                           $username = "root";
                           $password = "";
  
                              $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                  $res=$pdo->query('SELECT *FROM Domaines');
                                  $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                         ?>
                         <div>
                           <label for="domaine">Le domaine:</label>
                           <select name="domaine" id="domaine" >
                                 <?php
                                       foreach($rows as $row) { ?>
                                       <option value="<?php echo $row['idDomaine'];?>">
                                         <?php echo $row['NomDomaine'];?>
                                       </option>
                                         <?php }
                                     ?>
                            </select>
                        </div>
                        <br>
                        <div>
                          <label for="categorie">La catégorie:</label>
                          <select name="categorie" id="categorie" >
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
                        </div>
                    </fieldset>
                </div>
                <br>
                <input type="submit" value="Envoyer">
                <input type="reset" value="Annuler">
            </form>
        </section>
        </main>
        <footer id="Contacts">
            <div class="main">
                <!-- Facebook Icon -->
                <div class="icon fb">
                    <i class="fa-brands fa-facebook-f"></i>
                    <a href="">Facebook</a>
                </div>
        
                <!-- Twitter Icon -->
                <div class="icon twt">
                    <i class="fa-brands fa-twitter"></i>
                    <a href="">Twitter</a>
                </div>
        
                <!-- Linkedin Icon -->
                <div class="icon lnk">
                    <i class="fa-brands fa-linkedin-in"></i>
                    <a href="">Linkedin</a>
                </div>
        
                <!-- GitHub Icon -->
                <div class="icon git">
                    <i class="fa-brands fa-github"></i>
                    <a href="">GitHub</a>
                </div>
        
                <!-- YouTube Icon -->
                <div class="icon yt">
                    <i class="fa-brands fa-youtube"></i>
                    <a href="">YouTube</a>
                </div>
            </div>
        </footer>
        
        <script>
            btn=document.querySelector(".BarBtn");
            btn.onclick=function(){
                navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }
        </script>
    </body>
</html>