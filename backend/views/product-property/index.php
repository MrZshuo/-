<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\mysql\Category;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductPropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品属性');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-property-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '添加属性'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => '序号'],

            [
                'attribute' => 'category_name',
                'filter' => Category::getCategoryMap(),
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
