<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class ActivitiesCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/activities/create']);
    }

    protected function formParams($name)
    {
        return [
            'Activities[name]' => $name,
        ];
    }

    // tests
    public function testValidActivitie(FunctionalTester $I)
    {
        $I->submitForm('#activities-form', $this->formParams('Scubadive'));
        $I->seeInCurrentUrl('activities/view');
    }

    public function testEmptyActivitieForm(FunctionalTester $I)
    {
        $I->submitForm('#activities-form', $this->formParams(''));
        $I->seeValidationErrorForm('Name cannot be blank');
        $I->dontSeeInCurrentUrl('activities/view');
    }
}
