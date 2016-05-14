<?php

namespace app\models\forms;

use yii\base\Model;
use Yii;

/**
 * Account form
 * This is a form model for the user to be able to update his/her account data.
 *
 * @see yii\base\Model;
 */
class AccountForm extends Model {

    public $username;
    public $email;
    public $password;
    public $passwordRepeat;

    public function __construct() {
        parent::__construct();
        $this->username = Yii::$app->user->identity->username;
        $this->email = Yii::$app->user->identity->email;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'The password does not match.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'passwordRepeat' => 'Password Confirmation',
        ];
    }

    /**
     * Save user own's profile
     *
     * @return boolean true if the save was successful
     */
    public function save() {
        if (!$this->validate()) {
            return null;
        }
        return $this->saveUserData();
    }

    /**
     * Save the user specific data.
     *
     * @return boolean save was successful or not
     */
    private function saveUserData() {
        $user = Yii::$app->user->identity;
        $user->attributes = [
            'username' => $this->username,
            'email' => $this->email
        ];
        if ($this->password) {
            $user->setPassword($this->password);
        }
        return $user->save();
    }
}
