<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\mysql\Nav;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavShownameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '导航别名');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-showname-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '增加别名'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'nav_id',
                'label' => '导航名',
                'value' => function($model)
                {
                    return $model->navName->name;
                },
                'filter'=> Nav::getNavMap(),
            ],
            [
                'attribute' => 'language_id',
                'label' => '语言',
                'value' => function($model)
                {
                    return $model->languageName->language_name;
                },
                'filter' => Language::getLanguageMap(),
            ],
            'show_name',

            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template' => '{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
