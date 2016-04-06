<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\forms\AccountForm;
use app\models\Profile;
use app\models\User;

/**
 * Account controller handler the users' account page.
 *
 * @author Bóta László <bota.laszlo@outlook.com>
 */
class AccountController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    /**
     * Modfiy user's data.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = new AccountForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::info(sprintf('Account modified by user: %s.', Yii::$app->user->identity->username));
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes current logged in user and its profile.
     * If deletion is successful, the browser will be redirected to the 'home' page.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        Profile::findOne(['user_id' => Yii::$app->user->identity->id])->delete();
        User::findOne(Yii::$app->user->identity->id)->delete();

        return $this->redirect(['site/index']);
    }
}
