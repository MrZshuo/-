<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductImages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品图'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '确定删除吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'name',
            'image_url:url',
            'image_width',
            'image_height',
            'image_mime',
        ],
    ]) ?>

</div>
