<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\ProductQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品');
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
            [
                'label' => '产品主图',
                'format' => [
                    'image', 
                    ['width'=>'80','height'=>'80']
                ],
                'value' => function($model)
                {
                    return Yii::$app->params['domain'].$model->image_url;
                },
            ],
            'price',
            'freight',
            'create_at',
            'update_at',
            'size',
            'admin_name',
/*            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create}',
                'buttons' => [
                    'create' => function ($url, $model, $key) {
                        return Html::a('添加详情', ['/product-description/create', 'id' => $key], ['class'=>'btn btn-sm btn-primary']);
                    }
                ],
                'options' => [
                    'width' => 5
                ]
            ],*/

            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template' => '{view} {update} {delete}   {product-description}',
                'buttons' => [
                    'product-description' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => Yii::t('app','添加详情'),
                            'aria-label' => Yii::t('app','添加详情'),
                        ];
                        return Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',Url::to(['/product-description/create','id'=>$model->id]),$options);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    <p>
        <?= Html::a(Yii::t('app', '新增产品'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>