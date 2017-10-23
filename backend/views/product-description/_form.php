<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput(['readonly'=>'true']) ?>

    <?= $form->field($model, 'language_id')->dropDownList(
            Language::getLanguageMap(),['prompt' => '--请选择语言--']
    ) ?>

    <?= $form->field($model, 'display_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_words')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_info')->label('产品的属性介绍（**每种属性以#结束**）')->textarea(['rows' => 8])?>

    <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
         // 'lang' =>'zh-cn', //英文为 en
    ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
