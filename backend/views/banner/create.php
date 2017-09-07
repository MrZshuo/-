<?php
// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
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
        'server' => Url::to('banner/upload'),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]); ?>

<?php ActiveForm::end(); ?>