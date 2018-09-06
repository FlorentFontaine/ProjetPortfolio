<?php
namespace services;

class ServicesController {
    private $model;

    public function __construct() {
        require_once( 'models/ServicesModel.php' );
        $this->model = new ServicesModel;
    }

     public function showAction() {
        $services = $this->model->selectAllServ();
        include( 'views/services.php' );
    }

    public function modifServAction($post=null){/* modifier un service */
        $err=null;
        $services = $this->model->selectAllServ();
        $servOne = $this->model->selectOneServ($post['id']);
            if(isset($_POST['img']) AND isset($_POST['titre']) AND isset($_POST['descript'])){
                if(($_POST['img']!="") AND ($_POST['titre']!="") AND ($_POST['descript']!="")){
                    $serv = $this->model->modifServ($_POST['id'], $_POST['img'], $_POST['titre'], $_POST['descript'],$_POST['user']);
                    header('Location: index.php?c=user&a=showGestion');
                }
                else{
                    $err='il manque un champs';
                }
            }
        include( 'views/modifServ.php' );
    }


     public function addServAction() {/* ajouter un service */
        $err=null;
            if(isset($_POST['img']) AND isset($_POST['titre']) AND isset($_POST['descript'])){
                if(($_POST['img']!="") AND ($_POST['titre']!="") AND ($_POST['descript']!="")){
                    $serv = $this->model->createServ($_POST['img'], $_POST['titre'], $_POST['descript'], $_POST['user']);
                }
                else{
                    $err='il manque un champs';
                }
            }
        include( 'views/addService.php' );
    }



    public function suppServAction($post=null){/* supprimer un service */
        $err=null;
        $services = $this->model->selectAllServ();
            if (isset($post)) {
                $real = $this->model->suppOneServ($_POST['id']);
                header('Location: index.php?c=user&a=showGestion');
            }
        include( 'views/suppServ.php' );
    }


}

