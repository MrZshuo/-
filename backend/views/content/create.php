<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\Content */

$this->title = Yii::t('app', '创建内容');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
