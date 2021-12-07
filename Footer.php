<!DOCTYPE html>
<html>
	<head>
		<title>ECCeleste</title>
		<meta charset="utf-8">
	</head>
	<body>
		<footer>
			<div id="footer1">
				<div id="contact">Laisser un commentaire</div>
				<?php
				$message_envoye = 0;
				if(isset($_POST['envoyer'])){
					if(!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['message'])){
						$_POST['nom'] = htmlspecialchars($_POST['nom']);
						$_POST['mail'] = htmlspecialchars($_POST['mail']);
						$_POST['message'] = htmlspecialchars($_POST['message']);
						if(preg_match("#[0-9]#", $_POST['nom'])){
							echo "<span style='background-color:red' class='span'>Nom invalide !!</span>";
						}
						elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
							echo "<span style='background-color:red' class='span'>Mail invalide !!</span>";
						}
						else{
							$header="MIME-Version: 1.0\r\n";
							$header.="From:'ECCeleste.com'<support@ecceleste.com>"."\n";
							$header.="Content-Type:text/html; charset='utf-8'"."\n";
							$header.="Content-Transfer-Encoding: 8bit";
							$message="
							<html>
								<head>
									<title>ECCeleste</title>
									<meta charset='utf-8'>
								</head>
								<body>
									<h3 align='center'>
										".$_POST['nom']."
									</h3>
									<div align='center'>
										".$_POST['mail']."
									</div>
									<div align='center'>
										".$_POST['message']."
									</div>
								</body>
							</html>";
							mail('ecceleste2@gmail.com', 'Message dépuis ECCeleste', $message, $header);
							echo "<span style='color:#00ff1e' class='span'>Message envoyé avec succès.</span>";
							?>
							<script type="text/javascript">
								alert('Message envoyé avec succès.');
							</script>
							<?php
							$message_envoye = 1;
						}	
					}
					else{
						echo '<span style="color:red;" class="span">Message non envoyé. Veuillez renseigner tous les champs !!</span>';?>
						<script type="text/javascript">
							alert('Message non envoyé. Veuillez renseigner tous les champs !!');
						</script>
						<?php
					}
				}
				?>
				<div>Votre adresse de messagerie ne sera pas publiée. Les champs obligatoires sont indiqués avec <span style="color:red;">*</span></div>
				<form method="POST" action="">
					<div>
						<label for="nom">Nom <span style="color:red;">*</span></label><br>
						<input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom']) && $message_envoye == 0){echo $_POST['nom'];} ?>" class='input'>
					</div>
					<div>
						<label for="mail">Adresse mail<span style="color:red;">*</span></label><br>
						<input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail']) && $message_envoye == 0){echo $_POST['mail'];} ?>" class='input'>
					</div>
					<div>
						<label for="commentaire">Commentaire</label><br>
						<textarea name='message' id="commentaire"><?php if(isset($_POST['message']) && $message_envoye == 0){echo $_POST['message'];} ?></textarea>
					</div>
					<div>
						<input type="submit" name="envoyer" value="Envoyer" id="Envoyer">
					</div>
				</form>
			</div>
			<div id="footer2">
				<div id="footer2div1">
					<div>
						<div id="pointVert"><span>Service : </span><img src="EnLigne.png"></div><br>
						<a href="index.php">Acceuil</a>
						<a href="Programmes.php">Programmes</a>
						<a href="Don.php">Don</a>
						<a href="Propos.php">À propos</a>
					</div>
					<div>
						<a href="tel:+22961149072"><img src="Image contact (4).jpg" alt="Téléphone"></a>
						<a href="http://wa.me/+22961149072" target='_blank'><img src="Image contact (1).jpg" alt="WhatsApp"></a>
						<a href="mailto:johanugandonou@gamil.com"><img src="Image contact (2).jpg" alt="Mail"></a>
						<a href="https://free.facebook.com/profile.php?id=100008428622236" target='_blank'><img src="Image contact (3).jpg" alt="Facebook"></a>
					</div>
				</div>
				<div id="code">
					Copyright © ECCéleste.2020. Tous drois réservés.
				</div>
			</div>
		</footer>
		<div id="fin">www.ecceleste.com 1.0</div>
		<script type="text/javascript" src="Footer.js"></script>
	</body>
</html>