<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

use common\models\mysql\Language;
/* @var $this yii\web\View */
/* @var $model common\models\mysql\ContentDescription */

$this->title = Yii::t('app', '修改详情: ', [
    'modelClass' => 'Content Description',
]) . $model->contentName->content_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '内容详情'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="content-description-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
