<?php

require '/repositories/CountryRepository.php';

/**
 * CountryRepositoryTest short summary.
 *
 * CountryRepositoryTest description.
 *
 * @version 1.0
 * @author bspain
 */
class CountryRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function test_getCountries()
    {
        $countries = CountryRepository::getCountries();
        $this->assertCount(4, $countries);
    }

    public function test_getCountry()
    {
        $country = CountryRepository::getCountry('ca');
        $this->assertTrue($country->name === 'Canada');
    }

    public function test_getPlaces()
    {
        $places = CountryRepository::getPlaces('ca');
        $this->assertCount(2, $places);
    }

    public function test_addPlace()
    {
        $places = CountryRepository::getPlaces('ca');
        $this->assertCount(2, $places);
        
        $newPlace = new Place('newPlace');
        CountryRepository::addPlace('ca', $newPlace);

        $places = CountryRepository::getPlaces('ca');
        $this->assertCount(3, $places);
    }
}

?>