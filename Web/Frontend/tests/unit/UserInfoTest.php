<?php
namespace backend\tests;

use app\models\Usersinfo;

class UserInfoTest extends \Codeception\Test\Unit
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
        $usersinfo = new Usersinfo();

        $usersinfo->nif = null;
        $this->assertFalse($usersinfo->validate(['nif']));
        $usersinfo->nif = "teste";
        $this->assertFalse($usersinfo->validate(['nif']));
        $usersinfo->nif = 1111111111111111;
        $this->assertFalse($usersinfo->validate(['nif']));
        $usersinfo->nif = 1234567891;
        $this->assertTrue($usersinfo->validate(['nif']));

        $usersinfo->name = null;
        $this->assertFalse($usersinfo->validate(['name']));
        $usersinfo->name = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($usersinfo->validate(['name']));
        $usersinfo->name = "Ricardo";
        $this->assertTrue($usersinfo->validate(['name']));

        $usersinfo->adress = null;
        $this->assertFalse($usersinfo->validate(['adress']));
        $usersinfo->adress = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($usersinfo->validate(['adress']));
        $usersinfo->adress = "Estrada das Flores N4";
        $this->assertTrue($usersinfo->validate(['adress']));

        $usersinfo->phone = "teste";
        $this->assertFalse($usersinfo->validate(['phone']));
        $usersinfo->phone = 111111111111111111;
        $this->assertFalse($usersinfo->validate(['phone']));
        $usersinfo->phone = null;
        $this->assertFalse($usersinfo->validate(['phone']));
        $usersinfo->phone = 915625852;
        $this->assertTrue($usersinfo->validate(['phone']));

        $usersinfo->birthdate = "teste";
        $this->assertFalse($usersinfo->validate(['birthdate']));
        $usersinfo->birthdate = 11111111111;
        $this->assertFalse($usersinfo->validate(['birthdate']));
        $usersinfo->birthdate = null;
        $this->assertFalse($usersinfo->validate(['birthdate']));
        $usersinfo->birthdate = "2001-05-12";
        $this->assertTrue($usersinfo->validate(['birthdate']));

        $usersinfo->points = "teste";
        $this->assertFalse($usersinfo->validate(['points']));
        $usersinfo->points = 11111111111;
        $this->assertFalse($usersinfo->validate(['points']));
        $usersinfo->points = null;
        $this->assertFalse($usersinfo->validate(['points']));
        $usersinfo->points = 20;
        $this->assertTrue($usersinfo->validate(['points']));

    }
    public function testInsertUserInfo(){

        $this->tester->haveRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);
        $this->tester->seeRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);
    }

    public function testAlterUserInfo(){
        $id = $this->tester->haveRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);

        $userinfo=Usersinfo::find($id);
        $userinfo->name = "Pedro";
        $userinfo->save();

        $this->tester->seeRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Pedro"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);
        $this->tester->dontseeRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);
    }
}