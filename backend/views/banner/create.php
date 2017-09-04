<?php
// use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin([
	'action'=>['upload'],
	'method'=>'post',
	'options' => ['enctype' => 'multipart/form-data'],
])?>
<!-- <?=$form->field($model,'file')->widget('manks\FileInput',[])?> -->
<?php 
echo $form->field($model, 'files')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ],
        // 'server' => Url::to('upload/u2'),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]); ?>
<!-- <?=$form->field($model,'file')->fileInput()?>
<?=Html::submitButton(Yii::t('app','图片上传'))?> -->
<?php ActiveForm::end(); ?>