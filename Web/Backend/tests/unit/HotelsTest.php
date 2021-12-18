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
        $hotel->country = "Estados Unidos";
        $this->assertTrue($hotel->validate(['country']));

        $hotel->description = null;
        $this->assertFalse($hotel->validate(['description']));
        $hotel->description = "Hotel localizado num dos locais mais de bonitos de Los Angeles";
        $this->assertTrue($hotel->validate(['description']));

        $hotel->nightprice = "teste";
        $this->assertFalse($hotel->validate(['nightprice']));
        $hotel->nightprice = null;
        $this->assertFalse($hotel->validate(['nightprice']));
        $hotel->nightprice = 230;
        $this->assertTrue($hotel->validate(['nightprice']));

        $hotel->rating = "teste";
        $this->assertFalse($hotel->validate(['rating']));
        $hotel->rating = null;
        $this->assertFalse($hotel->validate(['rating']));
        $hotel->rating = 5;
        $this->assertTrue($hotel->validate(['rating']));

    }
    public function testInsertHotel(){

        $hotelnew = new Hotels();
        $hotelnew->name = "Hotel Paradise";
        $hotelnew->adress = "Estrada das Nuvens";
        $hotelnew->city = "Los Angeles";
        $hotelnew->country = "Estados Unidos";
        $hotelnew->description = "Hotel localizado num dos locais mais de bonitos de Los Angeles";
        $hotelnew->nightprice = 230;
        $hotelnew->rating = 5;
        $hotelnew->save();

        $this->tester->seeRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
            ['country' => 'Estados Unidos'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
            ['nightprice' => 230], ['rating' => 5]);
    }

    public function testAlterHotel(){
        /*$this->tester->haveRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
            ['country' => 'Estados Unidos'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
            ['nightprice' => 230], ['rating' => 5]);*/

        $hotelnew = new Hotels();
        $hotelnew->name = "Hotel Paradise";
        $hotelnew->adress = "Estrada das Nuvens";
        $hotelnew->city = "Los Angeles";
        $hotelnew->country = "Estados Unidos";
        $hotelnew->description = "Hotel localizado num dos locais mais de bonitos de Los Angeles";
        $hotelnew->nightprice = 230;
        $hotelnew->rating = 5;
        $hotelnew->save();

        $hotel = Hotels::find()
            ->where(['name' => 'Hotel Paradise'])
            ->one();

        $hotel->name = "Hotel Hell";
        expect_that($hotel->save(true));


        $this->tester->seeRecord('app\models\Hotels', ['name' => 'Hotel Hell'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
            ['country' => 'Estados Unidos'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
            ['nightprice' => 230], ['rating' => 5]);
        $this->tester->dontseeRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
            ['country' => 'Estados Unidos'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
            ['nightprice' => 230], ['rating' => 5]);
    }

    public function testDeleteHotel(){
        $hotelnew = new Hotels();
        $hotelnew->name = "Hotel Paradise";
        $hotelnew->adress = "Estrada das Nuvens";
        $hotelnew->city = "Los Angeles";
        $hotelnew->country = "Estados Unidos";
        $hotelnew->description = "Hotel localizado num dos locais mais de bonitos de Los Angeles";
        $hotelnew->nightprice = 230;
        $hotelnew->rating = 5;
        $hotelnew->save();

        $hotel = Hotels::find()
            ->where(['name' => 'Hotel Paradise'])
            ->one();
        $hotel->delete();

        $this->tester->dontseeRecord('app\models\Hotels', ['name' => 'Hotel Paradise'], ['adress' => 'Estrada das Nuvens'], ['city' => 'Los Angeles'],
            ['country' => 'Estados Unidos'], ['description' => 'Hotel localizado num dos locais mais de bonitos de Los Angeles'],
            ['nightprice' => 230], ['rating' => 5]);
    }
}
