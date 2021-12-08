<?php
namespace backend\tests;

use app\models\Packageimages;

class PackagesImagesTest extends \Codeception\Test\Unit
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
        $packages_images = new Packageimages();

        $packages_images->name = null;
        $this->assertFalse($packages_images->validate(['name']));
        $packages_images->name = "LondresCapa";
        $this->assertTrue($packages_images->validate(['name']));

        $packages_images->image = null;
        $this->assertFalse($packages_images->validate(['image']));
        $packages_images->image = "images/pacotes/LondresCapa3316.jpg";
        $this->assertTrue($packages_images->validate(['image']));

        $packages_images->package_id = "teste";
        $this->assertFalse($packages_images->validate(['package_id']));
        $packages_images->package_id = 11111111111;
        $this->assertFalse($packages_images->validate(['package_id']));
        $packages_images->package_id = null;
        $this->assertFalse($packages_images->validate(['package_id']));
        $packages_images->package_id = 1;
        $this->assertTrue($packages_images->validate(['package_id']));


    }
    public function testInsertPackageImage(){

        $this->tester->haveRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);
        $this->tester->seeRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);

    }

    public function testAlterPackageImage(){
        $id = $this->tester->haveRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);

        $package_image=Packageimages::find($id);
        $package_image->name = "ParisCapa";
        $package_image->save();

        $this->tester->seeRecord('app\models\Packageimages', ['name' => "ParisCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);
        $this->tester->dontseeRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);
    }
}