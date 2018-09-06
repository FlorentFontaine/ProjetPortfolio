<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
    <h1>Modifier un Contact</h1>
        <form method="post" action="?c=contact&a=modifCont">
            <select name="id" id="id">
                <option>-choix Contact-</option>
                <?php
                foreach ($contacts as $value) {?>
                <option value="<?php echo $value['c_id']; ?>"><?php echo $value['c_titre']; ?></option>
                <?php }?>
            </select>
            <input type="submit" value="Choisir">
        </form>
    <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
<?php





if (isset($_POST['id'])) {?>
    <form method="post" action="?c=contact&a=modifCont">
        <input type="text" name="email" id="email" value="<?php echo $contOne['c_email']?>" placeholder="Email">
        <input type="text" name="titre" id="titre" value="<?php echo $contOne['c_titre']?>" placeholder="Titre">
        <textarea name="coordonnees" id="coordonnees" cols="50" rows="15"  placeholder="Coordonnées"><?php echo $contOne['c_coordonnees']?></textarea>
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