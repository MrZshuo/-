<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductProperty */

$this->title = Yii::t('app', '添加属性');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品属性'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-property-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
