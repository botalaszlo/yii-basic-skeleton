<?php

use tests\codeception\_pages\LoginPage;
use tests\codeception\_pages\AccountPage;

/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that login works');

$loginPage = LoginPage::openBy($I);
$I->amGoingTo('try to login with correct credentials');
$loginPage->login('demo', 'password');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$accountPage = AccountPage::openBy($I);

$I->amGoingTo('see account page with fields');
$I->see('Account settings', 'h1');
$I->see('Please fill out the following fields to modify your account settings:');
$I->see('Username');
$I->see('Email');
$I->see('Password');
$I->see('Password Confirmation');
$I->see('Update', 'button');
$I->see('Delete', 'a');

$I->amGoingTo('see data of user');
$I->seeInField($accountPage->getFieldPath('username'), 'demo');
$I->seeInField($accountPage->getFieldPath('email'), 'demo@demo.com');

$I->amGoingTo('see update button on form');
$I->see('Update');

$loginPage->logout();
