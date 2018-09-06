<?php

namespace contact;

class ContactController {
    private $model;

    public function __construct() {
        require_once( 'models/ContactModel.php' );
        $this->model = new ContactModel;
    }

     public function showAction() {
        $contact = $this->model->selectAllCont();/* selection de tout les contacts */
        include( 'views/contact.php' );
    }


    public function modifContAction($post=null){/* modification du contact */
        $err=null;
        $contacts = $this->model->selectAllCont();
        $contOne = $this->model->selectOneCont($post['id']);/* selection d'un contact */
        if(isset($_POST['email']) AND isset($_POST['titre']) AND isset($_POST['coordonnees'])){
            if(($_POST['email']!="") AND ($_POST['titre']!="") AND ($_POST['coordonnees']!="")){
                $cont = $this->model->modifCont($_POST['id'],$_POST['email'], $_POST['titre'], $_POST['coordonnees'], $_POST['user']);/* modifier le contact */
                header('Location: index.php?c=user&a=showGestion');/* retour gestion*/
            }
            else{
                $err='il manque un champs';
            }
        }
        include( 'views/modifCont.php' );
    }


    public function addContAction() {/* ajouter un contact */
        $err=null;
        if(isset($_POST['email']) AND isset($_POST['titre']) AND isset($_POST['coordonnees'])){
            if(($_POST['email']!="") AND ($_POST['titre']!="") AND ($_POST['coordonnees']!="")){
                $cont = $this->model->createCont($_POST['email'], $_POST['titre'], $_POST['coordonnees'], $_POST['user']);/* création d un contact */
            }
            else{
                $err='il manque un champs';
            }
        }
        include( 'views/addContact.php' );
    }

    public function suppContAction($post=null){/* supprimer un contact */
        $err=null;
        $contacts = $this->model->selectAllCont();
        if (isset($post)) {
        $cont = $this->model->suppOneCont($_POST['id']);
        header('Location: index.php?c=user&a=showGestion');
        }
                include( 'views/suppCont.php' );
    }

}
