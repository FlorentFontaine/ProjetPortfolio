<?php
if (isset($_GET["destroy"])){
        session_destroy();
        header('location: index.php');
        exit;
    }

if (isset($_GET['c'])) {
    $main = $_GET['c'];
}
else{
    $main='style';
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/<?php echo $main?>.css">
        <title>Portfolio</title>
    </head>
    <body>
        <header role="header">
            <nav role="navigation">
                <span class="nom"></span>
                <div class="menu">
                  <a href="index.php" title="Accueil">Accueil</a>
                  <a href="index.php?c=contact" title="Contact">Contact</a>
                  <a href="index.php?c=cv" title="Curiculum Vitae">CV</a>
                    <?php
                  if(!isset($_SESSION['visiteur'])){ ?>
                  <a href="index.php?c=vis" title="connexion">Connexion</a>
                  <?php } 
                  else 
                  { ?>
                    <a href="index.php?c=vis" title="Visiteur">Bonjour <?php echo ucfirst($_SESSION['visiteur']['vis_name']); ?></a>
                 <?php } ?>
                <div class="lien"></div>
                </div>
                <div class="lienGestion"><?php
                     if(isset($_SESSION['user'])){ ?>
                    <a href="index.php?c=user&a=showGestion" title="gestion">Gestion</a>
                    <?php } ?>
                </div>
            </nav>
        </header>