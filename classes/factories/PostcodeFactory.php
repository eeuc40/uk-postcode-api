<?php

/**
 * Description of PostcodeFactory
 *
 * @author Richie
 */
class PostcodeFactory extends Factory {

    public static function create($postcodeRow) {

        return new Postcode($postcodeRow['postcode'], $postcodeRow['position_quality_indicator'],
                $postcodeRow['eastings'], $postcodeRow['northings'], $postcodeRow['country_code'],
                $postcodeRow['county_code'], $postcodeRow['district_code'], $postcodeRow['ward_code']);
    }

}
