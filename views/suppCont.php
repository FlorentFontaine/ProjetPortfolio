<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
    ?>
    <div class="modif">
    <h1>Supprimer un Contact</h1>
        <form method="post" action="?c=contact&a=suppCont">
            <select name="id" id="id">
                <option>-choix Contact-</option>
                <?php
                foreach ($contacts as $value) {?>
                <option value="<?php echo $value['c_id']; ?>"><?php echo $value['c_titre']; ?></option>
                <?php }?>
            </select>
            <input type="submit" value="supprimer">
        </form>
    <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
</div>
<?php }