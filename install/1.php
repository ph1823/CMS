<?php
include('/include/bdd.php')
?>
<html>
	<head>
		<title>Installation du compte Admin et du site</title>
		<meta charset="UFT-8" />
		<link rel="stylesheet" type="text/css" href="">
	</head>
	<body>
		<form action="?action" method="post">
			<label for="nom_site">Nom du Site : </label><input type="text" name="nom_site" id="nom_site" />
			<label for="pseudo">Le pseudo de l'admin : </label><input type="text" name="pseudo" id="pseudo" />
			<label for="email">L'e-mail de l'admin : </label><input type="text" name="email" id="email" />
			<label for="motdepasse">Le Mot De Passe De L'admin</label><input type="text" name="motdepasse" id="motdepasse" />

		</form>
		<?php
		$mdp = sha1($_GET['motdepasse']);
		if (isset($_GET['action'])) {
			$req1 = $bdd->prepare('INSERT INTO membre(pseudo , email , motdepasse , id_admin) VALUES(pseudo = :pseudo , email = :email , motdepasse = :motdepasse , 1)');
			$req1->execute(array(
				':pseudo'=>$_GET['pseudo'],
				'email'=>$_GET['email'],
				':motdepasse'=>$mdp,
				));
			if($req1 === true) {
				echo '<div id="sucess">L\'installation du site à était un sucess . L\'installation est Fini pour voir votre cliquer ici ==><a href="../index.php><input type="subit" value="Terminé!!!" /></div>';
			}
			
		} ?>

	</body>
</html>