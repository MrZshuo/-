<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\models\mysql\Language;
use common\models\mysql\Content;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label>选择类别</label>
    <?= Html::dropDownList('list',1,Content::getContentNavMap(),['prompt'=>'--请选择类别--','class' => 'form-control','id'=>'list-id']) ?>
    </div>

    <?= $form->field($model, 'content_id')->label('内容名')->dropDownList(Content::getContentMap(0),[
        'prompt'=>'--请选择内容--'
    ]) ?>

    <?= $form->field($model, 'language_id')->label('语言')->dropDownList(Language::getLanguageMap()) ?>

    <?= $form->field($model, 'content_title')->label('显示名称')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
         // 'lang' =>'zh-cn', //英文为 en
    ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加详情') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<EOF
    $("#list-id").change(function(){
        var nav_id = $(this).val();
        if(nav_id>0){
            var href = "http://backend.yii.com/content-description/content";
            $.ajax({
                "type" : "GET",
                "url" : "http://backend.yii.com/content-description/content",
                "data" : {nav_id : nav_id},
                success:function(d){
                    $("#contentdescription-content_id").html(d);
                },
            });
        }
    });
EOF;
$this->registerJs($js);
?>
