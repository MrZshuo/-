<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Product;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductProperty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput(['readonly'=>true]
    )?>

    <?= $form->field($model, 'language_id')->dropDownList(
    	Language::getLanguageMap()
    ) ?>

    <?= $form->field($model, 'property_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
