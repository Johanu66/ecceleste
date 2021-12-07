<?php
	$bdd = new PDO("mysql:host=localhost;dbname=ecceleste;charset=utf8","root","");
	$temps_actuel = date("U");
	$temps_session = 300;
	$ip_utilisateur = $_SERVER['REMOTE_ADDR'];
	$req_ip_exist = $bdd->prepare('SELECT * FROM enligne WHERE ip = ?');
	$req_ip_exist->execute(array($ip_utilisateur));
	$ip_exist = $req_ip_exist->rowcount();
	if($ip_exist == 0)
	{
		$req_inserer_ip = $bdd->prepare('INSERT INTO enligne (ip,temps) VALUES (?,?)');
		$req_inserer_ip->execute(array($ip_utilisateur,$temps_actuel));
	}
	else
	{
		$req_modifier_temps_de_ip = $bdd->prepare('UPDATE enligne SET temps=? WHERE ip=?');
		$req_modifier_temps_de_ip->execute(array($temps_actuel,$ip_utilisateur));
	}
	$temps_delai_session = $temps_actuel-$temps_session;
	$req_netoyer = $bdd->prepare('DELETE FROM enligne WHERE temps < ?');
	$req_netoyer->execute(array($temps_delai_session));
	$req_enligne = $bdd->query('SELECT * FROM enligne');
	$enligne = $req_enligne->rowcount();
	echo $enligne;
?>







<div><p>
				    Nous vous prions de nous contacter <a href="#contact">ici</a> si vous constatez des insuffisances sur le site ou de nous faire un don <a href="https://me.fedapay.com/celeste" target="_blank">ici</a> afin de nous aider à mieux améliorer le travail.
				</p></div>
				<div>
					<h2>Nos services :</h2>
					<ul>
						<li>Nous sommes disponible pour le développement de vos sites et applications web.</li>
						<li>Nous sommes disponible pour la création de vos chatbots messenger, whathsapp et telegram.</li>
					</ul>
				</div>