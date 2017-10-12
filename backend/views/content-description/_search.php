<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-description-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'content_id') ?>

    <?= $form->field($model, 'language_id') ?>

    <?= $form->field($model, 'show_title') ?>

    <?= $form->field($model, 'content_info') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
