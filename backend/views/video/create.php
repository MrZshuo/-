<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\Content */

$this->title = Yii::t('app', '上传视频');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '视频'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
