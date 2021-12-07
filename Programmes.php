<!DOCTYPE html>
<html>
	<head>
		<title>ECCeleste</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap\css\style.css">
		<script type="text/javascript" src="bootstrap\jquery.js"></script>
		<script type="text/javascript" src="bootstrap\popper.js"></script>
		<script type="text/javascript" src="bootstrap\bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="Programmes.css">
		<link rel="stylesheet" type="text/css" href="EnteteFoote.css">
	</head>
	<body>
		<?php include("Entete.php"); ?>
		<section>
			<aside id="faireRecherche">
				<form method="POST" action="">
					<div id="labelDate">
						<label for="date">Mettez la date du programme que vous cherchez.</label>
					</div>
					<div id="lesInputs">
						<div id="dateDiv"><input type="date" name="date" id="date" value=<?php if(isset($_POST['recherche']) AND !empty($_POST['date'])){ echo $_POST['date'];} ?>></div>
						<div id="rechercheDiv"><input type="submit" name="recherche" value="Rechercher" id="recherche"></div>
					</div>
				</form>
			</aside>
			<aside id="affichage">
				<?php
				if(isset($_POST['recherche']) AND !empty($_POST['date'])){
					if(preg_match("#^[0-9]{4}-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$#", $_POST['date'])){
						$date = $_POST['date'];
						$ok = 1;
					}
					else{
						$ok = 0;
						?>
						<div>
						    <p style="color: red;">
								La date que vous avez entré est erronée. Entrez une date correct.
							</p>
						</div>
						<?php
					}
				}
				else{
					$date = date('Y').'-'.date('m').'-'.date('d');
					$ok = 1;
				}
				if($ok){
					$bdd = new PDO("mysql:host=localhost;dbname=ecceleste;charset=utf8","root","");
					$requete1 = $bdd->prepare("SELECT theme FROM theme_de_la_semaine where date_de_debut<=? AND date_de_fin>=?");
					$requete1->execute(array($date, $date));
					if($resultat1 = $requete1->fetch()){
						?>
						<div>
							<h1>THEME DE LA SEMAINE</h1>
							<p><?php echo $resultat1['theme']; ?></p>
						</div>
						<?php
						$requete2 = $bdd->prepare("SELECT * FROM programme_du_jour WHERE datee=?");
						$requete2->execute(array($date));
						$pas_de_programme_du_jour = 1;
						while ($resultat2 = $requete2->fetch()) {
							?>
							<div>
								<h1><?php echo $resultat2['datee'];
										if($resultat2['heure']){ echo ' à '.$resultat2['heure']; }
									?>
								</h1>
								<?php
								if($resultat2['lecture1']!=NULL){
									?>
									<p><?php echo "<span>Première lecture: </sapn>".$resultat2['lecture1']; ?></p>
										<?php
								}
								if($resultat2['lecture2']!=NULL){
									?>
									<p><?php echo "<span>Deuxième lecture: </sapn>".$resultat2['lecture2']; ?></p>
										<?php
								}
								if($resultat2['cantique1']!=NULL){
									?>
									<p><?php echo "<span>Première cantique: </sapn>".$resultat2['cantique1']; ?></p>
										<?php
								}
								if($resultat2['cantique2']!=NULL){
									?>
									<p><?php echo "<span>Deuxième cantique: </sapn>".$resultat2['cantique2']; ?></p>
										<?php
								}
								if($resultat2['cantique3']!=NULL){
									?>
									<p><?php echo "<span>Troisième cantique: </sapn>".$resultat2['cantique3']; ?></p>
										<?php
								}
								if($resultat2['cantique4']!=NULL){
									?>
									<p><?php echo "<span>Quatrième cantique: </sapn>".$resultat2['cantique4']; ?></p>
										<?php
								}
								if($resultat2['cantique5']!=NULL){
									?>
									<p><?php echo "<span>Cinquième cantique: </sapn>".$resultat2['cantique5']; ?></p>
										<?php
								}
								if($resultat2['cantique6']!=NULL){
									?>
									<p><?php echo "<span>Sixième cantique: </sapn>".$resultat2['cantique6']; ?></p>
										<?php
								}
								if($resultat2['cantique7']!=NULL){
									?>
									<p><?php echo "<span>Septième cantique: </sapn>".$resultat2['cantique7']; ?></p>
										<?php
								}
								?>
							</div>
							<?php
							$pas_de_programme_du_jour = 0;
						}
						if($pas_de_programme_du_jour){
							?>
							<div>
							    <p>
									Il n'y a pas de culte à l'ordre international cette journée.
								</p>
							</div>
							<?php
						}
					}
					elseif($date < '2020-08-24'){
						?>
						<div>
						    <p>
								La date que vous avez entré est très ancienne, nous ne disposons plus de son programme.
							</p>
						</div>
						<?php
					}
					elseif($date > '2021-01-03'){
						?>
						<div>
						    <p>
								La date que vous avez entré est très avancée, nous ne disposons pas encore de son programme.
							</p>
						</div>
						<?php
					}
				}
				?>
			</aside>
		</section>
		<?php include("Footer.php"); ?>
	</body>
</html>