<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Nav;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\NavShowname */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-showname-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nav_id')->label('导航名')->dropDownList(Nav::getNavMap()) ?>

    <?= $form->field($model, 'language_id')->label('语言')->dropDownList(Language::getLanguageMap()) ?>

    <?= $form->field($model, 'nav_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '增加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
