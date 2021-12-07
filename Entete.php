<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="Logo.jpg" />
		<title>ECCeleste</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header id="header">
			<div id='headerdiv1'>
				<img src='Logo.jpg' alt='Logo' name='logo' id="logo">
			</div>
			<div id="headerdiv2">
				<strong>Église du Christianisme Céleste</strong>
			</div>
		</header>
		<nav id="nav">
			<div id="a1" class="bordu"><a href="index.php">Acceuil</a></div>
			<div id="a2" class="bordu"><a href="Programmes.php">Programmes</a></div>
			<div id="a3" class="bordu"><a href="Don.php">Don</a></div>
			<div id="a4"><a href="Propos.php">À propos</a></div>
		</nav>
		<?php
			$bdd = new PDO("mysql:host=localhost;dbname=ecceleste;charset=utf8","root","");
			$date = date('d')."-".date('m')."-".date('Y')." à ".date('H').":".date('i');
			$ip_utilisateur = $_SERVER['REMOTE_ADDR'];
			$req_ip_exist = $bdd->prepare('SELECT * FROM visiteur WHERE ip = ?');
			$req_ip_exist->execute(array($ip_utilisateur));
			$ip_exist = $req_ip_exist->rowcount();
			if($ip_exist == 0)
			{
				$req_inserer_ip = $bdd->prepare('INSERT INTO visiteur (ip,datedate) VALUES (?,?)');
				$req_inserer_ip->execute(array($ip_utilisateur,$date));
			}
			else
			{
				$req_modifier_date_de_ip = $bdd->prepare('UPDATE visiteur SET datedate=? WHERE ip=?');
				$req_modifier_date_de_ip->execute(array($date,$ip_utilisateur));
			}
		?>
	</body>
</html>