<?php
namespace backend\tests;

use app\models\Hotels;

class HotelsTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidations(){
        $hotel = new Hotels();

        $hotel->name = null;
        $this->assertFalse($hotel->validate(['name']));
        $hotel->name = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($hotel->validate(['name']));
        $hotel->name = "Hotel Paradise";
        $this->assertTrue($hotel->validate(['name']));

        $hotel->adress = null;
        $this->assertFalse($hotel->validate(['adress']));
        $hotel->adress = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($hotel->validate(['adress']));
        $hotel->adress = "Estrada das Nuvens";
        $this->assertTrue($hotel->validate(['adress']));

        $hotel->city = null;
        $this->assertFalse($hotel->validate(['city']));
        $hotel->city = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($hotel->validate(['city']));
        $hotel->city = "Los Angeles";
        $this->assertTrue($hotel->validate(['city']));

        $hotel->country = null;
        $this->assertFalse($hotel->validate(['country']));
        $hotel->country = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($hotel->validate(['country']));
        $hotel->country = "Estados Unidos da América";
        $this->assertTrue($hotel->validate(['country']));

        $hotel->description = null;
        $this->assertFalse($hotel->validate(['description']));
        $hotel->description = "Hotel localizado num dos locais mais de bonitos de Los Angeles";
        $this->assertTrue($hotel->validate(['description']));

        $hotel->nightprice = "teste";
        $this->assertFalse($hotel->validate(['nightprice']));
        $hotel->nightprice = 111111111111;
        $this->assertFalse($hotel->validate(['nightprice']));
        $hotel->nightprice = null;
        $this->assertFalse($hotel->validate(['nightprice']));
        $hotel->nightprice = 230;
        $this->assertTrue($hotel->validate(['nightprice']));

        $hotel->rating = "teste";
        $this->assertFalse($hotel->validate(['rating']));
        $hotel->rating = 11111111111;
        $this->assertFalse($hotel->validate(['rating']));
        $hotel->rating = null;
        $this->assertFalse($hotel->validate(['rating']));
        $hotel->rating = 5;
        $this->assertTrue($hotel->validate(['rating']));

    }
    public function testInsertHotel(){

        $this->tester->haveRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
                                ['country' => 'Estados Unidos da América'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
                                ['nightprice' => 230], ['rating' => 5]);
        $this->tester->seeRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
                                ['country' => 'Estados Unidos da América'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
                                ['nightprice' => 230], ['rating' => 5]);
    }

    public function testAlterHotel(){
        $id = $this->tester->haveRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
                                        ['country' => 'Estados Unidos da América'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
                                        ['nightprice' => 230], ['rating' => 5]);

        $hotel = Hotels::find($id);
        $hotel->name = "Hotel Hell";
        $hotel->save();

        $this->tester->seeRecord('app\models\Hotels', ['name' => 'Hotel Hell'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
                                ['country' => 'Estados Unidos da América'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
                                ['nightprice' => 230], ['rating' => 5]);
        $this->tester->dontseeRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
                                ['country' => 'Estados Unidos da América'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
                                ['nightprice' => 230], ['rating' => 5]);
    }
}