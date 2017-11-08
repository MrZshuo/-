<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/11/3
 * Time: 14:43
 */

use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', '产品属性');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-rss">
    <?php Pjax::begin()?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => '序号'],
            'email',
            ['class' => 'yii\grid\ActionColumn','header' => '操作','template' => '{delete}']
        ]
    ])?>
    <?php Pjax::end()?>
</div>
