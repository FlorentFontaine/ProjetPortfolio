<?php

namespace vis;

class VisController{

    private $model;

    public function __construct(){
        require_once( 'models/VisModel.php' );
        $this->model = new VisModel;
    }
    
    public function showAction() {
        if (isset($_SESSION['visiteur'])) {/* recuperation de la session visiteur*/
            $contact = $this->model->selectAllMessVis($_SESSION['visiteur']['vis_id']);
        }
            require_once('views/userInscripView.php');
            require_once('views/userConnectView.php');
    }

    public function createAction($params){ /* création visiteur */
        $name = $params['newName'];
        $lname = $params['newLname'];
        $mail = $params['newEmail'];
        $username = $params['newUserName'];
        $pass = $params['newPass'];
        $a = $this->model->createVis($name, $lname, $mail, $username, $pass);
        if(is_numeric($a)){ /* verifier le return qu'il soit numerique*/
            return $a;
        }
        return false;
    }


    public function connectAction($params){ /* connection visiteur */
        $mail = $params['email'];
        $pass = $params['pass'];
        $this->model->goodPass($mail, $pass);/* verifier le pwd visiteur */
        if($this->model->goodPass($mail, $pass)!==false){
            $a = $this->model->goodPass($mail, $pass);
            $_SESSION['visiteur'] = $this->model->select($a);/* enregistrer le visiteur dans une session*/
            $visiteur=serialize($_SESSION['visiteur']);/* serialize la session visiteur */
                header('location: index.php?c=vis' );
        }
        return false;
    }

    
    public function addMessAction() {/* envoyer message du visiteur */
        $err=null;
        if(isset($_POST['titre']) AND isset($_POST['descript'])){
            if(($_POST['titre']!="") AND ($_POST['descript']!="")){
                $cont = $this->model->createMess($_POST['titre'], $_POST['descript'],$_SESSION['visiteur']['vis_id'] );
                header('location: index.php?c=vis' );
            }
        }
    }
}
