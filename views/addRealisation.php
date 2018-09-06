<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>

    <div class="modif">
    <h1>Ajouter une Réalisation</h1>
        <form method="post" action="?c=realisation&a=addReal">
            <input type="text" name="img" id="img" placeholder="Lien image">
            <input type="text" name="titre" id="titre" placeholder="Titre">
            <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
            <input type="text" name="lien" id="lien" placeholder="Lien Réalisation">
            <input type="hidden" name="user" id="user" value="<?php
               $obj= unserialize( $_SESSION['user']);
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