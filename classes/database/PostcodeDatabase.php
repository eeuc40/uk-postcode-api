<?php
require_once 'Database.php';

/**
 * Description of PostcodeDatabase
 *
 * @author Richie
 */
class PostcodeDatabase {

    private static $db = null;

    public static function getPostcodeData($postcode) {
        if (!self::isConnected()) {
            self::connectToDatabase();
        }
        self::$db->query("SELECT * FROM postcode WHERE postcode = :postcode");
        self::$db->bind(":postcode", $postcode);
        self::$db->execute();
        return PostcodeFactory::create(self::$db->singleRow());
        
    }

    private static function isConnected() {
        return self::$db !== null;
    }

    private static function connectToDatabase() {
        self::$db = new Database();
    }

}
