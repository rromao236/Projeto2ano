<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
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

    public function testValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('Rafael', '12345678'));
        $I->see('Bem-vindos!', 'h1');
    }

    public function testInvalidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('Andr', 'andre'));
        $I->seeValidationError('Incorrect username or password.');
        $I->dontSee('Bem-vindos!', 'h1');
    }

    public function testAdminLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('ricardo', '12345678'));
        $I->seeInCurrentUrl('site/login');
        $I->dontSee('Bem-vindos!', 'h1');
    }

    public function testEmptyForm(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }
}
