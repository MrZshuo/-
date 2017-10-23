<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Category;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model,'category_id')->label('产品类别')->dropDownList(
    	Category::getCategoryMap(),['prompt'=>'请选择产品类别']
    )?>

    <?=$form->field($model, 'image_url')->label('产品图片（可以一次选择多张图片）')->widget('manks\FileInput', [
        'clientOptions' => [
            'pick' => [
                'multiple' => true,
            ],
        ],
    ]); ?>

    <?=$form->field($model, 'color')->label('产品颜色（可以一次选择多张图片）')->widget('manks\FileInput', [
        'clientOptions' => [
            'pick' => [
                'multiple' => true,
            ],
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
