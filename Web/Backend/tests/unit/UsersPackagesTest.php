<?php
namespace backend\tests;

use app\models\Userspackages;

class UsersPackagesTest extends \Codeception\Test\Unit
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
        $users_packages = new Userspackages();

        $users_packages->id_user = null;
        $this->assertFalse($users_packages->validate(['id_user']));
        $users_packages->id_user = "teste";
        $this->assertFalse($users_packages->validate(['id_user']));
        $users_packages->id_user = 111111111;
        $this->assertFalse($users_packages->validate(['id_user']));
        $users_packages->id_user = 1;
        $this->assertTrue($users_packages->validate(['id_user']));

        $users_packages->id_package = null;
        $this->assertFalse($users_packages->validate(['id_package']));
        $users_packages->id_package = "teste";
        $this->assertFalse($users_packages->validate(['id_package']));
        $users_packages->id_package = 1111111;
        $this->assertFalse($users_packages->validate(['id_package']));
        $users_packages->id_package = 1;
        $this->assertTrue($users_packages->validate(['id_package']));

        $users_packages->purchasedate = "teste";
        $this->assertFalse($users_packages->validate(['purchasedate']));
        $users_packages->purchasedate = null;
        $this->assertFalse($users_packages->validate(['purchasedate']));
        $users_packages->purchasedate = "2021-12-07 12:58:41";
        $this->assertTrue($users_packages->validate(['purchasedate']));

        $users_packages->referencia = "teste";
        $this->assertFalse($users_packages->validate(['referencia']));
        $users_packages->referencia = 1111111111111111;
        $this->assertFalse($users_packages->validate(['referencia']));
        $users_packages->referencia = null;
        $this->assertFalse($users_packages->validate(['referencia']));
        $users_packages->referencia = 976139014;
        $this->assertTrue($users_packages->validate(['referencia']));

        $users_packages->price = "teste";
        $this->assertFalse($users_packages->validate(['price']));
        $users_packages->price = 1111111111111;
        $this->assertFalse($users_packages->validate(['price']));
        $users_packages->price = null;
        $this->assertFalse($users_packages->validate(['price']));
        $users_packages->price = 110;
        $this->assertTrue($users_packages->validate(['price']));

        $users_packages->entity = "teste";
        $this->assertFalse($users_packages->validate(['entity']));
        $users_packages->entity = 1111111111111;
        $this->assertFalse($users_packages->validate(['entity']));
        $users_packages->entity = null;
        $this->assertFalse($users_packages->validate(['entity']));
        $users_packages->entity = 11236;
        $this->assertTrue($users_packages->validate(['entity']));

        //Não sei se vale a pena fazer este teste
        $users_packages->estado = "teste";
        $this->assertFalse($users_packages->validate(['estado']));
        //
        $users_packages->estado = null;
        $this->assertFalse($users_packages->validate(['estado']));
        $users_packages->estado = "Por pagar";
        $this->assertTrue($users_packages->validate(['estado']));

        $users_packages->usedpoints = "teste";
        $this->assertFalse($users_packages->validate(['usedpoints']));
        $users_packages->usedpoints = 11111111111;
        $this->assertFalse($users_packages->validate(['usedpoints']));
        $users_packages->usedpoints = null;
        $this->assertFalse($users_packages->validate(['usedpoints']));
        $users_packages->usedpoints = 5;
        $this->assertTrue($users_packages->validate(['usedpoints']));

        $users_packages->nrpeople = "teste";
        $this->assertFalse($users_packages->validate(['nrpeople']));
        $users_packages->nrpeople = 11111111111;
        $this->assertFalse($users_packages->validate(['nrpeople']));
        $users_packages->nrpeople = null;
        $this->assertFalse($users_packages->validate(['nrpeople']));
        $users_packages->nrpeople = 1;
        $this->assertTrue($users_packages->validate(['nrpeople']));

    }
    public function testInsertUserPackage(){

        $this->tester->haveRecord('app\models\Userspackages', ['id_user' => 1], ['id_package' => 1], ['purchasedate' => "2021-12-07 12:58:41"],
                                ['referencia' => '976139014'], ['price' => 110], ['entity' => 11236], ['estado' => 'Por pagar'], ['usedpoints' => 5], ['nrpeople' => 1]);
        $this->tester->seeRecord('app\models\Userspackages', ['id_user' => 1], ['id_package' => 1], ['purchasedate' => "2021-12-07 12:58:41"],
            ['referencia' => '976139014'], ['price' => 110], ['entity' => 11236], ['estado' => 'Por pagar'], ['usedpoints' => 5], ['nrpeople' => 1]);
    }

    public function testAlterUserPackage(){
        $id = $this->tester->haveRecord('app\models\Userspackages', ['id_user' => 1], ['id_package' => 1], ['purchasedate' => "2021-12-07 12:58:41"],
            ['referencia' => '976139014'], ['price' => 110], ['entity' => 11236], ['estado' => 'Por pagar'], ['usedpoints' => 5], ['nrpeople' => 1]);

        $users_packages=Userspackages::find($id);
        $users_packages->estado = "Pago";
        $users_packages->save();

        $this->tester->seeRecord('app\models\Userspackages', ['id_user' => 1], ['id_package' => 1], ['purchasedate' => "2021-12-07 12:58:41"],
            ['referencia' => '976139014'], ['price' => 110], ['entity' => 11236], ['estado' => 'Pago'], ['usedpoints' => 5], ['nrpeople' => 1]);
        $this->tester->dontseeRecord('app\models\Userspackages', ['id_user' => 1], ['id_package' => 1], ['purchasedate' => "2021-12-07 12:58:41"],
            ['referencia' => '976139014'], ['price' => 110], ['entity' => 11236], ['estado' => 'Por pagar'], ['usedpoints' => 5], ['nrpeople' => 1]);
    }
}