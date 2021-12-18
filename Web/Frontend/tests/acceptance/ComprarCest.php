<?php
namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class ComprarCest
{
    public function _before(AcceptanceTester $I)
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

    protected function formParamsCompra($pontos, $nrPessoas)
    {
        return [
            'Userspackages[usedpoints]' => $pontos,
            'Userspackages[nrpeople]' => $nrPessoas,
        ];
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->see('Bem-vindos!', 'h1');
        $I->seeLink('Login');
        $I->click('Login');

        $I->submitForm('#login-form', $this->formParamsLogin('Ricardo', 'ricardo123'));

        $I->wait(3);
        $I->see('Logout (Ricardo)', '.btn-link');

        $I->seeLink('Pacotes');
        $I->click('Pacotes');

        $I->wait(3);

        $I->see('Detalhes');
        $I->click('Detalhes');

        $I->wait(3);

        $I->seeLink('COMPRAR');
        $I->click('COMPRAR');

        $I->wait(3);

        $I->submitForm('#compra-form', $this->formParamsCompra(0, 2));

        $I->see('Confirmar');
        $I->click('Confirmar');

        $I->wait(3);

        $I->see('Confirmar');
        $I->click('Confirmar');

        $I->wait(2);

        $I->see('Thank you for your purchase.', 'div');
    }
}
