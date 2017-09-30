<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\CategoryDescription */

$this->title = Yii::t('app', '分类别名');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '分类别名'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-description-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
