<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '产品图');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '上传产品图'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'label' => '产品图',
             'format' => ['image',['width'=>'80','height'=>'80']],
             'value' => function($model)
             {
                return $model->image_url;
             }
            ],
            'product_id',
            'name',
            'image_url:url',
            'image_width',
            'image_height',
            'image_mime',

            ['class' => 'yii\grid\ActionColumn','header'=> '操作'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
