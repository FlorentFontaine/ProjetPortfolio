<?php
namespace Realisation;

class RealisationController {
    private $model;

    public function __construct() {
        require_once( 'models/RealisationModel.php' );
        $this->model = new RealisationModel;
    }

    public function showAction() {
        $realisations = $this->model->selectAllReal();
        include( 'views/realisation.php' );
    }


    public function modifRealAction($post=null){/* modifier une realisation */
        $err=null;
        $realisation = $this->model->selectAllReal();
        $realOne = $this->model->selectOneReal($post['id']);
            if(isset($_POST['img']) AND isset($_POST['titre']) AND isset($_POST['descript']) AND isset($_POST['lien'])){
                if(($_POST['img']!="") AND ($_POST['titre']!="") AND ($_POST['descript']!="") AND $_POST['lien']!=""){
                    $real = $this->model->modifReal($_POST['id'], $_POST['img'], $_POST['titre'], $_POST['descript'], $_POST['lien'],$_POST['user']);
                    header('Location: index.php?c=user&a=showGestion');
                }
                else{
                    $err='il manque un champs';
                }
            }
        include( 'views/modifReal.php' );
    }


    public function suppRealAction($post=null){/* supprimer une realisation */
        $err=null;
        $realisation = $this->model->selectAllReal();
            if (isset($post)) {
                $real = $this->model->suppOneReal($_POST['id']);
                header('Location: index.php?c=user&a=showGestion');
            }
                include( 'views/suppReal.php' );
    }


    public function addRealAction() {/* ajouter une realisation */
        if(isset($_POST['img']) AND isset($_POST['titre']) AND isset($_POST['descript']) AND isset($_POST['lien'])){
            if(($_POST['img']!="") AND ($_POST['titre']!="") AND ($_POST['descript']!="") AND $_POST['lien']!=""){
                $real = $this->model->createReal($_POST['img'], $_POST['titre'], $_POST['descript'], $_POST['lien'],$_POST['user']);
            }
            else{
                $err='il manque un champs';
            }
        }
        include( 'views/addRealisation.php' );
    }


}
