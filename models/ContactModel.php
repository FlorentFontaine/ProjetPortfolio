<?php

namespace contact;

class ContactModel {

    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }

      /**
     * [Selection des contacts.]
     * return array
     */
    public function selectAllCont() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `contact`
            inner join user on u_id = c_auteur_fk LIMIT 1') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }

      /**
     * [selection contact visiteur]
     * @param $email string
     * return array
     */
    public function selectAllContVis($email) {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `contact`
             WHERE `vis_email`=:email ') )!==false ) {
            if( $statement->bindValue( 'email', $email) ) {
                if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                    $statement->closeCursor();
                    return $datas;
                }
            }
        return false;
        }
    }

     /**
     * [modifier contact]
     * @param $id int
     * @param $email string
     * @param $titre string
     * @param $texte string
     * @param $user int
     * return array
     */
    public function modifCont($id, $email, $titre, $texte, $user) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `contact` SET `c_titre`=:titre , `c_coordonnees`=:texte, `c_email`=:email, `c_auteur_fk`=:user WHERE `c_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'email', $email) && $requete->bindValue( 'user', $user)){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [créer contact]
     * @param $mail string
     * @param $titre string
     * @param $texte string
     * @param $user int
     */
    public function createCont($mail, $titre, $texte,  $user){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO contact(`c_titre`, `c_coordonnees`, `c_email`, `c_auteur_fk`) VALUES ( :titre, :texte, :mail, :user )' )  ) !== false ) {
            if( $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'mail', $mail) && $requete->bindValue( 'user', $user)){
                if( $requete->execute() ) {
                }
            }
        }
    }

     /**
     * [select un contact]
     * @param $id int
     * return array
     */
    public function selectOneCont( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `contact`  WHERE `c_id`=:id' ) )!==false ) {
            if( $statement->bindValue( 'id', $id) ) {
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
     * [supprime contact]
     * @param $id int
     */
    public function suppOneCont( $id ) {
        if( ( $statement = $this->pdo->prepare( 'DELETE FROM `contact`  WHERE `c_id`=:id' ) )!==false ) {
            if( $statement->bindValue( 'id', $id) ) {
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

}