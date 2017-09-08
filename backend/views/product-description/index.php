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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a(Yii::t('app', 'Create Product Description'), ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            [
             'label' => '产品名',
             'value' => function($model){
                return $model->productName->name;
             }
            ],
            [
             'label' => '语言',
             'value' => function($model){
                return $model->languageName->name;
             }
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

            ['class' => 'yii\grid\ActionColumn','template' => '{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
