<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class HotelsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/hotels/create']);
    }

    protected function formParams($name, $adress, $city, $country, $description, $nightprice, $rating)
    {
        return [
            'Hotels[name]' => $name,
            'Hotels[adress]' => $adress,
            'Hotels[city]' => $city,
            'Hotels[country]' => $country,
            'Hotels[description]' => $description,
            'Hotels[nightprice]' => $nightprice,
            'Hotels[rating]' => $rating,
        ];
    }

    // tests
    public function testValidHotel(FunctionalTester $I)
    {
        $I->submitForm('#hotels-form', $this->formParams('testeFuncional', 'rua do teste funcional', 'funcional', 'teste', 'este hotel e para um teste', '200', '4'));
        $I->seeInCurrentUrl('hotels/view');
    }

    public function testEmptyHotelForm(FunctionalTester $I)
    {
        $I->submitForm('#hotels-form', $this->formParams('', '', '', '', '', '', ''));
        $I->seeValidationErrorForm('Name cannot be blank');
        $I->seeValidationErrorForm('Adress cannot be blank');
        $I->seeValidationErrorForm('City cannot be blank');
        $I->seeValidationErrorForm('Country cannot be blank');
        $I->seeValidationErrorForm('Description cannot be blank');
        $I->seeValidationErrorForm('Nightprice cannot be blank');
        $I->seeValidationErrorForm('Rating cannot be blank');
        $I->dontSeeInCurrentUrl('hotels/view');
    }

    public function testValidationHotelForm(FunctionalTester  $I)
    {
        $I->submitForm('#hotels-form', $this->formParams('testeFuncional', 'rua do teste funcional', 'funcional', 'teste', 'este hotel e para um teste', 'teste', 'ola'));
        $I->seeValidationErrorForm('Nightprice must be an integer');
        $I->seeValidationErrorForm('Rating must be an integer');
        $I->dontSeeInCurrentUrl('hotels/view');
    }
}
