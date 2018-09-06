<?php
// les 5 dernieres realisations
foreach ($realisation as $value) {
echo '<div class ="realId">';
    echo '<div class="img"><img src=" ./medias/' . $value['r_img'] . '"></div>';
    echo '<div class ="realAcceuil">';
        echo '<div class="titre" id="' . $value['r_titre'] .'">' . $value['r_titre'] .'</div>';
        echo '<div class="contenu">' .$value['r_contenu'].'</div>';
        echo '<div class="user">' .$value['u_prenom'] ." ". $value['u_nom'].'</div>';
        echo '<div class="lien"><a href="https://' . $value['r_lien'] . '">' . $value['r_lien'] . '</a></div>';
    echo "</div>";
echo "</div>";
}
