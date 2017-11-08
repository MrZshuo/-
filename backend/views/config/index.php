<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\CategoryDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '询盘信息配置');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="config-index">
    <?php Pjax::begin();?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => '序号'],
            'name',
            [
                'attribute' => 'status',
                'label' => '状态',
                'value' => function($model)
                {
                    $str = '';
                    if($model->status == 0)
                        $str = '必填';
                    if($model->status == 1)
                        $str = '可选';
                    return $str;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update}'
            ]
        ]
    ]);?>
    <?php Pjax::end();?>
</div>
