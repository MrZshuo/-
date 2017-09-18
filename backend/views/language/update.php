<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminUser */

$this->title = Yii::t('app', '修改');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '语言'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">

<?=$this->render('_form',['model'=>$model]);?>


</div>