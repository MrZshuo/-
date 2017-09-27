<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\NavShowname */

$this->title = Yii::t('app', '添加别名');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航别名'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-showname-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
