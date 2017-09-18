<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = Yii::t('app', '广告图', [
    'modelClass' => 'Banner',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '广告图'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => $model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="banner-update">


    <?php $form = ActiveForm::begin();?>
    	<?=$form->field($model,'info')->textarea(['row'=>10])?>
    	<?=$form->field($model,'sort')->textInput()?>
    	
    	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '上传') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	</div>
    <?php ActiveForm::end();?>

</div>
