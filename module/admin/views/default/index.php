<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Admin - My Yii Application';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['default/index']];
?>
<div class="site-index">

    <div class="body-content">

        <h1>Administration</h1>

        <div class="row">
            <div class="col-xs-12">
                <h2>Application</h2>

                <ul>
                    <li><a href="<?php echo Url::to(['user/index']); ?>">Users</a></li>
                </ul>

            </div>
        </div>

    </div>
</div>