<?php
class SRequest {
    private $post;
    private $get;
    private $session;

    protected static $instance;

    private function __construct() {
        if( is_null( session_id() ) )
            session_start();//demarrer la session 
        $this->post = $_POST;//recuperation des post
        $this->get = $_GET;//recuperation des get
        $this->session = &$_SESSION;//recuperation des session entré/sortie
        $_POST = $_GET = null;
    }

    public static function getInstance() {//instancier le srequest si il n'est pas deja lancé
        if( !isset( self::$instance ) ) {
            self::$instance = new SRequest();
        }

        return self::$instance;
    }

    public function post( $key = null ) {//recuperer la key du post
        if( isset( $key ) )
            return $this->post[$key];
        else
            return $this->post;
    }

    public function get( $key = null ) {//recuperer la key du get
        if( isset( $key ) )
            return $this->get[$key];
        else
            return $this->get;
    }

    public function getSession( $key = null ) {//recuperer la key de la session
        if( isset( $key ) )
            return $this->session[$key];
        else
            return $this->session;
    }

    public function setSession( $key, $value ) {// setter les clés et valeurs de la session
        $this->session[$key] = $value;
    }

}