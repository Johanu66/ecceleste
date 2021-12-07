var regex_nom = /[0-9]/;
var regex1_mail = /[A-ZÁÀÂÄÃÆÅÉÈÊËÚÙÛÜÝŸÍÌÎÏØŒÕÖÔÒÓ]/;
var regex2_mail = /@[a-z0-9._-]*[^a-z0-9._-]+/;

var nom1 = document.getElementById("nom");
var mail1 = document.getElementById("mail");
function erreur() {
	var valeur_nom = nom1.value;
	var valeur_mail = mail1.value;
	if(regex_nom.test(valeur_nom))
		nom1.style.color = 'red';
	else
		nom1.style.color = 'black';
	if(regex1_mail.test(valeur_mail) || regex2_mail.test(valeur_mail))
		mail1.style.color = 'red';
	else
		mail1.style.color = 'black';
}
setInterval("erreur()",1000);