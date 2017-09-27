<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = Yii::t('app', '添加内容详情');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-description-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
