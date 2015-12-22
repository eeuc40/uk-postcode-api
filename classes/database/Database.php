<?php

/**
 * Description of Database
 *
 * @author Richie
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'postcode_database');

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $pdo;
    private $error;
    private $stmt;

    /**
     * A constructor for the Database class
     */
    public function __construct() {

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * 
     * @param type $query
     */
    public function query($query) {
        $this->stmt = $this->pdo->prepare($query);
    }

    /**
     * 
     * @param type $param
     * @param type $value
     * @param type $type
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindParam($param, $value, $type);
    }

    /**
     * 
     * @return type
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * 
     * @return type
     */
    public function resultSet() {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 
     * @return type
     */
    public function singleRow() {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 
     * @return type
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    /**
     * 
     * @return type
     */
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    /**
     * 
     * @return type
     */
    public function beginTransaction() {
        return $this->pdo->beginTransaction();
    }

    /**
     * 
     * @return type
     */
    public function endTransaction() {
        return $this->pdo->commit();
    }

    /**
     * 
     * @return type
     */
    public function cancelTransaction() {
        return $this->pdo->rollBack();
    }

    /**
     * 
     * @return type
     */
    public function debugDumpParams() {
        return $this->stmt->debugDumpParams();
    }

}
