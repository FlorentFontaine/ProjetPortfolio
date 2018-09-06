<?php

namespace cv;

class CvModel {

    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }

     /**
     * [créer cv competence]
     * @param $part string
     * @param $texte string
     */
    public function createCvComp($texte,$part){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO cv( `cv_contenu`, `cv_partie` ) VALUES ( :texte, :part )' )  ) !== false ) {
            if(  $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'part', $part) ){
                if( $requete->execute() ) {
                }
            }
        }
    }
    
     /**
     * [créer cv formation]
     * @param $part string
     * @param $date date
     * @param $texte string
     */
    public function createCvForm($texte,$date,$part){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO cv( `cv_contenu`,`annee`, `cv_partie` ) VALUES ( :texte,:annee, :part )' )  ) !== false ) {
            if(  $requete->bindValue( 'texte', $texte)  && $requete->bindValue( 'annee', $date) && $requete->bindValue( 'part', $part) ){
                if( $requete->execute() ) {
                }
            }
        }
    }
    
     /**
     * [créer cv experience]
     * @param $part string
     * @param $date date
     * @param $ville string
     * @param $texte string
     */
    public function createCvExp($texte,$date,$part,$ville){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO cv( `cv_contenu`,`annee`, `cv_partie`,`cv_ville` ) VALUES ( :texte,:annee, :part,:ville )' )  ) !== false ) {
            if(  $requete->bindValue( 'texte', $texte)  && $requete->bindValue( 'annee', $date) && $requete->bindValue( 'part', $part) && $requete->bindValue( 'ville', $ville) ){
                if( $requete->execute() ) {
                }
            }
        }
    }
        
     /**
     * [créer cv divers]
     * @param $part string
     * @param $titre string
     * @param $texte string
     */
    public function createCvDiv($texte,$titre,$part){
        if ( ( $requete = $this->pdo->prepare ('INSERT INTO cv( `cv_contenu`,`cv_titre`, `cv_partie` ) VALUES ( :texte,:titre, :part )' )  ) !== false ) {
            if(  $requete->bindValue( 'texte', $texte)  && $requete->bindValue( 'titre', $titre) && $requete->bindValue( 'part', $part) ){
                if( $requete->execute() ) {
                }
            }
        }
    }
        
     /**
     * [select cv]
     * @param $id int
     * return array
     */
    public function selectAllCv($id) {
            if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `cv`  WHERE `cv_partie`=:id' ) )!==false ) {
                if( $statement->bindValue( 'id', $id) ) {
                    if( $statement->execute() ) {
                        if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                            $statement->closeCursor();
                            return $datas;
                        }
                    }
                }
            }
            return false;
        }
    
        
     /**
     * [select cv competence]
     * return array
     */
    public function selectCompCv() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `cv`
            inner join partie on part_id = cv_partie 
            WHERE `part_libelle`="competence" ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }
      
     /**
     * [select cv formation]
     * return array
     */
    public function selectFormCv() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `cv`
            inner join partie on part_id = cv_partie 
            WHERE `part_libelle`="formation" ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }
      
     /**
     * [select cv experience]
     * return array
     */
    public function selectExpCv() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `cv`
            inner join partie on part_id = cv_partie 
            WHERE `part_libelle`="experience" ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }
      
     /**
     * [select cv divers]
     * return array
     */
    public function selectDivCv() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `cv`
            inner join partie on part_id = cv_partie 
            WHERE `part_libelle`="divers" ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                $statement->closeCursor();
                return $datas;
            }
        }
        return false;
    }

    
     /**
     * [select un cv]
     * @param $id int
     * return array
     */
    public function selectOneCv( $id ) {
        if( ( $statement = $this->pdo->prepare( 'SELECT  * FROM `cv`  WHERE `cv_id`=:id' ) )!==false ) {
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
     * [modifier cv competence]
     * @param $id int
     * @param $texte string
     */
    public function modifCompCv($id, $texte) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `cv` SET `cv_contenu`=:texte WHERE `cv_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'texte', $texte) ){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [modifier cv formation]
     * @param $id int
     * @param $date date
     * @param $texte string
     */
    public function modifFormCv($id, $texte, $dates) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `cv` SET `cv_contenu`=:texte , `annee`=:dates WHERE `cv_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'dates', $dates)){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [modifier cv experience]
     * @param $id int
     * @param $date date
     * @param $ville string
     * @param $texte string
     */
    public function modifExpCv($id, $texte, $dates, $ville) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `cv` SET `cv_contenu`=:texte, `annee`=:dates, `cv_ville`=:ville WHERE `cv_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'texte', $texte)  && $requete->bindValue( 'dates', $dates)  && $requete->bindValue( 'ville', $ville) ){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [créer cv divers]
     * @param $id int
     * @param $titre string
     * @param $texte string
     */
    public function modifDivCv($id, $texte, $titre) {
        if( ( $requete = $this->pdo->prepare( 'UPDATE `cv` SET `cv_contenu`=:texte,  `cv_titre`=:titre WHERE `cv_id`=:id' ) )!==false ) {
            if( $requete->bindValue( 'id', $id) && $requete->bindValue( 'texte', $texte) && $requete->bindValue( 'titre', $titre)  ){
                $result = $requete->execute();
                return $result;
            }
        }
        return false;
    }
    
     /**
     * [supprimer cv ]
     * @param $id int
     */
    public function suppOneCv( $id ) {
        if( ( $statement = $this->pdo->prepare( 'DELETE FROM `cv`  WHERE `cv_id`=:id' ) )!==false ) {
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
     * [select partie du cv ]
     * return array
     */
    public function selectPart() {
        if( ( $statement = $this->pdo->query( 'SELECT * FROM `partie` ') )!==false ) {
            if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                return $datas;
            }
        }
        return false;
    }

}