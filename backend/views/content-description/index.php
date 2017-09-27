<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\mysql\Content;
use common\models\mysql\Language;

/* @var $this yii\web\View */
/* @var $searchModel common\models\mysql\ContentDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '内容详情');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-description-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '添加详情'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            [
                'attribute' => 'content_id',
                'label' => '内容标题',
                'value' => function($model)
                {
                    return $model->contentName->content_title;
                },
            ],
            [
                'attribute' => 'language_id',
                'label' => '语言名',
                'value' => function($model)
                {
                    return $model->languageName->name;
                },
                'filter' => Language::getLanguageMap(),
            ],
            'content_title',
            'content_info',
            'content:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
