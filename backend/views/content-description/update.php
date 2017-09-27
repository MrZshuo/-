<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = Yii::t('app', '修改详情: ', [
    'modelClass' => 'Content Description',
]) . $model->content_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Content Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="content-description-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
