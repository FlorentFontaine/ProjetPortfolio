<?php include( 'header.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
    ?>
<div class="form">
    <?php
        if(isset($_SESSION['user'])){?>
        <div class="gestion">
            <h2>Gestion de Compte</h2><hr>
            <?php
            echo'<li><a href="index.php?c=realisation&a=addReal" title="Ajouter"><img src="medias/plus.png" alt="Ajouter" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=realisation&a=modifReal" title="Modifier"><img src="medias/pen.png" alt="Modifier" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=realisation&a=suppReal" title="Delete"><img src="medias/trash.png" alt="delete" style="width:35px; border:none; margin:0;"></a>Réalisation.</li>';
            echo'<li><a href="index.php?c=contact&a=addCont" title="Ajouter"><img src="medias/plus.png" alt="Ajouter" style="width:35px; border:none; margin:0; text-align:right;"></a><a href="index.php?c=contact&a=modifCont" title="Modifier"><img src="medias/pen.png" alt="Modifier" style="width:35px; border:none; margin:0; text-align:right;"></a><a href="index.php?c=contact&a=suppCont" title="Delete"><img src="medias/trash.png" alt="delete" style="width:35px; border:none; margin:0;"></a>Contact.</li>';
            echo'<li><a href="index.php?c=services&a=addServ" title="Ajouter"><img src="medias/plus.png" alt="Ajouter" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=services&a=modifServ" title="Modifier"><img src="medias/pen.png" alt="Modifier" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=services&a=suppServ" title="Delete"><img src="medias/trash.png" alt="delete" style="width:35px; border:none; margin:0;"></a>Service.</li>';
            echo'<li><a href="index.php?c=cv&a=addCv" title="Ajouter"><img src="medias/plus.png" alt="Ajouter" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=cv&a=modifCv" title="Modifier"><img src="medias/pen.png" alt="Modifier" style="width:35px; border:none; margin:0;"></a><a href="index.php?c=cv&a=suppCv" title="Delete"><img src="medias/trash.png" alt="delete" style="width:35px; border:none; margin:0;"></a>CV.</li>';
            echo '<hr>';
            $user=unserialize($_SESSION['user']);
            if ($user['r_libelle']=='admin'){ // verifier les droit de l'utilisateur
            echo '<li><a href="index.php?c=user&a=showConnect" title="Login">Création Utilisateur.</a></li>';
            }
            echo'<hr><li><a href="?destroy" title="">Se déconnecter</a></li>';
        }
        ?>
        </div>
        <?php
}
