<?php include( 'gestion.php' );

if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
        <h1>Ajouter un Contact</h1>
        <form method="post" action="?c=contact&a=addCont">
            <input type="text" name="titre" id="titre" placeholder="Titre">
            <textarea name="coordonnees" id="coordonnees" cols="50" rows="15"></textarea>
            <input type="email" name="email" id="email" placeholder="E-mail">
            <input type="hidden" name="user" id="user" value="<?php
               $obj= unserialize( $_SESSION['user']);// recupere les données sessions pour  l'id
               echo $obj['u_id'];
             ?>">
            <input type="submit" value="Creation">
        </form>
        <?php
        if (isset($err)) {?>
            <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
        <?php } ?>
    </div>
</div>

<?php
}