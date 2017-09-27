<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = $model->content_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-description-view">

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->content_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->content_id], [
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
            'content_id',
            'language_id',
            'content_title',
            'content_info',
            'content:ntext',
            'status',
        ],
    ]) ?>

</div>
