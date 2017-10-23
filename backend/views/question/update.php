<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/10/17
 * Time: 9:25
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Question */

$this->title = Yii::t('app', '修改FAQ: ', [
        'modelClass' => 'Nav',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'FAQ'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="nav-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>