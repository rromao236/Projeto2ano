<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class AirportsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/airports/create']);
    }

    protected function formParams($name, $country, $city)
    {
        return [
            'Airports[name]' => $name,
            'Airports[country]' => $country,
            'Airports[city]' => $city,
        ];
    }

    // tests
    public function testValidAirport(FunctionalTester $I)
    {
        $I->submitForm('#airports-form', $this->formParams('testeFuncional', 'teste', 'funcional'));
        $I->seeInCurrentUrl('airports/view');
    }

    public function testEmptyAirportForm(FunctionalTester $I)
    {
        $I->submitForm('#airports-form', $this->formParams('', '', ''));
        $I->seeValidationErrorForm('Name cannot be blank');
        $I->seeValidationErrorForm('Country cannot be blank');
        $I->seeValidationErrorForm('City cannot be blank');
        $I->dontSeeInCurrentUrl('airports/view');
    }
}
