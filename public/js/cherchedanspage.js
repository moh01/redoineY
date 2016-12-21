var IE = (document.all); // Détection du navigateur
var a_win = window; // fenêtre à explorer.
var a_n   = 0;
function TrouveDansPage(chaine) {
	var a_txt, a_i, a_trouve;
	if (chaine == ""){
		return false;
	}
	// Trouver la prochaine occurrence de le chaine dans la page, retourner au debut de la page si nécessaire
	if (IE) { // Internet Explorer
		a_txt = a_win.document.body.createTextRange();
		// Trouver la a_nieme réponse à partir du début de la page.
		for (a_i = 0; a_i <= a_n && (a_trouve = a_txt.findText(chaine)) != false; a_i++) {
			a_txt.moveStart("character", 1);
			a_txt.moveEnd("textedit");
		}
		if (a_trouve) { // Si texte trouvé, le sélectionner et faire défiler la page pour qu'il soit visible.
			a_txt.moveStart("character", -1);
			a_txt.findText(chaine);
			a_txt.select();
			a_txt.scrollIntoView();
			a_n++;
		}
		else { // Sinon, recommencer en haut de page et trouver la 1ere occurrence.
			if (a_n > 0) {
				a_n = 0;
				TrouveDansPage(chaine);
			}
			else { // introuvable prévenir l'utilisateur.
				alert("\""+chaine+"\" est introuvable dans cette page.");
			}
		}
	}
	else { // autre navigateur qu'Internet Explorer
		if (!a_win.find(chaine)){
			while(a_win.find(chaine, false, true)){
				a_n++;
			}
		}
		else {
			a_n++;
		}
		if (a_n == 0){ // si introuvable prévenir l'utilisateur.
			alert("\""+chaine+"\" est introuvable dans cette page.");
		}
	}
	return false;
 }
function a_selectAll(champ) {
	var tempval=eval(champ);
	tempval.focus();
	tempval.select();
}