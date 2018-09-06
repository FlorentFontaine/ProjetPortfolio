<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
    <h1>Modifier une Réalisation</h1>
        <form method="post" action="?c=realisation&a=modifReal">
            <select name="id" id="id">
                <option>-choix Réalisation-</option>
                <?php
                foreach ($realisation as $value) {?>
                <option value="<?php echo $value['r_id']; ?>"><?php echo $value['r_titre']; ?></option>
                <?php }?>
            </select>
            <input type="submit" value="choisir">
        </form>
    <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
<?php



if (isset($_POST['id'])) {?>

    <form method="post" action="?c=realisation&a=modifReal">
        <input type="text" name="img" id="img" value="<?php echo $realOne['r_img']?>">
        <input type="text" name="titre" id="titre" value="<?php echo $realOne['r_titre']?>">
        <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $realOne['r_contenu']?></textarea>
        <input type="text" name="lien" id="lien"  value="<?php echo $realOne['r_lien']?>">
        <input type="hidden" name="user" id="user" value="<?php
           $obj= unserialize( $_SESSION['user']);
           echo $obj['u_id'];
         ?>">
        <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
        <input type="submit" value="modifier">
    </form>
    </div>
</div>
<?php
    }
}