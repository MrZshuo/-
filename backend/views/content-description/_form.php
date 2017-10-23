<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use common\models\mysql\Language;
use common\models\mysql\Content;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_id')->textInput(['readonly'=>'true'])?>

    <?= $form->field($model, 'language_id')->label('语言')->dropDownList(Language::getLanguageMap()) ?>

    <?= $form->field($model, 'show_title')->label('显示名称')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_info')->label('简介（**每一行以#结束**）')->textarea(['rows' => 8])?>

    <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
         // 'lang' =>'zh-cn', //英文为 en
        'clientOptions' => [
            'imageCompressBorder' => 700,

        ],
    ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加详情') : Yii::t('app', '修改'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','返回'),Url::to('index'),['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<EOF
    var nav_id = $("#list-id")
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
