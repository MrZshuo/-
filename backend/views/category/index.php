<?php


use common\models\mysql\Language;
use common\models\mysql\Category;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品分类');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '创建分类'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            // 'id',
            [
                'attribute' => 'name',
                // 'filter' => Category::getCategoryMap(),
            ],
            [
                'attribute' => 'pid',
                'value' => function($model)
                {
                    if($model->pid == 0)
                        return '一级分类';
                    else
                    {
                        $res = Category::findOne($model->pid);
                        return $res->name;
                    }
                },
                'filter' => Category::getParentCategoryMap(),
            ],
            'sort',

            ['class' => 'yii\grid\ActionColumn','header'=>'操作',
                'template' => '{update} {delete}',
                'buttons' => [
                    'showname' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => Yii::t('app','添加其它语言'),
                            'aria-label' => Yii::t('app','添加其它语言'),
                        ];
                        return Html::a('<i class="fa fa-language" aria-hidden="true"></i>',$url,$options);
                    }
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
