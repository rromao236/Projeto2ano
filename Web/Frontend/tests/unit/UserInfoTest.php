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

        $usersinfo->nif = "teste";
        $this->assertFalse($usersinfo->validate(['nif']));
        $usersinfo->nif = 1234567891;
        $this->assertTrue($usersinfo->validate(['nif']));

        $usersinfo->name = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($usersinfo->validate(['name']));
        $usersinfo->name = "Ricardo";
        $this->assertTrue($usersinfo->validate(['name']));

        $usersinfo->adress = "olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($usersinfo->validate(['adress']));
        $usersinfo->adress = "Estrada das Flores N4";
        $this->assertTrue($usersinfo->validate(['adress']));

        $usersinfo->phone = "teste";
        $this->assertFalse($usersinfo->validate(['phone']));
        $usersinfo->phone = 915625852;
        $this->assertTrue($usersinfo->validate(['phone']));

        $usersinfo->birthdate = "2001-05-12";
        $this->assertTrue($usersinfo->validate(['birthdate']));

        $usersinfo->points = "teste";
        $this->assertFalse($usersinfo->validate(['points']));
        $usersinfo->points = 20;
        $this->assertTrue($usersinfo->validate(['points']));

    }
    public function testInsertUserInfo(){

        $this->tester->haveRecord('app\models\Usersinfo', ['userid' => 1], ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'],
            ['phone' => 912565842], ['birthdate' => "2001-05-12"], ['points' => 20]);
        $this->tester->seeRecord('app\models\Usersinfo', ['userid' => 1], ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'],
            ['phone' => 912565842], ['birthdate' => "2001-05-12"], ['points' => 20]);
    }

    public function testAlterUserInfo(){
        /*$id = $this->tester->haveRecord('app\models\Usersinfo', ['nif' => 1234567891], ['name' => "Ricardo"], ['adress' => 'Estrada das Flores N4'], ['phone' => 912565842],
            ['birthdate' => "2001-05-12"], ['points' => 20]);*/

        $userinfonew = new Usersinfo();
        $userinfonew->userid = 1;
        $userinfonew->nif = 1234567891;
        $userinfonew->name = "teste";
        $userinfonew->adress = "Estrada das Flores N4";
        $userinfonew->phone = 912565842;
        $userinfonew->birthdate = "2001-05-12";
        $userinfonew->points = 20;
        $userinfonew->save();

        $user = Usersinfo::find()
            ->where(['name' => 'teste'])
            ->one();

        $user->userid = 2;
        $user->name = "Pedro";
        $user->save();

        $this->tester->seeRecord('app\models\Usersinfo', ['userid' => 2], ['nif' => 1234567891], ['name' => "Pedro"], ['adress' => 'Estrada das Flores N4'],
            ['phone' => 912565842], ['birthdate' => "2001-05-12"], ['points' => 20]);
        $this->tester->dontseeRecord('app\models\Usersinfo', ['userid' => 1], ['nif' => 1234567891], ['name' => "teste"], ['adress' => 'Estrada das Flores N4'],
            ['phone' => 912565842], ['birthdate' => "2001-05-12"], ['points' => 20]);
    }

    public function testDeleteUserInfo(){
        $userinfonew = new Usersinfo();
        $userinfonew->userid = 1;
        $userinfonew->nif = 1234567891;
        $userinfonew->name = "teste";
        $userinfonew->adress = "Estrada das Flores N4";
        $userinfonew->phone = 912565842;
        $userinfonew->birthdate = "2001-05-12";
        $userinfonew->points = 20;
        $userinfonew->save();

        $user = Usersinfo::find()
            ->where(['name' => 'teste'])
            ->one();
        $user->delete();

        $this->tester->dontseeRecord('app\models\Usersinfo', ['userid' => 1], ['nif' => 1234567891], ['name' => "teste"], ['adress' => 'Estrada das Flores N4'],
            ['phone' => 912565842], ['birthdate' => "2001-05-12"], ['points' => 20]);
    }
}
