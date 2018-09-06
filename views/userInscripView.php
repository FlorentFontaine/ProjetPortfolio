<?php include( 'header.php' ); 
            if(!isset($_SESSION['visiteur'])){
                ?>
                <div class="inscript">
                <div class ="titre">Création de compte</div>
                <form method="post" action="?c=vis&a=create">
                    <input type="text" name="newName" id="newName" placeholder="Nom">
                    <input type="text" name="newLname" id="newLname" placeholder="Prénom">
                    <input type="text" name="newUserName" id="newUserName" placeholder="Pseudo">
                    <input type="text" name="newEmail" id="newEmail" placeholder="Email">
                    <input type="text" name="newPass" id="newPass" placeholder="Password"><br>
                    <input type="submit" value="Creation">
                </form>
                <?php
            }
            else { 
                echo '<div class="perso">Espace personnel :  '.ucfirst($_SESSION['visiteur']['vis_email']) ;
                echo'<a href="?destroy" title="">Se déconnecter</a></div>';
                ?>
                    <h1>Envoyer un message</h1>
                    <form method="post" action="?c=vis&a=addMess">
                        <input type="text" name="titre" id="titre" placeholder="Titre">
                        <textarea name="descript" id="descript" cols="50" rows="15" placeholder="Votre message"></textarea>
                        <input type="submit" value="Envoi">
                    </form>
                </div>
            </div>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Titre</th> 
                    <th>Message</th>
                </tr>
                <?php
                foreach ($contact as $value) {
                    echo '<div class ="cont">';
                        echo '<div class ="contAcceuil">';
                        echo '<tr><td>' .$value['date'].'</td>';
                            echo '<td>' .$value['mess_titre'].'</td>';
                            echo '<td>' .$value['mess_descript'].'</td>';
                    echo "</tr>";
                }
                echo '</table>';
            }
            ?>