<?php
namespace Realisation;

class RealisationModel {
    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }
    
     /**
     * [select les realisations jusqu'a 5]
     * return array
     */
    public function selectAll() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `realisation`
            inner join user on u_id = r_auteur_fk order by r_id desc limit 5') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }

    
     /**
     * [select toutes les realisations]
     * return array
     */
    public function selectAllReal() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `realisation`
            inner join user on u_id = r_auteur_fk  ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }
    
     /**
     * [select une real]
     * @param $id int
     * return array
     */
    public function selectOneReal( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `realisation`  WHERE `r_id`=:id' ) )!==false ) {
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
     * [supprime une real]
     * @param $id int
     */
    public function suppOneReal( $id ) {
        if( ( $statement = $this->pdo->prepare( 'DELETE FROM `realisation`  WHERE `r_id`=:id' ) )!==false ) {
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
     * [crée une real]
     * @param $img string
     * @param $titre string
     * @param $texte string
     * @param $lien string
     * @param $user int
     */
    public function createReal($img, $titre, $texte, $lien,  $user){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO realisation(`r_titre`, `r_contenu`, `r_lien`, `r_img`, `r_auteur_fk`) VALUES ( :titre, :texte, :lien, :img, :user )' )  ) !== false ) {
            if( $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'lien', $lien) && $requete->bindValue( 'img', $img) && $requete->bindValue( 'user', $user)){
                if( $requete->execute() ) {
                }
            }
        }
    }
    
     /**
     * [modifie une real]
     * @param $id int
     * @param $img string
     * @param $titre string
     * @param $texte string
     * @param $lien string
     * @param $user int
     * return array
     */
    public function modifReal($id, $img, $titre, $texte, $lien,  $user) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `realisation` SET `r_titre`=:titre , `r_contenu`=:texte, `r_lien`=:lien, `r_img`=:img, `r_auteur_fk`=:user WHERE `r_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'lien', $lien) && $requete->bindValue( 'img', $img) && $requete->bindValue( 'user', $user)){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    /**
     * [select une real]
     * @param $id int
     */
    public function ModifOneReal( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `realisation`  WHERE `r_id`=:id' ) )!==false ) {
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