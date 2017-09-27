<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Language;
use common\models\mysql\Nav;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Nav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'pid')->dropDownList() ?>    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'sort')->input('number') ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=Html::a(Yii::t('app','返回'),Url::to(['index']),['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
