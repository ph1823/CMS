<?php
include('../include/bdd.php');
include('../include/ini.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
     <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<title>Installation automatisée : 1ère étape</title>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>
<body>
	<?php
				  if(isset($_POST['host']) AND !empty($_POST['host']) AND isset($_POST['bdd']) AND !empty($_POST['bdd']) AND isset($_POST['user']) AND !empty($_POST['user'])) {
    try {
      $bdd = new PDO('mysql:host='.$_POST['host'].';dbname='.$_POST['bdd'].';charset=utf8', $_POST['user'], $_POST['password']) or die("test");
      $data = '<?php $host = "'.$_POST['host'].'"; $user = "'.$_POST['user'].'"; $mdp = "'.$_POST['password'].'"; $db = "'.$_POST['bdd'].'"; $etape_1 = "ok"?>';
      $fp = fopen("../include/bdd.php","w+");
      fwrite($fp, $data);
      fclose($fp);

      $connexion_bdd = "true";
      $success = 'Les informations on bien été enregistrées. Vous pouvais désormais continuer l\'installation.';
      include('sql.php');
          } catch (Exception $erreur) {
      $erreur = 'Impossible de se connecter à la base de donnée.';
    }
  }
      ?>
    <div class="container">

      <form class="form-signin" method="post" style="width: 900px;">
        <center><h2 class="form-signin-heading">Etape 1 - Connexion à la base de données</h2></center>
      <center>
        <p class="lead">Pour installez votre CMS il vous faut impérativement une base de données. Veuillez remplir les champs ci-dessous pour que votre CMS fonctionne.</p>
        <div class="well">
          <?php if(!empty($erreur)) { ?>
          <div class="alert alert-error"><?php echo $erreur; ?></div>
          <?php } ?>
          <?php if(!empty($success)) { ?>
          <div class="alert alert-success"><?php echo $success; ?></div>
          <?php } ?>
          <form class="form-horizontal">
            <div class="control-group">
            <label class="control-label" for="inputHost">Serveur de la base de données</label>
            <div class="controls">
            <input type="text" name="host" placeholder="Exemple: sql.exemple.fr" value="<?php if(!empty($_POST['host'])) { echo $_POST['host']; } ?>" required>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="inputBDD">Nom de la base de données</label>
            <div class="controls">
            <input type="text" name="bdd" placeholder="Exemple: 25857_sql" value="<?php if(!empty($_POST['bdd'])) { echo $_POST['bdd']; } ?>" required>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="inputUser">Utilisateur</label>
            <div class="controls">
            <input type="text" name="user" placeholder="Exemple: Skyford" value="<?php if(!empty($_POST['user'])) { echo $_POST['user']; } ?>" required>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="inputPassword">Mot de passe</label>
            <div class="controls">
            <input type="password" name="password" placeholder="Mot de passe de votre BDD" value="<?php if(!empty($_POST['password'])) { echo $_POST['password']; } ?>" required>
            </div>
            </div>
            <div class="control-group">
            <div class="controls">
            <button type="submit" class="btn btn-primary" name="Tester_la_connexion">Tester la connexion</button>
            </div>
            </div>
          </form>
        </div>
      <center>
        <?php if($connexion_bdd == "true") { ?>
        <a href="2.php" class="btn btn-medium btn-success">Continuer</a>
        <?php } else { ?>
        <button class="btn btn-medium btn-success disabled">Continuer</button>
        <?php } ?>

</body>
</html>