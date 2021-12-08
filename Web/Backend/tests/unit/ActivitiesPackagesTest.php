<?php
namespace backend\tests;

use app\models\ActivitiesPackages;

class ActivitiesPackagesTest extends \Codeception\Test\Unit
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
        $activitie_package = new ActivitiesPackages();

        $activitie_package->id_activity = null;
        $this->assertFalse($activitie_package->validate(['id_activity']));
        $activitie_package->id_activity = "teste";
        $this->assertFalse($activitie_package->validate(['id_activity']));
        $activitie_package->id_activity = 11111111111;
        $this->assertFalse($activitie_package->validate(['id_activity']));
        $activitie_package->id_activity = 1;
        $this->assertTrue($activitie_package->validate(['id_activity']));

        $activitie_package->id_package = null;
        $this->assertFalse($activitie_package->validate(['id_package']));
        $activitie_package->id_package = "teste";
        $this->assertFalse($activitie_package->validate(['id_package']));
        $activitie_package->id_package = 11111111111;
        $this->assertFalse($activitie_package->validate(['id_package']));
        $activitie_package->id_package = 1;
        $this->assertTrue($activitie_package->validate(['id_package']));

        $activitie_package->responsible = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($activitie_package->validate(['responsible']));
        $activitie_package->responsible = null;
        $this->assertFalse($activitie_package->validate(['responsible']));
        $activitie_package->responsible = "sasha";
        $this->assertTrue($activitie_package->validate(['responsible']));

        $activitie_package->timestart = "teste";
        $this->assertFalse($activitie_package->validate(['timestart']));
        $activitie_package->timestart = 11111111111;
        $this->assertFalse($activitie_package->validate(['timestart']));
        $activitie_package->timestart = null;
        $this->assertFalse($activitie_package->validate(['timestart']));
        $activitie_package->timestart = "2022-03-14 10:00:00";
        $this->assertTrue($activitie_package->validate(['timestart']));

        $activitie_package->duration = "teste";
        $this->assertFalse($activitie_package->validate(['duration']));
        $activitie_package->duration = 11111111111;
        $this->assertFalse($activitie_package->validate(['duration']));
        $activitie_package->duration = null;
        $this->assertFalse($activitie_package->validate(['duration']));
        $activitie_package->duration = 20;
        $this->assertTrue($activitie_package->validate(['duration']));

    }
    public function testInsertActivitiePackage(){

        $this->tester->haveRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'Sasha'],
                                ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
        $this->tester->seeRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'Sasha'],
                                ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
    }

    public function testAlterActivitiePackage(){
        $id = $this->tester->haveRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'Sasha'],
                                        ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);

        $activitie_package=ActivitiesPackages::find($id);
        $activitie_package->responsible = "John";
        $activitie_package->save();

        $this->tester->seeRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'John'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
        $this->tester->dontseeRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
    }
}