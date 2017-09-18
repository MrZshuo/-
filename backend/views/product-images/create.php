<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductImages */

$this->title = Yii::t('app', 'Create Product Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
