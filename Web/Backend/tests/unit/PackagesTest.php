<?php
namespace backend\tests;

use app\models\Packages;

class PackagesTest extends \Codeception\Test\Unit
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
        $package = new Packages();

        $package->title = null;
        $this->assertFalse($package->validate(['title']));
        $package->title = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($package->validate(['title']));
        $package->title = "Toquio";
        $this->assertTrue($package->validate(['title']));

        $package->description = null;
        $this->assertFalse($package->validate(['description']));
        $package->description = "Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.";
        $this->assertTrue($package->validate(['description']));

        $package->price = "teste";
        $this->assertFalse($package->validate(['price']));
        $package->price = 11111111111;
        $this->assertFalse($package->validate(['price']));
        $package->price = null;
        $this->assertFalse($package->validate(['price']));
        $package->price = 150;
        $this->assertTrue($package->validate(['price']));

        $package->rating = "teste";
        $this->assertFalse($package->validate(['rating']));
        $package->rating = 11111111111;
        $this->assertFalse($package->validate(['rating']));
        $package->rating = null;
        $this->assertFalse($package->validate(['rating']));
        $package->rating = 4;
        $this->assertTrue($package->validate(['rating']));

        $package->flightstart = "teste";
        $this->assertFalse($package->validate(['flightstart']));
        $package->flightstart = 11111111111;
        $this->assertFalse($package->validate(['flightstart']));
        $package->flightstart = null;
        $this->assertFalse($package->validate(['flightstart']));
        $package->flightstart = "2022-03-12 22:00:00";
        $this->assertTrue($package->validate(['flightstart']));

        $package->flightend = "teste";
        $this->assertFalse($package->validate(['flightend']));
        $package->flightend = 11111111111;
        $this->assertFalse($package->validate(['flightend']));
        $package->flightend = null;
        $this->assertFalse($package->validate(['flightend']));
        $package->flightend = "2022-03-13 22:00:00";
        $this->assertTrue($package->validate(['flightend']));

        $package->flightbackstart = "teste";
        $this->assertFalse($package->validate(['flightbackstart']));
        $package->flightbackstart = 11111111111;
        $this->assertFalse($package->validate(['flightbackstart']));
        $package->flightbackstart = null;
        $this->assertFalse($package->validate(['flightbackstart']));
        $package->flightbackstart = "2022-03-18 22:00:00";
        $this->assertTrue($package->validate(['flightbackstart']));

        $package->flightbackend = "teste";
        $this->assertFalse($package->validate(['flightbackend']));
        $package->flightbackend = 11111111111;
        $this->assertFalse($package->validate(['flightbackend']));
        $package->flightbackend = null;
        $this->assertFalse($package->validate(['flightbackend']));
        $package->flightbackend = "2022-03-19 22:00:00";
        $this->assertTrue($package->validate(['flightbackend']));

        $package->id_hotel = "teste";
        $this->assertFalse($package->validate(['id_hotel']));
        $package->id_hotel = 11111111111;
        $this->assertFalse($package->validate(['id_hotel']));
        $package->id_hotel = null;
        $this->assertFalse($package->validate(['id_hotel']));
        $package->id_hotel = 1;
        $this->assertTrue($package->validate(['id_hotel']));

        $package->id_airportstart = "teste";
        $this->assertFalse($package->validate(['id_airportstart']));
        $package->id_airportstart = 11111111111;
        $this->assertFalse($package->validate(['id_airportstart']));
        $package->id_airportstart = null;
        $this->assertFalse($package->validate(['id_airportstart']));
        $package->id_airportstart = 1;
        $this->assertTrue($package->validate(['id_airportstart']));

        $package->id_airportend = "teste";
        $this->assertFalse($package->validate(['id_airportend']));
        $package->id_airportend = 11111111111;
        $this->assertFalse($package->validate(['id_airportend']));
        $package->id_airportend = null;
        $this->assertFalse($package->validate(['id_airportend']));
        $package->id_airportend = 2;
        $this->assertTrue($package->validate(['id_airportend']));

    }
    public function testInsertPackage(){

        $this->tester->haveRecord('app\models\Packages', ['title' => 'Toquio'], ['description' => 'Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.'],
                                ['price' => 150], ['rating' => 4], ['flightstart' => '2022-03-12 22:00:00'], ['flightend' => '2022-03-13 22:00:00'],
                                ['flightbackstart' => '2022-03-18 22:00:00'], ['flightbackend' => '2022-03-19 22:00:00'],
                                ['id_hotel' => 1], ['id_airportstart' => 1], ['id_airportend' => 2]);
        $this->tester->seeRecord('app\models\Packages', ['title' => 'Toquio'], ['description' => 'Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.'],
                                ['price' => 150], ['rating' => 4], ['flightstart' => '2022-03-12 22:00:00'], ['flightend' => '2022-03-13 22:00:00'],
                                ['flightbackstart' => '2022-03-18 22:00:00'], ['flightbackend' => '2022-03-19 22:00:00'],
                                ['id_hotel' => 1], ['id_airportstart' => 1], ['id_airportend' => 2]);
    }

    public function testAlterPackage(){
        $id = $this->tester->haveRecord('app\models\Packages', ['title' => 'Toquio'], ['description' => 'Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.'],
                                ['price' => 150], ['rating' => 4], ['flightstart' => '2022-03-12 22:00:00'], ['flightend' => '2022-03-13 22:00:00'],
                                ['flightbackstart' => '2022-03-18 22:00:00'], ['flightbackend' => '2022-03-19 22:00:00'],
                                ['id_hotel' => 1], ['id_airportstart' => 1], ['id_airportend' => 2]);

        $package= Packages::find($id);
        $package->title = "Pequim";
        $package->save();

        $this->tester->seeRecord('app\models\Packages', ['title' => 'Pequim'], ['description' => 'Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.'],
            ['price' => 150], ['rating' => 4], ['flightstart' => '2022-03-12 22:00:00'], ['flightend' => '2022-03-13 22:00:00'],
            ['flightbackstart' => '2022-03-18 22:00:00'], ['flightbackend' => '2022-03-19 22:00:00'],
            ['id_hotel' => 1], ['id_airportstart' => 1], ['id_airportend' => 2]);
        $this->tester->dontseeRecord('app\models\Packages', ['title' => 'Toquio'], ['description' => 'Tóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos.'],
            ['price' => 150], ['rating' => 4], ['flightstart' => '2022-03-12 22:00:00'], ['flightend' => '2022-03-13 22:00:00'],
            ['flightbackstart' => '2022-03-18 22:00:00'], ['flightbackend' => '2022-03-19 22:00:00'],
            ['id_hotel' => 1], ['id_airportstart' => 1], ['id_airportend' => 2]);
    }
}