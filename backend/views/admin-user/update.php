<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = Yii::t('app', '修改: ', [
    'modelClass' => '管理员',
]) . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '管理员'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="admin-user-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
