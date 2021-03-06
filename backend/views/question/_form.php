<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Language;
use common\models\mysql\Question;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Nav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->dropDownList(
        Language::getLanguageMap()
    ) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'answer')->widget('kucha\ueditor\UEditor',[
        // 'lang' =>'zh-cn', //英文为 en
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=Html::a(Yii::t('app','返回'),Url::to(['index']),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
