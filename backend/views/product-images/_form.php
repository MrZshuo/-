<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Product;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->label('产品名')->dropDownList(
    	Product::getProductNameMap()
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?=$form->field($model,'image_url')->widget('manks\FileInput',[])?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '确定') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
