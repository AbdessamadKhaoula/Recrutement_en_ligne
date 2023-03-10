function ajouterQualite() {
    var divQual = document.getElementById("Qualites");
    var nouvelFieldset = document.createElement("fieldset");
    var nouvelleLegende = document.createElement("legend");
    nouvelleLegende.innerHTML = "Les Qualités";
    nouvelFieldset.appendChild(nouvelleLegende);

    var nouveauLabelQual = document.createElement("label");
    nouveauLabelQual.innerHTML = "Nom :";
    nouvelFieldset.appendChild(nouveauLabelQual);
    var nouvelInputQual = document.createElement("input");
    nouvelInputQual.setAttribute("type", "text");
    nouvelInputQual.setAttribute("name", "qualites[]");
    nouvelFieldset.appendChild(nouvelInputQual);
    nouvelFieldset.appendChild(document.createElement("br"));
    divQual.appendChild(nouvelFieldset);

    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = "Supprimer";
    boutonSupprimer.addEventListener("click", function() {
    nouvelFieldset.parentNode.removeChild(nouvelFieldset);
    });
    
    nouvelFieldset.appendChild(document.createElement("br"));
    nouvelFieldset.appendChild(boutonSupprimer);
}
function ajouterLangue() {
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
    nouvelFieldset.appendChild(nouvelInputLangue);
    nouvelFieldset.appendChild(document.createElement("br"));
    divLangues.appendChild(nouvelFieldset);

    divLangues.appendChild(nouvelFieldset);
    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = "Supprimer";
    boutonSupprimer.addEventListener("click", function() {
    nouvelFieldset.parentNode.removeChild(nouvelFieldset);
    });
    
    nouvelFieldset.appendChild(document.createElement("br"));
    nouvelFieldset.appendChild(boutonSupprimer);
}
function ajouterCompetence() {
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
    nouvelFieldset.appendChild(nouvelInputComp);
    nouvelFieldset.appendChild(document.createElement("br"));
    divComp.appendChild(nouvelFieldset);

    divComp.appendChild(nouvelFieldset);
    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = "Supprimer";
    boutonSupprimer.addEventListener("click", function() {
    nouvelFieldset.parentNode.removeChild(nouvelFieldset);
    });
    
    nouvelFieldset.appendChild(document.createElement("br"));
    nouvelFieldset.appendChild(boutonSupprimer);
}
function ajouterFormation() {
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
    nouvelFieldset.appendChild(nouvelInputNom);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelEtablissemet = document.createElement("label");
    nouveauLabelEtablissemet .innerHTML = "Nom d'établisement:";
    nouvelFieldset.appendChild(nouveauLabelEtablissemet );
    var nouvelInputEtablissemet  = document.createElement("input");
    nouvelInputEtablissemet.setAttribute("type", "text");
    nouvelInputEtablissemet.setAttribute("name", "etablisement[]");
    nouvelFieldset.appendChild(nouvelInputEtablissemet);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelDebut = document.createElement("label");
    nouveauLabelDebut.innerHTML = "Date de début:";
    nouvelFieldset.appendChild(nouveauLabelDebut);
    var nouvelInputDebut = document.createElement("input");
    nouvelInputDebut.setAttribute("type", "date");
     nouvelInputDebut.setAttribute("name", "dateDebutFor[]");
    nouvelFieldset.appendChild(nouvelInputDebut);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelFin = document.createElement("label");
    nouveauLabelFin.innerHTML = "Date de fin:";
    nouvelFieldset.appendChild(nouveauLabelFin);
    var nouvelInputFin = document.createElement("input");
    nouvelInputFin.setAttribute("type", "date");
    nouvelInputFin.setAttribute("name", "dateFinFor[]");
    nouvelFieldset.appendChild(nouvelInputFin);
    nouvelFieldset.appendChild(document.createElement("br"));

    divFormations.appendChild(nouvelFieldset);
    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = "Supprimer";
    boutonSupprimer.addEventListener("click", function() {
    nouvelFieldset.parentNode.removeChild(nouvelFieldset);
    });
    
    nouvelFieldset.appendChild(document.createElement("br"));
    nouvelFieldset.appendChild(boutonSupprimer);

}
function ajouterExprience() {
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
    nouvelFieldset.appendChild(nouvelInputNom);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelSociete = document.createElement("label");
    nouveauLabelSociete .innerHTML = "Nom de la societe:";
    nouvelFieldset.appendChild(nouveauLabelSociete );
    var nouvelInputSociete  = document.createElement("input");
    nouvelInputSociete.setAttribute("type", "text");
    nouvelInputSociete.setAttribute("name", "societe[]");
    nouvelFieldset.appendChild(nouvelInputSociete);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelType = document.createElement("label");
    nouveauLabelType .innerHTML = "Stage ou Emploi?";
    nouvelFieldset.appendChild(nouveauLabelType );
    var nouvelInputType = document.createElement("input");
    nouvelInputType.setAttribute("type", "text");
    nouvelInputType.setAttribute("name", "type[]");
    nouvelFieldset.appendChild(nouvelInputType);
    

    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelDebut = document.createElement("label");
    nouveauLabelDebut.innerHTML = "Date de début:";
    nouvelFieldset.appendChild(nouveauLabelDebut);
    var nouvelInputDebut = document.createElement("input");
    nouvelInputDebut.setAttribute("type", "date");
     nouvelInputDebut.setAttribute("name", "dateDebutExp[]");
    nouvelFieldset.appendChild(nouvelInputDebut);
    nouvelFieldset.appendChild(document.createElement("br"));

    var nouveauLabelFin = document.createElement("label");
    nouveauLabelFin.innerHTML = "Date de fin:";
    nouvelFieldset.appendChild(nouveauLabelFin);
    var nouvelInputFin = document.createElement("input");
    nouvelInputFin.setAttribute("type", "date");
    nouvelInputFin.setAttribute("name", "dateFinExp[]");
    nouvelFieldset.appendChild(nouvelInputFin);
    nouvelFieldset.appendChild(document.createElement("br"));

    divExp.appendChild(nouvelFieldset);
    var boutonSupprimer = document.createElement("button");
    boutonSupprimer.innerHTML = "Supprimer";
    boutonSupprimer.addEventListener("click", function() {
    nouvelFieldset.parentNode.removeChild(nouvelFieldset);
    });

    nouvelFieldset.appendChild(document.createElement("br"));
    nouvelFieldset.appendChild(boutonSupprimer);
}