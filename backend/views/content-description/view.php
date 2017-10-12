<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-description-view" style="width: 750px">

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->content_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->content_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

        
        <h2 style="text-align: center;line-height: 2em;"><?=$model->show_title;?></h2>
        <div style="text-align: right;">Time: <?=$model->contentName->update_at?></div>
        <div><span style="font-size: 1.2em;line-height: 2em;">文章简介：</span><?=$model->content_info?>
        </div>
        <div><?=$model->content?></div>


</div>
