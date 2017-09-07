<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\ProductDescription */

$this->title = Yii::t('app', 'Create Product Description');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Descriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-description-create">


    <?= $this->render('_form', [
        'model' => $model,
        'langlist' => $langlist,
    ]) ?>

</div>
