<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
    ?>
    <div class="modif">
    <h1>Supprimer une Réalisation</h1>
        <form method="post" action="?c=realisation&a=suppReal">
            <select name="id" id="id">
                <option>-choix Réalisation-</option>
                <?php
                foreach ($realisation as $value) {?>
                <option value="<?php echo $value['r_id']; ?>"><?php echo $value['r_titre']; ?></option>
                <?php }?>
            </select>
            <input type="submit" value="supprimer">
        </form>
    <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
</div>
<?php }