<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\Category */

$this->title = Yii::t('app', '新建产品分类');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品类别'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
