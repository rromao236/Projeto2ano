<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class RegistarCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/site/signup']);
    }

    protected function formParams($username, $email, $password)
    {
        return [
            'SignupForm[username]' => $username,
            'SignupForm[email]' => $email,
            'SignupForm[password]' => $password,
        ];
    }

    // tests
    public function testValidSignup(FunctionalTester $I)
    {
        $I->submitForm('#form-signup', $this->formParams('teste', 'teste@gmail.com', 'teste123'));
        $I->see('Thank you for registration.', 'div');
    }

    public function testEmptySignup(FunctionalTester $I)
    {
        $I->submitForm('#form-signup', $this->formParams('', '', ''));
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Email cannot be blank');
        $I->seeValidationError('Password cannot be blank');
        $I->dontSee('Thank you for registration.', 'div');
    }

    public function testInvalidFieldsSignup(FunctionalTester $I)
    {
        $I->submitForm('#form-signup', $this->formParams('t', 'ola@', 'teste'));
        $I->seeValidationError('Username should contain at least 2 characters.');
        $I->seeValidationError('Email is not a valid email address.');
        $I->seeValidationError('Password should contain at least 8 characters.');
        $I->dontSee('Thank you for registration.', 'div');
    }
}
