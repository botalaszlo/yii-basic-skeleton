<?php

use tests\codeception\_pages\LoginPage;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that login works');

$loginPage = LoginPage::openBy($I);

$I->see('Login', 'h1');

$I->amGoingTo('try to login with empty credentials');
$loginPage->login('', '');
$I->expectTo('see validations errors');
$I->see('Username cannot be blank.');
$I->see('Password cannot be blank.');

$I->amGoingTo('try to login with wrong credentials');
$loginPage->login('admin', 'wrong');
$I->expectTo('see validations errors');
$I->see('Incorrect username or password.');

$I->amGoingTo('try to login with correct user credentials');
$loginPage->login('demo', 'password');
$I->expectTo('see user info');
$I->see('Logout (demo)');

$I->amGoingTo('try to logout from the website');
$loginPage->logout();
$I->expectTo('see home page');
$I->amOnPage(Yii::$app->homeUrl);

$I->seeLink('Login');
$I->click('Login');

$I->amGoingTo('try to login with correct admin credentials');
$loginPage->login('admin', 'password');
$I->expectTo('see user info');
$I->see('Logout (admin)');
$loginPage->logout();