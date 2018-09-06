<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
    <h1>Modifier un Service</h1>
        <form method="post" action="?c=services&a=modifServ">
            <select name="id" id="id">
                <option>-choix Service-</option>
                <?php
                foreach ($services as $value) {?>
                <option value="<?php echo $value['s_id']; ?>"><?php echo $value['s_titre']; ?></option>
                <?php }?>
            </select>
            <input type="submit" value="choisir">
        </form>
    <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
<?php





if (isset($_POST['id'])) {?>

    <form method="post" action="?c=services&a=modifServ">
        <input type="text" name="img" id="img" value="<?php echo $servOne['s_img']?>">
        <input type="text" name="titre" id="titre" value="<?php echo $servOne['s_titre']?>">
        <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $servOne['s_contenu']?></textarea>
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