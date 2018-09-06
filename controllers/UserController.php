<?php

namespace user;

class UserController {
    private $model;

    public function __construct() {
        require_once( 'models/UserModel.php' );
        $this->model = new UserModel;/* instanciation du model user */
    }

     public function showAction() {/* contraint controller */
        include( 'views/userConnect.php' );
    }

    public function showGestionAction(){
        include( 'views/gestion.php' );
    }

    public function showConnectAction() {
        $rang = $this->model->selectRang();/* selectionner rang user */
        include( 'views/user.php' );
    }

    public function createAction($post) {
        $err=null;
        $pwd=password_hash($_POST['newPass'],  PASSWORD_BCRYPT);/* crypter l'enregistrement du user */
        if(isset($_POST['newName']) AND isset($_POST['newLname']) AND isset($_POST['newEmail']) AND isset($pwd)){/* verifier l'existance*/
            if(($_POST['newName']!="") AND ($_POST['newLname']!="") AND ($_POST['newEmail']!="") AND $pwd!=""){/* verifier la presence*/
                $user = $this->model->createUser($_POST['newName'], $_POST['newLname'], $_POST['newEmail'], $pwd,$_POST['rang']); /* création du user*/
                $this->showConnectAction();/* connection de l'utilisateur*/
            }
            else{
                $this->showAction();/* sinon retour à la page principale */
                echo"il manque des informations";
            }
        }
    }

}