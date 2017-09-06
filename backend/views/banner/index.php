<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminUserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Banner');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?php $form = ActiveForm::begin([
    'action'=>['upload'],
    'method'=>'post',
    'options' => ['enctype' => 'multipart/form-data'],
    ])?>
<?php 
echo $form->field($model, 'files')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ],
        // 'server' => Url::to('upload/u2'),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]); ?>

<?php ActiveForm::end(); ?>
<?php Pjax::begin(); ?>    
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // 数据提供者中所含数据所定义的简单的列
        // 使用的是模型的列的数据
        [
        'label' => 'banner',
        'format' => [
            'image', 
            [
            'width'=>'80',
            'height'=>'80'
            ]
        ],
        'value' => function ($model) { 
            return $model->url; 
            }
        ],
        'url',
        'width',
        'height',
        'sort',
        // 更复杂的列数据
        ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete}',],
    ],
]);?>
<?php Pjax::end(); ?>
</div>
