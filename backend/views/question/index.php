<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\mysql\Question;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '问答');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => '序号'],
            'question',
           [
                'attribute' => 'language_id',
                'label' => '语言',
                'value' => function($model)
                {
                    return $model->languageName->language_name;
                },
                'filter' => common\models\mysql\Language::getLanguageMap(),
            ],
            [
                'attribute' =>'answer',
                'value' => function($model)
                {
                    $d = strip_tags($model->answer);
                    return mb_strlen($d,'utf-8') > 100 ? mb_substr($d,0,100,'utf-8').'...' : $d;
                }
            ],
            'sort',
            ['class' => 'yii\grid\ActionColumn','header' => '操作'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
