<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;

class ComprarCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }

    protected function formParamsLogin($username, $password)
    {
        return [
            'LoginForm[username]' => $username,
            'LoginForm[password]' => $password,
        ];
    }

    protected function formParamsCompra($usedpoints, $nrpeople)
    {
        return [
            'Userspackages[usedpoints]' => $usedpoints,
            'Userspackages[nrpeople]' => $nrpeople,
        ];
    }

    public function testValidCompra(FunctionalTester $I)
    {
        $I->see('Bem-vindos!', 'h1');
        $I->seeLink('Login');
        $I->click('Login');

        $I->submitForm('#login-form', $this->formParamsLogin('rafael', '12345678'));

        $I->see('Logout (rafael)', '.btn-link');

        $I->seeLink('Pacotes');
        $I->click('Pacotes');

        $I->see('Detalhes');
        $I->click('Detalhes');

        $I->seeLink('COMPRAR');
        $I->click('COMPRAR');

        $I->submitForm('#compra-form', $this->formParamsCompra(10, 2));

        $I->see('Confirmar');
        $I->click('Confirmar');


        $I->see('Thank you for your purchase.', 'div');
    }

    public function testInvalidCompra(FunctionalTester $I)
    {
        $I->see('Bem-vindos!', 'h1');
        $I->seeLink('Login');
        $I->click('Login');

        $I->submitForm('#login-form', $this->formParamsLogin('rafael', '12345678'));

        $I->see('Logout (rafael)', '.btn-link');

        $I->seeLink('Pacotes');
        $I->click('Pacotes');

        $I->see('Detalhes');
        $I->click('Detalhes');

        $I->seeLink('COMPRAR');
        $I->click('COMPRAR');

        $I->submitForm('#compra-form', $this->formParamsCompra(400, 0));

        $I->see('Quantidade de pontos ou numero de pessoas invalido!', 'div');
    }

//    public function testEmptyCompra(FunctionalTester $I)
//    {
//        $I->see('Bem-vindos!', 'h1');
//        $I->seeLink('Login');
//        $I->click('Login');
//
//        $I->submitForm('#login-form', $this->formParamsLogin('rafael', '12345678'));
//
//        $I->see('Logout (rafael)', '.btn-link');
//
//        $I->seeLink('Pacotes');
//        $I->click('Pacotes');
//
//        $I->see('Detalhes');
//        $I->click('Detalhes');
//
//        $I->seeLink('COMPRAR');
//        $I->click('COMPRAR');
//
//        $I->submitForm('#compra-form', $this->formParamsCompra('',''));
//
//        $I->seeValidationErrorForm('Usedpoints cannot be blank.');
//        $I->seeValidationErrorForm('Nrpeople cannot be blank.');
//    }
}
