<?php include( 'header.php' );
    echo "<div class='presentation'>A la recherche d'un emploi sur la région Calvados/Herault,<br>
                                    Développeur Back-End (H/F) / Intégrateur PHP, <br>
                                    Adaptabilité et force de propositions pour répondre aux demandes des clients,<br>
                                    Prêt à m'investir dans une entreprise de developpement web.
                                     

                                    </div><br>";
        foreach ($contact as $value) {
        echo '<div class ="cont">';
            echo '<div class ="contAcceuil">';
                echo '<div class="titre" id="' . $value['c_titre'] .'">' . $value['c_titre'] .'</div>';
                echo '<div class="contenu">' .$value['c_coordonnees'].'</div>';
            echo "</div>";
        echo "</div>";

        }
    
    if(!isset($_SESSION['visiteur'])){ 

        echo "<div class='connexion'> Pour me contacter veuillez vous connecter : <a href='index.php?c=vis'> Me contacter </a></div><br>";
    }
include( 'footer.php' ); ?>
