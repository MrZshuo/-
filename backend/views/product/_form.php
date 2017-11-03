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
            'compress' => [
                // 压缩后的尺寸
                'width' => 500,
                'height' => 500,
                // 图片质量，只有type为image/jpeg的时候才有效。
                'quality' => 90,
                // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false
                'allowMagnify' => false,
                // 是否允许裁剪
                'crop' => true,
                // 是否保留头部meta信息
                'preserveHeaders' => true,
                // 如果发现压缩后文件大小比原来还大，则使用原来图片，此属性可能会影响图片自动纠正功能
                'noCompressIfLarger' => false,
                // 单位字节，如果图片大小小于此值，不会采用压缩
                'compressSize' => 0
            ]
        ],
    ]); ?>

    <?=$form->field($model, 'color')->label('产品颜色（可以一次选择多张图片）')->widget('manks\FileInput', [
        'clientOptions' => [
            'pick' => [
                'multiple' => true,
            ],
            'compress' => [
                // 压缩后的尺寸
                'width' => 500,
                'height' => 500,
                // 图片质量，只有type为image/jpeg的时候才有效。
                'quality' => 90,
                // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false
                'allowMagnify' => false,
                // 是否允许裁剪
                'crop' => true,
                // 是否保留头部meta信息
                'preserveHeaders' => true,
                // 如果发现压缩后文件大小比原来还大，则使用原来图片，此属性可能会影响图片自动纠正功能
                'noCompressIfLarger' => false,
                // 单位字节，如果图片大小小于此值，不会采用压缩
                'compressSize' => 0
            ]
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
