<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductImages */

$this->title = Yii::t('app', '上传产品图');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品细节图'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
