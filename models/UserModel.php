<?php

namespace user;

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }

    
     /**
     * [crée un user]
     * @param $name string
     * @param $lname string
     * @param $mail string
     * @param $pass string
     * @param $rang int
     */
    public function createUser($name, $lname, $mail, $pass, $rang){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO user(`u_prenom`, `u_nom`, `u_email`, `u_pwd`, `u_rang_fk`) VALUES ( :name, :lname, :mail , :pass, :rang )' )  ) !== false ) {
            if( $requete->bindValue( 'name', $name) && $requete->bindValue( 'lname', $lname) && $requete->bindValue( 'mail', $mail) && $requete->bindValue( 'pass', $pass) && $requete->bindValue( 'rang', $rang)){
                if( $requete->execute() ) {
                }
            }
        }
    }
    
     /**
     * [select rang]
     * return array
     */
    public function selectRang() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `rang` ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                return $datas;
            }
        }
        return false;
    }
    
     /**
     * [select tout les user]
     * return array
     */
    public function selectAll() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `user` ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }

    
     /**
     * [select un user]
     * @param $id int
     * return array
     */
    public function selectOne( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `user`
            inner join rang on r_id = u_rang_fk  WHERE u_id=:id ') )!==false ) {
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


     /**
     * [verifie le mail user]
     * @param $mail string
     * return array
     */
    public function mailExist($mail){
        if(( $reponse = $this->pdo->prepare ('SELECT u_id FROM user WHERE u_email = :mail')) !== false){
            if( $reponse->bindValue( 'mail', $mail ) ) {
                if($reponse->execute()){
                    if(($data = $reponse->fetch())!= false){
                        if($data[0]==null){
                            return false;
                        }
                        else{
                            return $data[0];
                        }
                    }
                }
            }
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
            if(( $reponse = $this->pdo->prepare ('SELECT * FROM user WHERE u_id = :id ')) !== false){
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


    
     /**
     * [verifie le mail et le password user]
     * @param $mail string
     * @param $pass string
     * return array
     */
    public function goodPass($mail, $pass){
        $userID =  $this->mailExist($mail);
        if($userID!=false){
            if(( $reponse = $this->pdo->prepare ('SELECT u_id FROM user WHERE u_id = :id AND u_pwd = :pass')) !== false){
                if( $reponse->bindValue( 'id', $userID )  && $reponse->bindValue( 'pass', $pass)) {
                    if($reponse->execute()){
                        if(($data = $reponse->fetch())!= false){
                            if(!empty($data)){
                                return $data[0];
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
     /**
     * [verifie le mail et le password user]
     * @param $session int
     * return array
     */
    public function selectOneRang($session) {
        if( ( $statement = $this->pdo->prepare( 'SELECT * FROM user
            inner join rang on r_id = u_rang_fk  WHERE u_id=:id ') )!==false ) {
            if( $statement->bindValue( 'id', $session )) {
                if($statement->execute()){
                    if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                        return $datas;
                    }
                }
            }
        }
    }
}