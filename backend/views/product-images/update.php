<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductImages */

$this->title = Yii::t('app', '修改产品图: ', [
    'modelClass' => 'Product Images',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品细节图'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="product-images-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
