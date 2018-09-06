<?php

namespace Accueil;

class AccueilController {
    private $model;
    private $models;

    public function showAction() {
        require_once( 'models/RealisationModel.php' );
        require_once( 'models/ServicesModel.php' );
        $this->model = new \Realisation\RealisationModel; /* instanciation du model realisation avec leurs namespace */
        $this->models = new \Services\ServicesModel;
        $realisation = $this->model->selectAll();/* selection de tout les realisations */
        $services = $this->models->selectAllServ();/* selection de tout les services */
        include( 'views/accueil.php' );
    }
}