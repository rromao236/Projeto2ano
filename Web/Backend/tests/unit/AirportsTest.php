<?php
namespace backend\tests;

use app\models\Airports;

class AirportsTest extends \Codeception\Test\Unit
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
        $airport = new Airports();

        $airport->name = null;
        $this->assertFalse($airport->validate(['name']));
        $airport->name = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($airport->validate(['name']));
        $airport->name = "Aeroporto de São Sebastião";
        $this->assertTrue($airport->validate(['name']));

        $airport->country = null;
        $this->assertFalse($airport->validate(['country']));
        $airport->country = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($airport->validate(['country']));
        $airport->country = "Portugal";
        $this->assertTrue($airport->validate(['country']));

        $airport->city = null;
        $this->assertFalse($airport->validate(['city']));
        $airport->city = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($airport->validate(['city']));
        $airport->city = "Porto";
        $this->assertTrue($airport->validate(['city']));

    }
    public function testInsertAirport(){

        $this->tester->haveRecord('app\models\Airports', ['name' => 'Aeroporto de São Sebastião'], ['country' => 'Portugal'], ['city' => 'Porto']);
        $this->tester->seeRecord('app\models\Airports', ['name' => 'Aeroporto de São Sebastião'], ['country' => 'Portugal'], ['city' => 'Porto']);

    }

    public function testAlterAirport(){
        $id = $this->tester->haveRecord('app\models\Airports', ['name' => 'Aeroporto de São Sebastião'], ['country' => 'Portugal'], ['city' => 'Porto']);

        $airport = Airports::find($id);
        $airport->name = "Aeroporto de Lucifer";
        $airport->save();

        $this->tester->seeRecord('app\models\Airports', ['name' => 'Aeroporto de Lucifer'], ['country' => 'Portugal'], ['city' => 'Porto']);
        $this->tester->dontseeRecord('app\models\Airports', ['name' => 'Aeroporto de São Sebastião'], ['country' => 'Portugal'], ['city' => 'Porto']);
    }
}