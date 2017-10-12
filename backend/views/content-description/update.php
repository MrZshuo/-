<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = Yii::t('app', '修改详情: ', [
    'modelClass' => 'Content Description',
]) . $model->contentName->content_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="content-description-update">


    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'language_id')->label('语言')->dropDownList(Language::getLanguageMap()) ?>

    <?= $form->field($model, 'show_title')->label('显示名称')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_info')->textInput(['maxlength' => true,'row' => 6]) ?>

    <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
         // 'lang' =>'zh-cn', //英文为 en
        'clientOptions' => [
            'imageCompressBorder' => 700,
            // 'initialFrameWidth' => 800,

        ],
    ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加详情') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
