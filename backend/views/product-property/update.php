<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductProperty */

$this->title = Yii::t('app', '修改属性', [
    'modelClass' => 'Product Property',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品属性'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="product-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
