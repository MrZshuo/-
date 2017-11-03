<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\CategoryDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '新盘信息');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="config-index">
    <?php Pjax::begin()?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        ['class' => 'yii\grid\SerialColumn', 'header' => '序号'],
        'name',
        [
            'attribute' => 'status',
            'label' => '状态',
            'value' => function($model)
            {
                if($model->status == 0)
                    return '不启用';
                else if($model->status == 1)
                    return '启用';
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{update}'
        ]
    ])?>
    <?php Pjax::end()?>
</div>
