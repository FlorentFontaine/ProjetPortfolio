<?php include( 'gestion.php' );

if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
        <h1>Ajouter une CV </h1>

    <form method="post" action="?c=cv&a=addCv">
                <select name="part" id="part">
                    <option>--</option>
                    <?php
                    foreach ($part as $key => $value) {?>
                    <option value="<?php echo $value['part_id']; ?>"><?php echo $value['part_libelle']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Choisir">
                <?php

if (isset($_POST['part']) && $_POST['part']==1 ) {?>
            <form method="post" action="?c=cv&a=addCv">
                <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
                <input type="hidden" name="user" id="user" value="<?php
                $obj= unserialize( $_SESSION['user']);
                echo $obj['u_id'];
                ?>">
                <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
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

if (isset($_POST['part']) && $_POST['part']==2 ) {?>
    <form method="post" action="?c=cv&a=addCv">
        <input type="number" min="1900" max="2099" name="date" id="date" placeholder="Année">
        <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
        <input type="hidden" name="user" id="user" value="<?php
           $obj= unserialize( $_SESSION['user']);// recupere les données sessions pour  l'id
           echo $obj['u_id'];
         ?>">
        <input type="hidden" name="part" value="<?php echo $_POST['part'] // renvoyer l'id partie du cv?>">
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

if (isset($_POST['part']) && $_POST['part']==3 ) { // si la partie du cv correspond et existe?>
        
    <form method="post" action="?c=cv&a=addCv">
        <input type="number" min="1900" max="2099" name="date" id="date" placeholder="Année">
        <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
        <input type="text" name="ville" id="ville" placeholder="ville">
        <input type="hidden" name="user" id="user" value="<?php
           $obj= unserialize( $_SESSION['user']);
           echo $obj['u_id'];
         ?>">
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
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

if (isset($_POST['part']) && $_POST['part']==4 ) {// si la partie du cv correspond et existe?>
        
    <form method="post" action="?c=cv&a=addCv">
        <input type="text" name="titre" id="titre" placeholder="Titre">
        <textarea name="descript" id="descript" cols="50" rows="15"></textarea>
        <input type="hidden" name="user" id="user" value="<?php
           $obj= unserialize( $_SESSION['user']);
           echo $obj['u_id'];
         ?>">
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
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
}