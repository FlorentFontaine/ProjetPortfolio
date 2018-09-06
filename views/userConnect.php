<?php include( 'header.php' );

    if(isset($_POST['email']) AND isset($_POST['pass'])){
        $pwd = $this->model->selectPwd($_POST['email']);
        if (password_verify($_POST['pass'],$pwd['u_pwd'])==true) {// verifie le mot de passe crypté
            $_SESSION['user'] = serialize($this->model->selectOne($pwd['u_id']));
            header('Location: index.php');
            exit;
        }
        else{
            echo 'les infos ne sont pas correct';
        }
    }
    ?>
        <div class="modifier">
            <?php
            if(!isset($_SESSION['user'])){
            ?>
            <h1>Connection à l'interface de gestion</h1>
            <form method="post" action="?c=user">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>
             <?php
            }