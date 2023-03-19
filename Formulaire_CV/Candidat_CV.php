<?php
	session_start();
	if(!isset($_SESSION["mail"])){
		header("location:../InscriptionCandidat/index.php");
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>s'inscrire!</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Form.css">
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/b356ad9dc8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../footer.css">
        
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
                        <a href="../inscriptionrecruteur/index.php">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
                    </li>
                    <li>
                        <a href="../InscriptionCandidat/deconnexion.php">Deconnecter</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
        <section>
            <h1 style="padding:10px 40px; color:brown;">
                <?php 
                    echo ("Bonjour");
                ?>
                <span>
                <?=$_SESSION["nomPrenom"]?>
                </span>!!
            </h1>
            <h2>Curriculum Vitae</h2>
            <br>
            <form method="POST" action="rubriqueCV.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Informations personnelles</legend> 
                      
                    <label for="mail">E-mail:</label>    
                    <input type="email" name="mail" id="mail" value="<?php  if(isset($_SESSION['mail'])) echo $_SESSION['mail'] ; ?>" required/>  <br>   
                        
                    <label for="tele">Numéro de téléphone: </label>   
                    <input type="tel" name="tele" id="tele" required/> <br>    
                       
                    <label for="adresse">Adresse: </label>   
                    <input type="text" name="adresse" id="adresse" required/> <br>     
                
                </fieldset>
                <br>
                <div id="formations">
                    <fieldset >
                        <legend>Formations</legend>
                    
                        <label for="nomFor">Nom :</label>    
                        <input type="text" name="formation_nom[]" id="nomFor"required><br>

                        <label for="etablisement">Nom d'établisement:</label>    
                        <input type ="text" id="etablisement" name="etablisement[]"required/> <br>

                        <label for="dateDebut">Date de début:</label>    
                        <input type ="date" id="dateDebut" name="dateDebutFor[]"required/> <br> 
                            
                        <label for="dateFin">Date de fin:</label>    
                        <input type ="date" id="dateFin" name="dateFinFor[]"required/>  <br>     
                            
                        <button type="button" onclick="ajouterFormation()">Ajouter une formation</button>                        
                     </fieldset>
                </div>  
                <br>
                <div id="expriences">
                    <fieldset >
                        <legend>Expriences Professionnelles</legend>
                         
                        <label for="nomExp">Nom :</label>    
                        <input type="text" name="exp_nom[]" id="nomExp"required> <br> 
                        
                        <label for="societe">Nom de la societe:</label>    
                        <input type ="text" id="societe" name="societe[]"required/> <br>   
                         
                        <label for="type">Stage ou emploi?</label>    
                        <select  name="type[]" required>
                            <option value="Stage">Stage</option>
                            <option value="Emploi">Emploi</option>
                         </select>
                        <br>
                        
                        <label for="dateDebut">Date de début:</label>    
                        <input type ="date" id="dateDebut" name="dateDebutExp[]"required/><br> 
                              
                        <label for="dateFin">Date de  fin:</label>    
                        <input type ="date" id="dateFin" name="dateFinExp[]"required/> <br>   
                           
                        <button type="button" onclick="ajouterExprience()">Ajouter une exprience</button>  
                    </fieldset>
                </div>
                <br>
                <div id="Competences">
                    <fieldset>
                        <legend>Les Compétences</legend>
                        <label for="comp">Compétence :</label>    
                        <input type="text" name="competences[]" id="comp"required> <br>   

                        <button type="button" onclick="ajouterCompetence()">Ajouter une  competence</button>      
                    </fieldset>
                </div>
                <br>
                <div id="Langues">
                    <fieldset>
                        <legend>Les Langues</legend>
                        <label for="langue">Langue :</label>    
                        <input type="text" name="langue[]" id="langue" required> 
                        <br>   

                        <button type="button" onclick="ajouterLangue()">Ajouter une langue</button>      
                    </fieldset>
                </div>
                <br>
                <div id="cat_domaine">
                    <fieldset>
                        <legend>Informations Supplémentaires</legend>
                        <?php
                           // Connexion à la base de données MySQL
                           require_once('../connexion.php');
                                  $res=$conn->query('SELECT *FROM Domaines');
                                  $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                         ?>
                         <div>
                           <label for="domaine">Le domaine:</label>
                           <select name="domaine" id="domaine"  >
                                 <?php
                                       foreach($rows as $row) { ?>
                                       <option value="<?php echo $row['NomDomaine'];?>">
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
                                  $res=$conn->query('SELECT *FROM Categories');
                                  $rows=$res->fetchAll(PDO::FETCH_ASSOC);
                                  foreach($rows as $row) { ?>
                                  <option value="<?php echo $row['NomCategorie'];?>">
                                    <?php echo $row['NomCategorie'];?>
                                  </option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div>
                        <label for="dureeExp">La durée d'expriences:</label>
                        <input type="number" min='0'required name="dureeExp">
                        </div>
                        <!-- input pour calculer le score-->
                        <input type="number" value="3.25" min="3.25" id="score" name="score" style="display:none"> 
                    </fieldset>
                </div>
                <br>
                <input type="submit" value="Envoyer">
                <input type="reset" value="Annuler">
            </form>
        </section>
        </main>
        <?php    include('../footer.php')  ?>
        <script>
            btn=document.querySelector(".BarBtn");
            btn.onclick=function(){
                navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }

                        
            var score = document.getElementById("score");

            function ajouterLangue() {
                

                score.value=parseFloat(score.value)+0.25;
                var divLangues = document.getElementById("Langues");
                var nouvelFieldset = document.createElement("fieldset");
                var nouvelleLegende = document.createElement("legend");
                nouvelleLegende.innerHTML = "Langues";
                nouvelFieldset.appendChild(nouvelleLegende);

                var nouveauLabelLangue = document.createElement("label");
                nouveauLabelLangue.className="langue";
                nouveauLabelLangue.innerHTML = "Langue :";
                nouvelFieldset.appendChild(nouveauLabelLangue);
                var nouvelInputLangue = document.createElement("input");
                nouvelInputLangue.setAttribute("type", "text");
                nouvelInputLangue.setAttribute("name", "langue[]");
                nouvelInputLangue.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputLangue);
                nouvelFieldset.appendChild(document.createElement("br"));
                divLangues.appendChild(nouvelFieldset);

                divLangues.appendChild(nouvelFieldset);
                var boutonSupprimer = document.createElement("button");
                boutonSupprimer.innerHTML = "Supprimer";
                boutonSupprimer.addEventListener("click", function() {
                nouvelFieldset.parentNode.removeChild(nouvelFieldset);
                

                score.value=parseFloat(score.value)-0.25;
                });
                
                nouvelFieldset.appendChild(document.createElement("br"));
                nouvelFieldset.appendChild(boutonSupprimer);
            }
            function ajouterCompetence() {

                

                score.value=parseFloat(score.value)+1;

                var divComp = document.getElementById("Competences");
                var nouvelFieldset = document.createElement("fieldset");
                var nouvelleLegende = document.createElement("legend");
                nouvelleLegende.innerHTML = "Les Compétences";
                nouvelFieldset.appendChild(nouvelleLegende);

                var nouveauLabelComp = document.createElement("label");
                nouveauLabelComp.innerHTML = "Compétence:";
                nouvelFieldset.appendChild(nouveauLabelComp);
                var nouvelInputComp = document.createElement("input");
                nouvelInputComp.setAttribute("type", "text");
                nouvelInputComp.setAttribute("name", "competences[]");
                nouvelInputComp.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputComp);
                nouvelFieldset.appendChild(document.createElement("br"));
                divComp.appendChild(nouvelFieldset);

                divComp.appendChild(nouvelFieldset);
                var boutonSupprimer = document.createElement("button");
                boutonSupprimer.innerHTML = "Supprimer";
                boutonSupprimer.addEventListener("click", function() {
                nouvelFieldset.parentNode.removeChild(nouvelFieldset);

                

                score.value=parseFloat(score.value)-1;
                });
                
                nouvelFieldset.appendChild(document.createElement("br"));
                nouvelFieldset.appendChild(boutonSupprimer);
            }
            function ajouterFormation() {
                

                score.value=parseFloat(score.value)+1;
                var divFormations = document.getElementById("formations");
                var nouvelFieldset = document.createElement("fieldset");
                var nouvelleLegende = document.createElement("legend");
                nouvelleLegende.innerHTML = "Formations";
                nouvelFieldset.appendChild(nouvelleLegende);

                var nouveauLabelNom = document.createElement("label");
                nouveauLabelNom.innerHTML = "Nom:";
                nouvelFieldset.appendChild(nouveauLabelNom);
                var nouvelInputNom = document.createElement("input");
                nouvelInputNom.setAttribute("type", "text");
                nouvelInputNom.setAttribute("name", "formation_nom[]");
                nouvelInputNom.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputNom);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelEtablissemet = document.createElement("label");
                nouveauLabelEtablissemet .innerHTML = "Nom d'établisement:";
                nouvelFieldset.appendChild(nouveauLabelEtablissemet );
                var nouvelInputEtablissemet  = document.createElement("input");
                nouvelInputEtablissemet.setAttribute("type", "text");
                nouvelInputEtablissemet.setAttribute("name", "etablisement[]");
                nouvelInputEtablissemet.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputEtablissemet);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelDebut = document.createElement("label");
                nouveauLabelDebut.innerHTML = "Date de début:";
                nouvelFieldset.appendChild(nouveauLabelDebut);
                var nouvelInputDebut = document.createElement("input");
                nouvelInputDebut.setAttribute("type", "date");
                nouvelInputDebut.setAttribute("name", "dateDebutFor[]");
                nouvelInputDebut.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputDebut);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelFin = document.createElement("label");
                nouveauLabelFin.innerHTML = "Date de fin:";
                nouvelFieldset.appendChild(nouveauLabelFin);
                var nouvelInputFin = document.createElement("input");
                nouvelInputFin.setAttribute("type", "date");
                nouvelInputFin.setAttribute("name", "dateFinFor[]");
                nouvelInputFin.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputFin);
                nouvelFieldset.appendChild(document.createElement("br"));

                divFormations.appendChild(nouvelFieldset);
                var boutonSupprimer = document.createElement("button");
                boutonSupprimer.innerHTML = "Supprimer";
                boutonSupprimer.addEventListener("click", function() {
                nouvelFieldset.parentNode.removeChild(nouvelFieldset);
                

                score.value=parseFloat(score.value)-1;
                });
                
                nouvelFieldset.appendChild(document.createElement("br"));
                nouvelFieldset.appendChild(boutonSupprimer);

            }
            function ajouterExprience() {

                

                score.value=parseFloat(score.value)+1;

                var divExp = document.getElementById("expriences");
                var nouvelFieldset = document.createElement("fieldset");
                var nouvelleLegende = document.createElement("legend");
                nouvelleLegende.innerHTML = "Expriences Professionnelles";
                nouvelFieldset.appendChild(nouvelleLegende);

                var nouveauLabelNom = document.createElement("label");
                nouveauLabelNom.innerHTML = "Nom:";
                nouvelFieldset.appendChild(nouveauLabelNom);
                var nouvelInputNom = document.createElement("input");
                nouvelInputNom.setAttribute("type", "text");
                nouvelInputNom.setAttribute("name", "exp_nom[]");
                nouvelInputNom.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputNom);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelSociete = document.createElement("label");
                nouveauLabelSociete .innerHTML = "Nom de la societe:";
                nouvelFieldset.appendChild(nouveauLabelSociete );
                var nouvelInputSociete  = document.createElement("input");
                nouvelInputSociete.setAttribute("type", "text");
                nouvelInputSociete.setAttribute("name", "societe[]");
                nouvelInputSociete.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputSociete);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelType = document.createElement("label");
                nouveauLabelType .innerHTML = "Stage ou Emploi?";
                nouvelFieldset.appendChild(nouveauLabelType );
                var nouvelInputType = document.createElement("input");
                nouvelInputType.setAttribute("type", "text");
                nouvelInputType.setAttribute("name", "type[]");
                nouvelInputType.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputType);
                

                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelDebut = document.createElement("label");
                nouveauLabelDebut.innerHTML = "Date de début:";
                nouvelFieldset.appendChild(nouveauLabelDebut);
                var nouvelInputDebut = document.createElement("input");
                nouvelInputDebut.setAttribute("type", "date");
                nouvelInputDebut.setAttribute("name", "dateDebutExp[]");
                nouvelInputDebut.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputDebut);
                nouvelFieldset.appendChild(document.createElement("br"));

                var nouveauLabelFin = document.createElement("label");
                nouveauLabelFin.innerHTML = "Date de fin:";
                nouvelFieldset.appendChild(nouveauLabelFin);
                var nouvelInputFin = document.createElement("input");
                nouvelInputFin.setAttribute("type", "date");
                nouvelInputFin.setAttribute("name", "dateFinExp[]");
                nouvelInputFin.setAttribute("required", "required");
                nouvelFieldset.appendChild(nouvelInputFin);
                nouvelFieldset.appendChild(document.createElement("br"));

                divExp.appendChild(nouvelFieldset);
                var boutonSupprimer = document.createElement("button");
                boutonSupprimer.innerHTML = "Supprimer";
                boutonSupprimer.addEventListener("click", function() {
                nouvelFieldset.parentNode.removeChild(nouvelFieldset);

                

                score.value=parseFloat(score.value)-1;
                });

                nouvelFieldset.appendChild(document.createElement("br"));
                nouvelFieldset.appendChild(boutonSupprimer);
            }
        </script>
    </body>
</html>
