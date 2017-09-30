<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\mysql\Category;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\CategoryDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '分类别名');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-description-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '增加别名'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            [
                'attribute' => 'category_id',
                'label' => '产品类别',
                'value' => function($model)
                {
                    return $model->categoryName->name;
                },
                'filter' => Category::getCategoryMap(),
            ],
            [
                'attribute' => 'language_id',
                'label' => '语言',
                'value' => function($model)
                {
                    return $model->languageName->name;
                },
                'filter' => Language::getLanguageMap(),
            ],
            'show_name',

            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template'=>'{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
