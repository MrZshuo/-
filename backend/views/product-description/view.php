<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = $model->productName->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'captionOptions' =>[
                    'width' => 100,
                ],
            ],
            'product_id',
            'language_id',
            'key_words',
            [
                'label' => '产品简介',
                'value' => function($model){
                    return strip_tags(htmlspecialchars_decode($model->short_info));
                }
            ],
            [
                'label' => '产品介绍',
                'value' => function($model){
                    return strip_tags($model->content);
                }
            ],
        ],
    ]) ?>

</div>
