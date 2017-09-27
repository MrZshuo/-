<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\NavShowname */

$this->title = Yii::t('app', '修改导航别名: ', [
    'modelClass' => 'Nav Showname',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航别名'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->nav_id, 'url' => ['view', 'id' => $model->nav_id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="nav-showname-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
