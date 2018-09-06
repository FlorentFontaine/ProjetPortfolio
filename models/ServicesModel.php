<?php


namespace services;

class ServicesModel {
    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }
    
     /**
     * [select les services]
     * return array
     */
    public function selectAllServ() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `services`
            inner join user on u_id = s_auteur_fk ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }
    
     /**
     * [select un service]
     * @param $id int
     * return array
     */
    public function selectOneServ( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `services`  WHERE `s_id`=:id' ) )!==false ) {
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
     * [modifie un service]
     * @param $id int
     * @param $img string
     * @param $titre string
     * @param $texte string
     * @param $user int
     * return array
     */
    public function modifServ($id, $img, $titre, $texte, $user) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `services` SET `s_titre`=:titre , `s_contenu`=:texte, `s_img`=:img, `s_auteur_fk`=:user WHERE `s_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'img', $img) && $requete->bindValue( 'user', $user)){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [crée un service]
     * @param $img string
     * @param $titre string
     * @param $texte string
     * @param $user int
     */
    public function createServ($img, $titre, $texte, $user){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO services(`s_titre`, `s_contenu`, `s_date`, `s_img`, `s_auteur_fk`) VALUES ( :titre, :texte, now(), :img, :user )' )  ) !== false ) {
            if( $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'img', $img) && $requete->bindValue( 'user', $user)){
                if( $requete->execute() ) {
                }
            }
        }
    }

    
     /**
     * [supprime un service]
     * @param $id int
     */
    public function suppOneServ( $id ) {
        if( ( $statement = $this->pdo->prepare( 'DELETE FROM `services`  WHERE `s_id`=:id' ) )!==false ) {
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