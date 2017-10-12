<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductProperty */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品属性'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-property-view">


    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_name',
            'language_id',
            'property_name',
            'property_value',
        ],
    ]) ?>

</div>
