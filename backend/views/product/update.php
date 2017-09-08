<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Product */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => 'Product',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="product-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <div>
<?php $form = ActiveForm::begin([
    'action'=>['upload'],
    'method'=>'post',
    'options' => ['enctype' => 'multipart/form-data'],
])?>
<!-- <?=$form->field($file,'name')->label('图片名')->textInput()?> -->
<?=$form->field($file, 'file')->label('上传产品图')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ],
        'server' => Url::to(['upload','id'=>$model->id]),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]); ?>

<?php ActiveForm::end(); ?>
</div>
</div>
