<?php

/**
 * Description of Postcode
 *
 * @author Richie
 */
class Postcode implements JsonSerializable {

    private $postcode;
    private $positionalQualityIndicator;
    private $eastings;
    private $northings;
    private $countryCode;
    private $countyCode;
    private $districtCode;
    private $wardCode;

    function __construct($postcode, $positionalQualityIndicator, $eastings, $northings, $countryCode, $countyCode, $districtCode, $wardCode) {
        $this->postcode = $postcode;
        $this->positionalQualityIndicator = $positionalQualityIndicator;
        $this->eastings = $eastings;
        $this->northings = $northings;
        $this->countryCode = $countryCode;
        $this->countyCode = $countyCode;
        $this->districtCode = $districtCode;
        $this->wardCode = $wardCode;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getPositionalQualityIndicator() {
        return $this->positionalQualityIndicator;
    }

    public function getEastings() {
        return $this->eastings;
    }

    public function getNorthings() {
        return $this->northings;
    }

    public function getCountryCode() {
        return $this->countryCode;
    }

    public function getCountyCode() {
        return $this->countyCode;
    }

    public function getDistrictCode() {
        return $this->districtCode;
    }

    public function getWardCode() {
        return $this->wardCode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function setPositionalQualityIndicator($positionalQualityIndicator) {
        $this->positionalQualityIndicator = $positionalQualityIndicator;
    }

    public function setEastings($eastings) {
        $this->eastings = $eastings;
    }

    public function setNorthings($northings) {
        $this->northings = $northings;
    }

    public function setCountryCode($countryCode) {
        $this->countryCode = $countryCode;
    }

    public function setCountyCode($countyCode) {
        $this->countyCode = $countyCode;
    }

    public function setDistrictCode($districtCode) {
        $this->districtCode = $districtCode;
    }

    public function setWardCode($wardCode) {
        $this->wardCode = $wardCode;
    }

    public function __toJSON() {
        return json_encode($this);
    }

    public function jsonSerialize() {
        return array('postcode' => $this->postcode,
            'eastings' => $this->eastings,
            'northings' => $this->northings);
    }

}
