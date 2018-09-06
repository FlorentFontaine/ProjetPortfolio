<?php 
            if(!isset($_SESSION['visiteur'])){
            ?>
            <div class ="titre">Connexion</div>
<form method="post" action="?c=vis&a=connect">
    <input type="text" name="email" id="email" placeholder="Email">
    <input type="password" name="pass" id="pass" placeholder="Password"><br>
    <input type="submit" value="Connexion">
</form>
</div>
<?php
            }

            include( 'footer.php' ); ?>
            