<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\NavShowname */

$this->title = $model->nav_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航别名'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-showname-view">


    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->nav_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->nav_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nav_id',
            'language_id',
            'nav_name',
        ],
    ]) ?>

</div>
