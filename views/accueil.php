<?php
if (isset($_GET["destroy"])){//supprimer la session
        session_destroy();
        header('location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <title>Portfolio</title>
    </head>
    <body>
        <header role="header">
            <nav role="navigation">
                <span class="nom"></span>
                <div class="img"></div>
                <div class="menu">
                  <a href="index.php" title="Accueil">Accueil</a>
                  <a class="btn-slide1" href="#lastReal" title="Réalisation">Réalisations</a>
                  <a class="btn-slide1" href="#servAccueil" title="service">Services</a>
                  <a href="index.php?c=contact" title="Contact">Contact</a>
                  <a href="index.php?c=cv" title="Curiculum Vitae">CV</a>
                  <?php
                  if(!isset($_SESSION['visiteur'])){//si le visiteur n'existe pas ?>
                    <a href="index.php?c=vis" title="connexion">Connexion</a>
                  <?php } 
                  else 
                  {//si le visiteur existe  ?>
                    <a href="index.php?c=vis" title="Visiteur">Bonjour <?php echo ucfirst($_SESSION['visiteur']['vis_name']); ?></a>
                 <?php } ?>
                <div class="lien"></div>
                </div>
                <div class="lienGestion">
                    <?php if(isset($_SESSION['user'])){?>
                    <a href="index.php?c=user&a=showGestion" title="gestion">Gestion</a>
                    <?php } ?>
                </div>
            </nav>
        </header>
    <div id="lastReal" class ="titreAccueil">Mes dernières Réalisations</div>
    <div class ="acceuil">
<?php // modulo pour l'affichage alterné des descriptions
$tmp=0;
foreach ($realisation as $value) {
$tmp++;
?>
    <div class ="realAcceuil">
    <div id="wrap">
        <a class="btn-slide" href="https://<?php echo $value['r_lien'];?>" target="_blank"
           style="background-image:url(<?php echo'./medias/' . $value['r_img'];?>); background-size:cover; background-repeat: no-repeat;">
        <?php
        if ($tmp%2 ==0) {
          ?>
                <div class="title-hover"><?php echo $value['r_titre'].'<br><hr>'.$value['r_lien'].'<br><hr>'.$value['r_contenu'];?></div>
        <?php ;
        }
        else{
        ?>
                <div class="title-hover2"><?php echo $value['r_titre'].'<br><hr>'.$value['r_lien'].'<br><hr>'.$value['r_contenu'];?></div>
        <?php }
         ?>
        </a>
    </div>
    </div>
<?php } ?>
</div>
<div id="servAccueil" class ="titreAccueil">Mes Services</div>
<div class="serv">
<?php
include( 'services.php' ); ?>
</div>

<?php

include( 'footer.php' ); ?>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script type="text/javascript">//script pour le menu
window.sr = ScrollReveal({ reset: true }); // revele la div au scroll
sr.reveal('#wrap', { duration: 2000 });// durée avant l'apparition
</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
 <script type="text/javascript">
    $(function(){
       setInterval(function(){
          $(".slideshow ul").animate({marginLeft:-400},800,function(){//animation droite / gauche
             $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));// element ciblé li
          })
       }, 13500);// vitesse de deplacement
    });
 </script>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function() {
    $('.btn-slide1').on('click', function() { // Au clic sur un élément
      var page = $(this).attr('href'); // Page cible
      var speed = 1250; // Durée de l'animation (en ms)
      $('html, body').animate( { scrollTop: $(page).offset().top }, speed );
      return false;
    });
  });
</script>