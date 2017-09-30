<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductPropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品属性');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-property-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => '序号'],

            [
                'attribute' => 'product_id',
                'label' => '产品名',
                'value' => function($model)
                {
                    return $model->productName->name;
                },
                // 'filter' => 
            ],
            [
                'attribute' =>'language_id',
                'value' => function($model)
                {
                    return $model->languageName->name;
                },
                'filter' => Language::getLanguageMap(),
            ],
            'property_name',
            'property_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
