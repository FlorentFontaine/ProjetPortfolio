<?php include( 'header.php' );
?>

<div  class ="titreAccueil">Mes Compétences</div>
<?php
foreach ($cvComp as $value) {

echo '<div class ="cv">';
    echo '<div class ="cvAcceuil">';
        echo '<div class="contenu"> - ' . ucfirst($value['cv_contenu']).',</div>';
    echo "</div>";
echo "</div>";
}

?>
<div  class ="titreAccueil">Mes Expériences professionnelles</div>
<?php

foreach ($cvExp as $value) {
echo '<div class ="cv">';
    echo '<div class ="cvAcceuil">';
        echo '<div class="contenu">' .$value['annee']." : ". ucfirst($value['cv_contenu'])." à ".$value['cv_ville'].', </div>';
    echo "</div>";
echo "</div>";
}
?>
<div  class ="titreAccueil">Mes études et diplômes</div>
<?php
foreach ($cvForm as $value) {
    echo '<div class ="cv">';
        echo '<div class ="cvAcceuil">';
        echo '<div class="contenu">' .$value['annee']." : ". ucfirst($value['cv_contenu']).', </div>';
        echo "</div>";
    echo "</div>";
}
?>
<div  class ="titreAccueil">Divers</div>
<?php
foreach ($cvDiv as $value) {
    echo '<div class ="cv">';
        echo '<div class ="cvAcceuil">';
        echo '<div class="contenu">' .  ucfirst($value['cv_titre'])." : ". ucfirst($value['cv_contenu']).',</div>';
        echo "</div>";
    echo "</div>";
}

 include( 'footer.php' ); ?>
