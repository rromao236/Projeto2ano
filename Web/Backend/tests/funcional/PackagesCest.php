<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class PackagesCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/packages/create']);
    }

    protected function formParams($title, $description, $price, $rating, $flightstart, $flightend, $flightbackstart, $flightbackend, $id_hotel, $id_airportstart, $id_airportend)
    {
        return [
            'Packages[title]' => $title,
            'Packages[description]' => $description,
            'Packages[price]' => $price,
            'Packages[rating]' => $rating,
            'Packages[flightstart]' => $flightstart,
            'Packages[flightend]' => $flightend,
            'Packages[flightbackstart]' => $flightbackstart,
            'Packages[flightbackend]' => $flightbackend,
            'Packages[id_hotel]' => $id_hotel,
            'Packages[id_airportstart]' => $id_airportstart,
            'Packages[id_airportend]' => $id_airportend,
        ];
    }

    // tests
    public function testValidPackage(FunctionalTester $I)
    {
        $I->submitForm('#packages-form', $this->formParams('testeFunc', 'isto e para fazer um teste', '150', '5', '2000-11-12 09:30:00', '2000-11-12 10:30:00', '2000-11-21 09:30:00', '2000-11-21 11:30:00', '1', '1', '1'));
        $I->seeInCurrentUrl('packages/view');
    }

    public function testEmptyPackageForm(FunctionalTester $I)
    {
        $I->submitForm('#packages-form', $this->formParams('', '', '', '', '', '', '', '', '1', '1', '1'));
        $I->seeValidationErrorForm('Title cannot be blank');
        $I->seeValidationErrorForm('Description cannot be blank');
        $I->seeValidationErrorForm('Price cannot be blank');
        $I->seeValidationErrorForm('Rating cannot be blank');
        $I->seeValidationErrorForm('Flightstart cannot be blank');
        $I->seeValidationErrorForm('Flightend cannot be blank');
        $I->seeValidationErrorForm('Flightbackstart cannot be blank');
        $I->seeValidationErrorForm('Flightbackend cannot be blank');
        $I->dontSeeInCurrentUrl('packages/view');
    }

    public function testValidationPackageForm(FunctionalTester  $I)
    {
        $I->submitForm('#packages-form', $this->formParams('testeFunc', 'isto e para fazer um teste', 'teste', 'teste', '2000-11-12 09:30:00', '2000-11-12 10:30:00', '2000-11-21 09:30:00', '2000-11-21 11:30:00', '1', '1', '1'));
        $I->seeValidationErrorForm('Price must be an integer');
        $I->seeValidationErrorForm('Rating must be an integer');
        $I->dontSeeInCurrentUrl('packages/view');
    }
}
