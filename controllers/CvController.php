<?php

namespace cv;

class CvController {
    private $model;

    public function __construct() {
        require_once( 'models/CvModel.php' );
        $this->model = new CvModel;
    }

    public function showAction() {/* selectionner partie du CV */
        $cvComp = $this->model->selectCompCv();
        $cvForm = $this->model->selectFormCv();
        $cvExp = $this->model->selectExpCv();
        $cvDiv = $this->model->selectDivCv();
        include( 'views/cv.php' );
    }


    public function modifCvAction($post=null){/* modifier le CV */
        $err=null;
        $part = $this->model->selectPart();/* selectionner la partie du CV */
        $cv = $this->model->selectAllCv($post['part']);/* selectionner le contenu de la partie du CV */
            if (isset($post['id'])) {
                $cvOne = $this->model->selectOneCv($post['id']);
            }
            /* maintenant modifier la partie selectionnée */
            if(isset($_POST['descript']) AND isset($_POST['id'])){
                if(($_POST['descript']!="") && ($_POST['id']!="") ){
                    $this->model->modifCompCv($_POST['id'], $_POST['descript']);
                    header('Location: index.php?c=user&a=showGestion');
                }
            }
            if(isset($_POST['descript']) AND isset($_POST['id']) && isset($_POST['date'])){
                if(($_POST['descript']!="") && ($_POST['id']!="") AND ($_POST['date']!="")){
                    $this->model->modifFormCv($_POST['id'], $_POST['descript'], $_POST['date']);
                    header('Location: index.php?c=user&a=showGestion');
                }
            }
            if(isset($_POST['descript']) AND isset($_POST['id']) && isset($_POST['date']) && isset($_POST['ville'])){
                if(($_POST['descript']!="") && ($_POST['id']!="") AND ($_POST['date']!="") AND ($_POST['ville']!="")){
                    $this->model->modifExpCv($_POST['id'], $_POST['descript'], $_POST['date'] ,$_POST['ville']);
                    header('Location: index.php?c=user&a=showGestion');
                }
            }
            if(isset($_POST['descript']) AND isset($_POST['id']) && isset($_POST['titre'])){
                if(($_POST['descript']!="") && ($_POST['id']!="") AND ($_POST['titre']!="") ){
                    $this->model->modifDivCv($_POST['id'], $_POST['descript'], $_POST['titre']);
                    header('Location: index.php?c=user&a=showGestion');
                }
            }
        include( 'views/modifCv.php' );
    }
    

    public function addCvAction() {/* ajouter une desc à la partie du CV */
        if(isset($_POST['descript']) AND isset($_POST['part'])){
            if(($_POST['descript']!="") AND ($_POST['part']==1)){
                $this->model->createCvComp( $_POST['descript'],$_POST['part'] );
                header('Location: index.php?c=user&a=showGestion');
            }
        }
        if(isset($_POST['descript']) AND isset($_POST['date']) AND isset($_POST['part'])){
            if(($_POST['descript']!="")AND ($_POST['date']!="") AND ($_POST['part']==2)){
                $this->model->createCvForm( $_POST['descript'],$_POST['date'], $_POST['part'] );
                header('Location: index.php?c=user&a=showGestion');
            }
        }    
        if(isset($_POST['descript']) AND isset($_POST['date']) AND isset($_POST['part'])AND isset($_POST['ville'])){
            if(($_POST['descript']!="")AND ($_POST['date']!="") AND ($_POST['part']==3)AND ($_POST['ville']!="")){
                $this->model->createCvExp( $_POST['descript'],$_POST['date'], $_POST['part'],$_POST['ville'] );
                header('Location: index.php?c=user&a=showGestion');
            }
        }
        if(isset($_POST['descript']) AND isset($_POST['titre']) AND isset($_POST['part'])){
            if(($_POST['descript']!="")AND ($_POST['titre']!="") AND ($_POST['part']==4)){
                $this->model->createCvDiv( $_POST['descript'],$_POST['titre'], $_POST['part'] );
                header('Location: index.php?c=user&a=showGestion');
            }
        }  
        $part = $this->model->selectPart();
        include( 'views/addCv.php' );
    }

    public function suppCvAction($post=null){/* supprimer une desc à la partie du CV */
        $err=null;
        $part = $this->model->selectPart();
            if (isset($post['part'])) {
                $cv = $this->model->selectAllCv($_POST['part']);
            }
            if (isset($_POST['id'])) {
                $this->model->suppOneCv($_POST['id']);
                header('Location: index.php?c=user&a=showGestion');
            }
        include( 'views/suppCv.php' );
    }

}
