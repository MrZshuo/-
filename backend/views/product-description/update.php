<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Description',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-description-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'langlist' => $langlist,
    ]) ?>

</div>
