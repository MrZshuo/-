<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品详情');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-description-index">


    <p>
        <!-- <?= Html::a(Yii::t('app', 'Create Product Description'), ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            [
             'attribute' => 'product_id',
             'label' => '产品名',
             'value' => function($model){
                return $model->productName->name;
             },
             'filter' => common\models\mysql\Product::find()->select(['name','id'])->indexBy('id')->column(),
            ],
            [
             'attribute' => 'language_id',
             'label' => '语言',
             'value' => function($model){
                return $model->languageName->name;
             },
             'filter' => common\models\mysql\Language::find()->select(['name','id'])->indexBy('id')->column(),
            ],
            [
             'label' => '产品简介',
             'value' => function($model){
                $str = strip_tags($model->short_info);
                return mb_strlen($str)>20 ? mb_substr($str, 0,20).'...' : $str;
             }
            ],
            [
             'label' => '产品介绍',
             'value' => function($model){
                $str = strip_tags($model->content);
                return mb_strlen($str)>20 ? mb_substr($str, 0,20).'...' : $str;
             }
            ],
            // 'short_info',
            // 'key_words',

            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template' => '{view}{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
