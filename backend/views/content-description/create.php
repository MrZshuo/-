<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = Yii::t('app', '内容名称').':'.$model->contentName->content_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '添加详情');
?>
<div class="content-description-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
