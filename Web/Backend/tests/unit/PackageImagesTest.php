<?php
namespace backend\tests;

use app\models\Packageimages;

class PackageImagesTest extends \Codeception\Test\Unit
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

        /*$this->tester->haveRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);*/
        $package_imagenew = new Packageimages();
        $package_imagenew->name = "LondresCapa";
        $package_imagenew->image = "images/pacotes/LondresCapa3316.jpg";
        $package_imagenew->package_id = 1;
        $package_imagenew->save();

        $this->tester->seeRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);

    }

    public function testAlterPackageImage(){
        /*$this->tester->haveRecord('app\models\Packageimages', ['name' => "LondresCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);*/
        $package_imagenew = new Packageimages();
        $package_imagenew->name = "NovaIorqueCapa";
        $package_imagenew->image = "images/pacotes/NovaIorqueCapa3316.jpg";
        $package_imagenew->package_id = 1;
        $package_imagenew->save();

        $package_image = Packageimages::find()
            ->where(['name' => "NovaIorqueCapa"])
            ->one();

        $package_image->name = "ParisCapa";
        $package_image->save();

        $this->tester->seeRecord('app\models\Packageimages', ['name' => "ParisCapa"], ['image' => "images/pacotes/LondresCapa3316.jpg"], ['package_id' => 1]);
        $this->tester->dontseeRecord('app\models\Packageimages', ['name' => "NovaIorqueCapa"], ['image' => "images/pacotes/NovaIorqueCapa3316.jpg"], ['package_id' => 1]);
    }

    public function testDeletePackageImage(){
        $package_imagenew = new Packageimages();
        $package_imagenew->name = "NovaIorqueCapa";
        $package_imagenew->image = "images/pacotes/NovaIorqueCapa3316.jpg";
        $package_imagenew->package_id = 1;
        $package_imagenew->save();

        $package_image = Packageimages::find()
            ->where(['name' => "NovaIorqueCapa"])
            ->one();
        $package_image->delete();

        $this->tester->dontseeRecord('app\models\Packageimages', ['name' => "NovaIorqueCapa"], ['image' => "images/pacotes/NovaIorqueCapa3316.jpg"], ['package_id' => 1]);

    }
}
