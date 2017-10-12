<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = '产品详情:'.$model->productName->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->productName->name;
?>
<div class="product-description-view">
    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '确定要删除吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>

<div>
    <?=$model->content?>
</div>
