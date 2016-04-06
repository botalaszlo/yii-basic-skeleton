<?php

namespace tests\codeception\_pages;

use yii\codeception\BasePage;

/**
 * Represents profile page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class ProfilePage extends BasePage {

    public $route = 'profile/update';

    /**
     * Get the field's path.
     * 
     * @param string $field
     * @return string field path
     */
    public function getFieldPath($field) {
        $inputType = $field === 'body' ? 'textarea' : 'input';
        return $inputType . '[name="ProfileForm[' . $field . ']"]';
    }

    /**
     * @param array $profileData
     */
    public function save(array $profileData) {
        foreach ($profileData as $field => $value) {
            $this->actor->fillField($this->getFieldPath($field), $value);
        }
        $this->actor->click('save');
    }

}
