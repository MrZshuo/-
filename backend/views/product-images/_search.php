<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductImagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-images-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image_url') ?>

    <?= $form->field($model, 'image_width') ?>

    <?php // echo $form->field($model, 'image_height') ?>

    <?php // echo $form->field($model, 'image_mime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
