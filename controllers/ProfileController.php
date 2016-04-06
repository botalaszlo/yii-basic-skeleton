<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\forms\ProfileForm;

/**
 * Profile controller handler the users' profile page.
 *
 * @author Bóta László <bota.laszlo@outlook.com>
 */
class ProfileController extends Controller
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
     * Modfiy user's profile.
     *
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = new ProfileForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::info(sprintf('Profile modified by user: %s.', Yii::$app->user->identity->username));
        }
        return $this->render('update', ['model' => $model]);
    }
}
