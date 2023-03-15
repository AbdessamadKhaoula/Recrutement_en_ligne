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
                        <a href="../index.html">Accueil</a>

                    </li>
                    <li>
                        <a href="../InscriptionCandidat/index.html">Candidats</a>

                    </li>
                    <li>
                        <a href="../inscriptionrecreteur/index.html">Recreteurs</a>

                    </li>
                    <li>
                        <a href="#Contacts">Contacts</a>
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
                            <td>Type:</td> 
                            <td><select>
                                <option>choisir le type</option>
                                <option>Emploi</option>
                                <option>Stage</option></select></td>
                        </tr>
                        <tr>
                            <td>Domaine:</td>
                            <td><select>
                                <option>choisir le domaine</option>
                                <option>Développment Informatique</option>
                                <option>Réseaux Informatique</option>
                                <option>Industriel</option></td>
                        </tr>
                        <tr>
                            <td>Catégorie:</td>
                            <td><select>
                                <option>choisir le catégorie</option>
                                <option>Bac</option>
                                <option>Bac+2</option>
                                <option>Bac+3</option>
                                <option>Bac+5</option></select></td>
                        </tr>
                        <tr>
                            <td>Réf:</td>
                            <td><input type="text" max="10"></td>
                        </tr>
                        
                        <tr>
                            <td>Type de contrat:</td>
                            <td><input type="text" max="10"></td>
                        </tr>
                        <tr>
                            <td>Type de stage:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Poste:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Date fin:</td>
                            <td><input type="date"></td>
                        </tr>
                        <tr>
                            <td>Texte:</td>
                            <td><textarea  id="text" cols="40" rows="5" placeholder="Description....."></textarea>
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
        <div class="main" id="Contacts">
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
        <script>
            btn=document.querySelector(".BarBtn");
            btn.onclick=function(){
                navbar=document.querySelector(".nav-bar");
                navbar.classList.toggle("active"); 
            }

            var text=document.getElementById("text");
            var indication=document.getElementById("indication");
            var limit=200;
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