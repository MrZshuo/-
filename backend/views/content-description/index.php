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
                    $data = $model->contentName->content_title;
                    return mb_strlen($data) > 15 ? mb_substr($data, 0,15,'utf-8').'...' : $data;
                },
            ],
            [
                'attribute' => 'language_id',
                'label' => '语言名',
                'value' => function($model)
                {
                    return $model->languageName->language_name;
                },
                'filter' => Language::getLanguageMap(),
            ],
            [
                'attribute' => 'show_title',
                'value' => function($model)
                {
                    $data = $model->show_title;
                    return mb_strlen($data) > 20 ? mb_substr($data, 0,20,'utf-8').'...' : $data;
                }
            ],
            [
                'attribute' => 'content_info',
                'value' => function($model)
                {
                    $data = $model->content_info;
                    return mb_strlen($data) > 20 ? mb_substr($data, 0,20,'utf-8').'...' : $model->content_info;
                }
            ],

            // 'content:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
