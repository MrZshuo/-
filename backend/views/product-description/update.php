<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = Yii::t('app', '修改:', [
    'modelClass' => 'Product Description',
]) . $model->productName->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品详情'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="product-description-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'langlist' => $langlist,
    ]) ?>

</div>
