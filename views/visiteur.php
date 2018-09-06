<?php include( 'header.php' );

if(isset($_SESSION['visiteur'])){ 

foreach ($contact as $value) {
echo '<div class ="cont">';
    echo '<div class ="contAcceuil">';
        echo '<div class="titre" id="' . $value['c_titre'] .'">' . $value['c_titre'] .'</div>';
        echo '<div class="contenu">' .$value['c_coordonnees'].'</div>';
        echo '<div class="c_email">' .$value['c_email'].'</div>';
        echo '<div class="user">' .$value['u_prenom'] ." ". $value['u_nom'].'</div>';
    echo "</div>";
echo "</div>";

}?>

 