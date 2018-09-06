<?php include( 'gestion.php' );

if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
        <div class="modif">
            <h1>Créer un nouvel utilisateur</h1>
            <form method="post" action="?c=user&a=create">
                <input type="text" name="newName" id="newName" placeholder="Nom">
                <input type="text" name="newLname" id="newLname" placeholder="Prénom">
                <input type="text" name="newEmail" id="newEmail" placeholder="Email">
                <input type="text" name="newPass" id="newPass" placeholder="Password">

                <select name="rang" id="rang">
                    <?php
                    foreach ($rang as $key => $value) {?>
                    <option value="<?php echo $value['r_id']; ?>"><?php echo $value['r_libelle']; ?></option>
                    <?php }?>
                </select>
                <input type="submit" value="Creation">
            </form>
        </div>
    </div>
<?php }?>

