<?php

require_once 'Database.php';

/**
 * Description of Postcode
 *
 * @author Richie
 */
class Postcode {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPostcodeData($postcode) {
        $this->db->query("SELECT * FROM postcode WHERE postcode = :postcode");
        $this->db->bind(":postcode", $postcode);
        $this->db->execute();
        return $this->db->singleRow();
    }

}
