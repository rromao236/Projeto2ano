<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;
class EditarPerfilCest
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

    protected function formParamsEditarPerfil($nif, $name, $adress, $phone, $birthdate)
    {
        return [
            'Usersinfo[nif]' => $nif,
            'Usersinfo[name]' => $name,
            'Usersinfo[adress]' => $adress,
            'Usersinfo[phone]' => $phone,
            'Usersinfo[birthdate]' => $birthdate,
        ];
    }

    public function testValidEditarPerfil(FunctionalTester $I)
    {
        $I->see('Bem-vindos!', 'h1');
        $I->seeLink('Login');
        $I->click('Login');

        $I->submitForm('#login-form', $this->formParamsLogin('rafael', '12345678'));

        $I->see('Logout (rafael)', '.btn-link');

        $I->seeLink('Perfil');
        $I->click('Perfil');

        $I->seeLink('Editar Perfil');
        $I->click('Editar Perfil');

        $I->submitForm('#perfil-form', $this->formParamsEditarPerfil(1234567891, 'Rafael', 'Estrada das Flores N4', 915865265, '2001-05-12'));

        $I->see('Perfil:', 'h2');
    }

    public function testInvalidFieldsEditarPerfil(FunctionalTester $I)
    {
        $I->see('Bem-vindos!', 'h1');
        $I->seeLink('Login');
        $I->click('Login');

        $I->submitForm('#login-form', $this->formParamsLogin('rafael', '12345678'));

        $I->see('Logout (rafael)', '.btn-link');

        $I->seeLink('Perfil');
        $I->click('Perfil');

        $I->seeLink('Editar Perfil');
        $I->click('Editar Perfil');

        $I->submitForm('#perfil-form', $this->formParamsEditarPerfil('erro', 'Rafael', 'Estrada das Flores N4', 'tres', '2001-05-12'));

        $I->seeValidationErrorForm('Nif must be an integer.');
        $I->seeValidationErrorForm('Phone must be an integer.');
        $I->dontSee('Perfil:', 'h2');


    }
}
