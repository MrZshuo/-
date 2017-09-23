<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = Yii::t('app', '添加详情').':'.$model->productName->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '添加详情');
?>
<div class="product-description-create">


    <?= $this->render('_form', [
        'model' => $model,
        'langlist' => $langlist,
    ]) ?>

</div>
