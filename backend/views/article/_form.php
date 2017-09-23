<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\mysql\Language;
use common\models\mysql\Nav;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->dropDownList(Language::getLanguageMap(),[
            'prompt' => '--请选择语言--',
        ]) ?>

    <?= $form->field($model, 'nav_id')->dropDownList(Nav::getNavMap($model->language_id),[
            'prompt' => '--请选择分类--',
        ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'image_url')->textInput(['maxlength' => true]) ?> -->
<!--     <?=$form->field($model,'image_url')->widget('manks\FileInput',[
        'clientOptions' => [

            'server' => Url::to('article/upload'),
        ],
    ])?> -->

    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->input('number') ?>

    <?= $form->field($model, 'status')->input('number') ?>

    <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
         // 'lang' =>'zh-cn', //英文为 en
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创 建') : Yii::t('app', '修 改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<EOF
    $("#article-language_id").change(function(){
        var language_id = $(this).val();
        if(language_id>0){
            var href = "http://backend.yii.com/article/nav";
            $.ajax({
                "type" : "GET",
                "url" : "http://backend.yii.com/article/nav",
                "data" : {language_id : language_id},
                success:function(d){

                    $("#article-nav_id").html(d);
                },
            });
        }
    });
EOF;
$this->registerJs($js);
?>
