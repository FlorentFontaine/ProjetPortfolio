   <?php


namespace rang;

class RangModel {
    private $pdo;

    public function __construct() {
        $this->pdo = \SPDO::getInstance()->getDb();/* connection à la base de donnée grace au SPDO */
    }
    
     /**
     * [select rang]
     * return array
     */
    public function selectAll() {
        try {
            if( ( $statement = $this->pdo->query( 'SELECT * FROM `rang`
            inner join user on u_id = r_id  ') )!==false ) {
                if( ( $datas = $statement->fetchAll( \PDO::FETCH_ASSOC ) )!==false ) {
                    return $datas;
                }
                $statement->closeCursor();
            }

            return false;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }