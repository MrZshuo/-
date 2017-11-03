<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Content */

$this->title = Yii::t('app', '修改视频: ', [
    'modelClass' => 'Content',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '视频'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="content-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
