<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = Yii::t('app', 'Create language');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Language'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">

<?=$this->render('_form',['model'=>$model]);?>


</div>