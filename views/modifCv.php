<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
?>
    <div class="modif">
    <h1>Modifier une CV</h1>
        <form method="post" action="?c=cv&a=modifCv">
                <select name="part" id="part">
                    <option>-Choix Theme-</option>
                    <?php
                    foreach ($part as $key => $value) {?>
                    <option value="<?php echo $value['part_id']; ?>"><?php echo $value['part_libelle']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Choisir">
<?php

if (isset( $_POST['part']) && $_POST['part']==1) {
    if (isset($_POST['part']) && $_POST['part']==1 ) {?>
        <form method="post" action="?c=cv&a=modifCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                    <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
        <input type="submit" value="Choisir">
        </form>
<?php }?>

<?php
    if (isset($_POST['id'])) {?>
    <form method="post" action="?c=cv&a=modifCv">
            <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $cvOne['cv_contenu']?></textarea>
            <input type="hidden" name="user" id="user" value="<?php
            $obj= unserialize( $_SESSION['user']);
            echo $obj['u_id'];
            ?>">
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
            <input type="submit" value="modifier">
        </form>
    <?php
    }
}

if (isset( $_POST['part']) && $_POST['part']==2) {
    if (isset($_POST['part']) && $_POST['part']==2 ) {?>
        <form method="post" action="?c=cv&a=modifCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                    <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
        <input type="submit" value="Choisir">
        </form>
<?php }?>

<?php
    if (isset($_POST['id'])) {?>
    <form method="post" action="?c=cv&a=modifCv">
            <input type="number" min="1900" max="2099" name="date" id="date" value="<?php echo $cvOne['annee']?>">
            <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $cvOne['cv_contenu']?></textarea>
            <input type="hidden" name="user" id="user" value="<?php
            $obj= unserialize( $_SESSION['user']);
            echo $obj['u_id'];
            ?>">
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
            <input type="submit" value="modifier">
        </form>
    <?php
    }
}

if (isset( $_POST['part']) && $_POST['part']==3) {
    if (isset($_POST['part']) && $_POST['part']==3 ) {?>
        <form method="post" action="?c=cv&a=modifCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                    <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
        <input type="submit" value="Choisir">
        </form>
<?php }?>

<?php
    if (isset($_POST['id'])) {?>
    <form method="post" action="?c=cv&a=modifCv">
            <input type="number" min="1900" max="2099" name="date" id="date" value="<?php echo $cvOne['annee']?>">
            <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $cvOne['cv_contenu']?></textarea>
            <input type="text" name="ville" id="ville" value="<?php echo $cvOne['cv_ville']?>">
            <input type="hidden" name="user" id="user" value="<?php
            $obj= unserialize( $_SESSION['user']);
            echo $obj['u_id'];
            ?>">
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
            <input type="submit" value="modifier">
        </form>
    <?php
    }
}

if (isset( $_POST['part']) && $_POST['part']==4) {
    if (isset($_POST['part']) && $_POST['part']==4 ) {?>
        <form method="post" action="?c=cv&a=modifCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                    <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="hidden" name="part" value="<?php echo $_POST['part']?>">
        <input type="submit" value="Choisir">
        </form>
<?php }?>

<?php
    if (isset($_POST['id'])) {?>
    <form method="post" action="?c=cv&a=modifCv">
            <input type="text" name="titre" id="titre" value="<?php echo $cvOne['cv_titre']?>">
            <textarea name="descript" id="descript" cols="50" rows="15"><?php echo $cvOne['cv_contenu']?></textarea>
            <input type="hidden" name="user" id="user" value="<?php
            $obj= unserialize( $_SESSION['user']);
            echo $obj['u_id'];
            ?>">
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
            <input type="submit" value="modifier">
        </form>
    </div>
    <?php
    }
}
}
