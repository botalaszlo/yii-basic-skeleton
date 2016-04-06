<?php

namespace tests\codeception\_pages;

use yii\codeception\BasePage;

/**
 * Represents account page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class AccountPage extends BasePage {

    public $route = 'account/update';

    /**
     * Get the field's path.
     * 
     * @param string $field
     * @return string field path
     */
    public function getFieldPath($field) {
        $inputType = $field === 'body' ? 'textarea' : 'input';
        return $inputType . '[name="AccountForm[' . $field . ']"]';
    }

    /**
     * @param array $profileData
     */
    public function save(array $profileData) {
        foreach ($profileData as $field => $value) {
            $this->actor->fillField($this->getFieldPath($field), $value);
        }
        $this->actor->click('update');
    }

}
