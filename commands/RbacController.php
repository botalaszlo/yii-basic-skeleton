<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;

/**
 * This Rbac command initialize the admin role.
 * Note (commands):
 * - yii migrate --migrationPath=@yii/rbac/migrations
 * - yii rbac/init
 *
 * @author Bóta László <bota.laszlo@outlook.com>
 */
class RbacController extends Controller
{
    /**
     * Initialize action
     * @throws \Exception
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        $auth->assign($adminRole, $this->getAdminUser()->getId());
    }

    /**
     * @return app\models\User
     */
    private function getAdminUser()
    {
    	return User::find()->where(['username' => 'admin'])->one();
    }
}