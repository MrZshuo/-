<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use common\models\mysql\Category;
use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\CategoryDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getCategoryMap(),['prompt'=>'--请选择分类--']) ?>

    <?= $form->field($model, 'language_id')->dropDownList(Language::getLanguageMap(),['prompt'=>'--请选择语言--']) ?>

    <?= $form->field($model, 'show_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
