<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', '新增');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    	foreach ($model as $key => $value) {
    		echo $form->field($model->)
 
    	}
    ?>
    <div class="form-group">
        <?=Html::a(Yii::t('app','返回'),Url::to(['index']),['class'=>'btn btn-primary'])?>
    </div> 

    <?php ActiveForm::end();?>

</div>


