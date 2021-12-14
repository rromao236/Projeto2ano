<?php
namespace backend\tests;

use app\models\Activities;

class ActivitiesTest extends \Codeception\Test\Unit
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
        $activitie = new Activities();

        $activitie->name = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($activitie->validate(['name']));

        $activitie->name = "Skateboard";
        $this->assertTrue($activitie->validate(['name']));
    }

    public function testInsertActivitie(){
        //$activitie = new Activities();
        //$activitie->name = 'Skydive';
        //$this->assertTrue($activitie->save());

        $this->tester->haveRecord('app\models\Activities', ['name' => 'Skydive']);
        $this->tester->seeRecord('app\models\Activities', ['name' => 'Skydive']);

        //$this->tester->seeInDatabase('activities',['name' => 'Skydive']);
    }

    public function testAlterActivitie(){
        $this->tester->haveRecord('app\models\Activities', ['name' => 'Skydive']);

        $activitie = Activities::find()
            ->where(['name' => 'Skydive'])
            ->one();

        $activitie->name = "Walking";
        $activitie->save();

        $this->tester->seeRecord('app\models\Activities', ['name' => 'Walking']);
        $this->tester->dontseeRecord('app\models\Activities', ['name' => 'Skydive']);

    }

    public function testDeleteActivitie(){
        $this->tester->haveRecord('app\models\Activities', ['name' => 'Skydive']);

        $activitie = Activities::find()
            ->where(['name' => 'Skydive'])
            ->one();
        $activitie->delete();

        $this->tester->dontseeRecord('app\models\Activities', ['name' => 'Skydive']);
    }

}
