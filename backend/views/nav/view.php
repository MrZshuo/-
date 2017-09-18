<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Nav */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', '更新'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '确定删除此导航吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'language_id',
            'name',
            'sort',
        ],
    ]) ?>

</div>
