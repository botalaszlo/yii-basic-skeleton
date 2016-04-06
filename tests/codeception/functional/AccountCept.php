<?php

use tests\codeception\_pages\LoginPage;
use tests\codeception\_pages\AccountPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that profile works');

$loginPage = LoginPage::openBy($I);
$loginPage->login('demo', 'password');

$accountPage = AccountPage::openBy($I);

$I->expectTo('see account page and form fields');
$I->see('Account Settings', 'h1');
$I->canSee('Please fill out the following fields to modify your account settings:');
$I->canSeeElement($accountPage->getFieldPath('username'));
$I->canSeeElement($accountPage->getFieldPath('email'));
$I->canSeeElement($accountPage->getFieldPath('password'));
$I->canSeeElement($accountPage->getFieldPath('passwordRepeat'));
$I->see('Update', 'button');
$I->see('Delete', 'a');

$I->expectTo('see data of user');
$I->canSeeInField($accountPage->getFieldPath('username'), 'demo');
$I->canSeeInField($accountPage->getFieldPath('email'), 'demo@demo.com');

$I->expectTo('page is reloaded after clicked on update button and data did not changed');
$I->click('Update');
$I->canSee('Please fill out the following fields to modify your account settings:');
$I->canSeeInField($accountPage->getFieldPath('username'), 'demo');
$I->canSeeInField($accountPage->getFieldPath('email'), 'demo@demo.com');

$loginPage->logout();