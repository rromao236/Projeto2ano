<?php
namespace backend\tests;

use app\models\ActivitiesPackages;

class ActivitiesPackagesTest extends \Codeception\Test\Unit
{
    //Acho que temos de adicionar um campo chamdado id a tabela para ser auto increment e chave primaria.
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
        $activitiepackage = new ActivitiesPackages();

        $activitiepackage->id_activity = "teste";
        $this->assertFalse($activitiepackage->validate(['id_activity']));
        $activitiepackage->id_activity = 4;
        $this->assertTrue($activitiepackage->validate(['id_activity']));

        $activitiepackage->id_package = "teste";
        $this->assertFalse($activitiepackage->validate(['id_package']));
        $activitiepackage->id_package = 2;
        $this->assertTrue($activitiepackage->validate(['id_package']));

        $activitiepackage->responsible = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($activitiepackage->validate(['responsible']));
        $activitiepackage->responsible = null;
        $this->assertFalse($activitiepackage->validate(['responsible']));
        $activitiepackage->responsible = "sasha";
        $this->assertTrue($activitiepackage->validate(['responsible']));

        $activitiepackage->timestart = null;
        $this->assertFalse($activitiepackage->validate(['timestart']));
        $activitiepackage->timestart = "2022-03-14 10:00:00";
        $this->assertTrue($activitiepackage->validate(['timestart']));

        $activitiepackage->duration = "teste";
        $this->assertFalse($activitiepackage->validate(['duration']));
        $activitiepackage->duration = null;
        $this->assertFalse($activitiepackage->validate(['duration']));
        $activitiepackage->duration = 20;
        $this->assertTrue($activitiepackage->validate(['duration']));

    }
    public function testInsertActivitiePackage(){

        /*$this->tester->haveRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 1], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);*/
        $activitiepackagenew = new ActivitiesPackages();
        $activitiepackagenew->id_activity = 4;
        $activitiepackagenew->id_package = 2;
        $activitiepackagenew->responsible = "Sasha";
        $activitiepackagenew->timestart = "2022-03-14 10:00:00";
        $activitiepackagenew->duration = 20;
        $activitiepackagenew->save();

        $this->tester->seeRecord('app\models\ActivitiesPackages', ['id_activity' => 4], ['id_package' => 1], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
    }

    public function testAlterActivitiePackage(){
        /*$this->tester->haveRecord('app\models\ActivitiesPackages', ['id_activity' => 1], ['id_package' => 2], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);*/
        $activitiepackagenew = new ActivitiesPackages();
        $activitiepackagenew->id_activity = 4;
        $activitiepackagenew->id_package = 2;
        $activitiepackagenew->responsible = "Sasha";
        $activitiepackagenew->timestart = "2022-03-14 10:00:00";
        $activitiepackagenew->duration = 20;
        $activitiepackagenew->save();

        $activitiepackage=ActivitiesPackages::find()
            ->where(['id_activity' => 4,
                'id_package' => 2,
                'responsible' => 'Sasha',
                'timestart' => '2022-03-14 10:00:00',
                'duration' => 20])
            ->one();

        $activitiepackage->id_activity = 5;
        $activitiepackage->save();

        $this->tester->seeRecord('app\models\ActivitiesPackages', ['id_activity' => 5], ['id_package' => 2], ['responsible' => 'John'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
        $this->tester->dontseeRecord('app\models\ActivitiesPackages', ['id_activity' => 4], ['id_package' => 2], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
    }

    public function testDeleteActivitiePackage(){
        $activitiepackagenew = new ActivitiesPackages();
        $activitiepackagenew->id_activity = 4;
        $activitiepackagenew->id_package = 2;
        $activitiepackagenew->responsible = "Sasha";
        $activitiepackagenew->timestart = "2022-03-14 10:00:00";
        $activitiepackagenew->duration = 20;
        $activitiepackagenew->save();

        $activitiepackage=ActivitiesPackages::find()
            ->where(['id_activity' => 4,
                'id_package' => 2,
                'responsible' => 'Sasha',
                'timestart' => '2022-03-14 10:00:00',
                'duration' => 20])
            ->one();
        $activitiepackage->delete();

        $this->tester->dontseeRecord('app\models\ActivitiesPackages', ['id_activity' => 4], ['id_package' => 2], ['responsible' => 'Sasha'],
            ['timestart' => '2022-03-14 10:00:00'], ['duration' => 20]);
    }
}
