<?php include( 'gestion.php' );
if(!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
else{
    ?>
    <div class="modif">
    <h1>Supprimer un CV</h1>
        <form method="post" action="?c=cv&a=suppCv">
                <select name="part" id="part">
                    <option>-Choix Theme-</option>
                    <?php
                    foreach ($part as $key => $value) {?>
                    <option value="<?php echo $value['part_id']; ?>"><?php echo $value['part_libelle']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Choisir">
    <?php

if (isset($_POST['part']) && $_POST['part']==1 ) {?>
        <form method="post" action="?c=cv&a=suppCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                      <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Supprimer">
</div>
</div>
<?php
}

if (isset($_POST['part']) && $_POST['part']==2 ) {?>
        <form method="post" action="?c=cv&a=suppCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                      <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Supprimer">
</div>
</div>
<?php
}

if (isset($_POST['part']) && $_POST['part']==3 ) {?>
           <form method="post" action="?c=cv&a=suppCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                      <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Supprimer">
</div>
</div>
<?php
}if (isset($_POST['part']) && $_POST['part']==4 ) {?>
        <form method="post" action="?c=cv&a=suppCv">
                <select name="id" id="id">
                    <?php
                    foreach ($cv as $key => $value) {?>
                      <option value="<?php echo $value['cv_id']; ?>"><?php echo $value['cv_contenu']; ?></option>
                    <?php }?>
                </select>
        <input type="submit" value="Supprimer">
</div>
</div>
<?php
}
}
