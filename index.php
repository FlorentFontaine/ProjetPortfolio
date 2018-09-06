<?php
session_start();
//constante pour la connexion à la base de donnée
define( 'DB_HOST', 'localhost' );
define( 'DB_NAME', 'portfolio' );
define( 'DB_LOGIN', 'root' );
define( 'DB_PWD', '' );

require_once( 'vendor/SPDO.php' );
require_once( 'vendor/SRequest.php' );



function loadClass( $className ) {//chargement des classes 
    $_str_file = 'classes/' . strtolower( $className ) . '.class.php';
    if( file_exists( $_str_file ) )
        require_once( $_str_file );
}
spl_autoload_register( 'loadClass' );


// convention de nomage controller
if( isset( $_GET['c'] ) ) {
    $controllerName = ucfirst( strtolower( $_GET['c'] ) ) . 'Controller';
    $controllerEscName = '\\'.ucfirst( strtolower( $_GET['c'] ) ).'\\'.ucfirst( strtolower( $_GET['c'] ) ) . 'Controller';
} else {
    $controllerName = 'AccueilController';
    $controllerEscName = '\\Accueil\\AccueilController';
}

if( file_exists( 'controllers/' . $controllerName . '.php' ) ) {
    require_once( 'controllers/' . $controllerName . '.php' );

    if( class_exists( $controllerEscName ) ) {
        //instancie le controller
        $controller = new $controllerEscName;

        if( isset( $_GET['a'] ) ) {
            $actionName = $_GET['a'] . 'Action';//charge la nomination action
        } else {
            $actionName = 'showAction';
        }

        if( isset( $_GET['id'] ) && ctype_digit( $_GET['id'] ) ) {// lance la fonction convention Action
            $controller->$actionName( $_GET['id'] );
        } else {
            if(isset($_POST) && count($_POST)>0){
                $controller->$actionName($_POST);
            } else {
                $controller->$actionName();
            }
        }
    }

}