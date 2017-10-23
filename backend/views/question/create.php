<?php
/**
 * Created by PhpStorm.
 * User: zhoushuo
 * Date: 2017/10/17
 * Time: 9:24
 */
use yii\helpers\Html;

$this->title = Yii::t('app', '新增');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '导航'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
