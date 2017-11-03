<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use common\models\mysql\Nav;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_title')->label('视频名')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'content_url')->label('视频上传')->widget('manks\FileInput',[])?>

    <?= $form->field($model,'video_show')->label('视频封面(图片)')->widget('manks\FileInput',[])?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->input('number')?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
