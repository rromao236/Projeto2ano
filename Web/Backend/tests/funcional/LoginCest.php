<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class LoginCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/site/login']);
    }

    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    // tests
    public function testValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('Andre', 'andre123'));
        $I->see('Welcome to the Management page!', 'h1');
    }

    public function testInvalidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('Andr', 'andre'));
        $I->seeValidationError('Incorrect username or password.');
        $I->dontSee('Welcome to the Management page!', 'h1');
    }

    public function testUserLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('Ricardo', 'ricardo123'));
        $I->seeInCurrentUrl('site/login');
        $I->dontSee('Welcome to the Management page!', 'h1');
    }

    public function testEmptyForm(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }
}
