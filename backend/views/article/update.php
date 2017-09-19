<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Article */

$this->title = Yii::t('app', '更新', [
    'modelClass' => 'Article',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="article-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
