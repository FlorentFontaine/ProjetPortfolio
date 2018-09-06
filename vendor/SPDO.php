<?php
class SPDO {
    private $db;
    private static $instance;

    public function getDb() {
        return $this->db;
    }

    public static function getInstance() {
        if( is_null( self::$instance ) ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    protected function __construct() {/* instanciation du pdo pour la connection à la base de donnée */
        try {
            $this->db = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_LOGIN, DB_PWD );
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }
}