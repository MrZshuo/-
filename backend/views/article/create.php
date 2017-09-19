<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\Article */

$this->title = Yii::t('app', '新增');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
