<?php


namespace rang;

class RangController {
    private $model;

    public function __construct() {
        require_once( 'models/RangModel.php' );
        $this->model = new RangModel;
    }

     public function showAction() {
        $rang = $this->model->selectAll();
    }
}