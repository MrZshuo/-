<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Language */

$this->title = Yii::t('app', '语言');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'status',
                'label' => '状态',
                'value' => function($dataProvider){
                    if($dataProvider->status)
                        return '支持';
                    else
                        return '不支持';
                }
            ],
            ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<?=Html::a(Yii::t('app','新增'),['create'],['class'=>'btn btn-success'])?>

</div>
