<?php  include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
    <h1>Ajouter un Service</h1>
        <form method="post" action="?c=services&a=addServ">
            <input type="text" name="img" id="img" placeholder="lien image">
            <input type="text" name="titre" id="titre" placeholder="Titre">
            <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
            <input type="hidden" name="user" id="user" value="<?php
               $obj= unserialize( $_SESSION['user']);
               echo $obj['u_id'];
             ?>">
            <input type="submit" value="creation">
        </form>
        <?php 
        if (isset($err)) {?>
            <p style="background-color: red; width: 50%; font-size: 15px; text-align: center; margin:auto;"><?php echo $err?></p>
        <?php } ?>
    </div>
</div>
<?php
}