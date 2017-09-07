<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\ProductQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            // 'id',
            'name',
            'price',
            'cost_price',
            'create_at',
            'update_at',
            'size',
            'admin_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create}',
                'buttons' => [
                    'create' => function ($url, $model, $key) {
                        return Html::a('添加描述', ['/product-description/create', 'id' => $key], ['class'=>'btn btn-sm btn-primary']);
                    }
                ],
                'options' => [
                    'width' => 5
                ]
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>'操作'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>