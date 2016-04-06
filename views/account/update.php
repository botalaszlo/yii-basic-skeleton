<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\forms\AccountForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Account Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to modify your account settings:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-account-update']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <fieldset class="well well-sm">
                <p class="help-block">                    
                    Please fill out to change your current password, otherwise leave them empty.
                </p>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>
            </fieldset>            

            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?=
                    Html::a('Delete', ['delete'], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete your profile?',
                            'method' => 'post',
                        ],
                    ])
                ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>