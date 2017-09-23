<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\mysql\Nav;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '导航');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
/*            [
                'attribute' => 'language_id',
                'label' => '语言',
                'value' => function($model)
                {
                    return $model->languageName->name;
                },
                'filter' => common\models\mysql\Language::getLanguageMap(),
            ],*/
            [
                'attribute' => 'pid',
                'value' => function($model)
                {
                    if($model->pid == 0)
                        return '一级导航';
                    else
                    {
                        $data = Nav::findOne($model->pid);
                        return $data->name;
                    }
                },
            ],
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
