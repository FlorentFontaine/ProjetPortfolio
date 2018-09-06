<?php
namespace vis;

class VisModel {


    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }
    
    /** 
     * [Inscrire les données de création de compte utilisateur dans la base de donnée.]
     * @param $name
     * @param $lname
     * @param $bday
     * @param $mail
     * @param $pseudo
     * @param $pass
     */
    public function createVis($name, $lname, $mail, $username, $pass){
        try {
            if ( ( $reponse = $this->pdo->prepare ('INSERT INTO vis(`vis_name`, `vis_l_name`, `vis_email`, `vis_username`, `vis_pass`) VALUES ( :name, :lname,  :mail , :username, :pass)' )  ) !== false ) {
                if( $reponse->execute(
                    array(
                        "name" => $name,
                        "lname" => $lname,
                        "mail" => $mail,
                        "username" => $username,
                        "pass" => $pass
                    ))){
                    $thisID = $this->pdo->lastInsertId() ;
                    return $thisID; // return le dernier id de l'insertion execute
                }
                else
                {
                    return false;
                }
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }
    }

    //verifie si un mail est deja existant dans la base de donnees retourne
    //false le mail existe pas!
    //retourne l'id de l'utilisateur
    
     /**
     * [verifie le mail user]
     * @param $mail string
     * return array
     */
    public function mailExist($mail) {
        try {
            if(( $reponse = $this->pdo->prepare ('SELECT * FROM vis WHERE vis_email = :mail')) !== false){
                if($reponse->execute(["mail"=>$mail])) {
                    if(($data = $reponse->fetch())!==false) {
                        if($data==null){
                            return false;
                        }
                        else{
                            return $data[0];
                        }
                    }
                }
            }
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }
    
     /**
     * [verifie le password user]
     * @param $mail string
     * return array
     */
    public function selectPwd($mail){
        $userID =  $this->mailExist($mail);
        if($userID!=false){
            if(( $reponse = $this->pdo->prepare ('SELECT * FROM vis WHERE vis_id = :id ')) !== false){
                if( $reponse->bindValue( 'id', $userID )) {
                    if($reponse->execute()){
                        if(($data = $reponse->fetch())!= false){
                                return $data;
                            }
                        }
                    }
                }
            }
        return false;
    }

    
    public function selectOne( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `vis` WHERE vis_id=:id ') )!==false ) {
            if( $statement->bindValue( 'id', $id ) ) {
                if( $statement->execute() ) {
                    if( ( $datas = $statement->fetch( \PDO::FETCH_ASSOC ) )!==false ) {
                        $statement->closeCursor();
                        return $datas;
                    }
                }
            }
        }
        return false;
    }


    //la function verifie si le mail est le mot de pass coincide
    //true oui
    //false non
    
     /**
     * [verifie le mail et le password user]
     * @param $mail string
     * @param $pass string
     * return array
     */
    public function goodPass($mail, $pass) {
        $userID =  $this->mailExist($mail);
        if($userID!==false) {
            if(( $reponse = $this->pdo->prepare ('SELECT vis_id FROM vis WHERE vis_id = :id AND vis_pass = :pass')) !== false){
                if($reponse->execute(["id"=>$userID,"pass"=>$pass])){
                    if(($data = $reponse->fetch())!== false){
                        if(!empty($data)) {
                            return $data[0];
                        }
                    }
                }
            }
        }
        return false;
    }
    
     /**
     * [select les message visiteur]
     * @param $id int
     * return array
     */
    public function selectAllMessVis($id) {
            if( ( $statement = $this->pdo->prepare( 'SELECT * FROM `messages` WHERE `visiteur_fk` = :id' ) )!==false ) {
                if ($statement->bindValue("id", $id)){
                    if( $statement->execute() ) {
                        if( ( $datas = $statement->fetchall( \PDO::FETCH_ASSOC ) )!==false ) {
                            return $datas;
                        }
                    return false;
                    }
                }
            }
        }


    /** 
     * [Récupère les données d'un compte utilisateur spécifique dans la base de donnée.]
     * @param $user_id [ ID utilisateur]
     * return array
     */
    public function select($user_id) {
        if( ( $statement = $this->pdo->prepare( 'SELECT * FROM `vis` WHERE `vis_id` = :id' ) )!==false ){
            if ($statement->bindValue("id", $user_id)){
                if( $statement->execute() ) {
                    if( ( $datas = $statement->fetch( \PDO::FETCH_ASSOC ) )!==false ) {
                        return $datas;
                    }
                return false;
                }
            }
        }
    }

    
     /**
     * [crée un message pour le user de l'utilisateur]
     * @param $titre string
     * @param $texte string
     * @param $user int
     * return array
     */    
    public function createMess( $titre, $texte, $user){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO messages(`mess_titre`, `mess_descript`, `date`, `visiteur_fk`) VALUES ( :titre, :texte, NOW(), :user )' )  ) !== false ) {
            if( $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'user', $user)){
                if( $requete->execute() ) {
                }
            }
        }
    }

}