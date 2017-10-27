<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\mysql\Product */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => 'Product',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '产品'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="product-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <div>
<?php $form = ActiveForm::begin([
    'action'=>['upload'],
    'method'=>'post',
    'options' => ['enctype' => 'multipart/form-data'],
])?>


<?php ActiveForm::end(); ?>
</div>
</div>
