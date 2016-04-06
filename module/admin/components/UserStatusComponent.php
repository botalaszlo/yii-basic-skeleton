<?php

namespace app\module\admin\components;

/**
 * Component class for user status handling.
 *
 * @package module\admin
 */
class UserStatusComponent {

    /**
     * Stores the user class's status constants.
     * @var mixin
     */
    private static $userStatusConstants = [];

    /**
     * Pretag of Status constants.
     * @var string
     */
    private static $statusPreTag = 'STATUS';

    /**
     * Get User status's list. The keys are the integer value and the values are
     * the constant variable's name.
     * @return mixin
     */
    public static function getUserStatusesList() {
        self::getUserStatusConstants();
        return self::$userStatusConstants;
    }

    /**
     * Get the User class's status constants.
     */
    private static function getUserStatusConstants() {
        $reflection = new \ReflectionClass('\app\models\User');
        $constantsOfUserClass = $reflection->getConstants();
        foreach ($constantsOfUserClass as $key => $value) {
            if (false !== strpos(strtoupper($key), self::$statusPreTag)) {
                self::$userStatusConstants[$value] = substr($key, strlen(self::$statusPreTag)+ 1);
            }
        }
        asort(self::$userStatusConstants);
    }

}
