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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            // 'id',
            [
                'attribute' => 'name',
                'value' => function($model)
                {
                    return mb_strlen($model->name) > 20 ? mb_substr($model->name, 0,20,'utf-8').'...' : $model->name;
                }
            ],
            [
                'label' => '产品主图',
                'format' => [
                    'image', 
                    ['width'=>'80','height'=>'80']
                ],
                'value' => function($model)
                {
                    $url = explode(',', $model->image_url);
                    return Yii::$app->params['domain'].$url[0];
                },
            ],
            [
                'attribute' => 'category_id',
                'label' => '产品类别',
                'value' => function($model)
                {
                   return $model->categoryName->name;
                },
            ],
            'create_at',
            'update_at',
            'admin_name',
            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template' => '{update} {delete}   {product-description} ',
                'buttons' => [
                    'product-description' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => Yii::t('app','添加详情'),
                            'aria-label' => Yii::t('app','添加详情'),
                        ];
                        return Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',Url::to(['/product-description/create','id'=>$model->id]),$options);
                    },
/*                    'product-property' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => Yii::t('app','添加属性'),
                            'aria-label' => Yii::t('app','添加属性'),
                        ];
                        return Html::a('<i class="fa fa-cubes" aria-hidden="true"></i>',Url::to(['/product-property/create','id'=>$model->id]),$options);
                    }*/
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    <p>
        <?= Html::a(Yii::t('app', '新增产品'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>