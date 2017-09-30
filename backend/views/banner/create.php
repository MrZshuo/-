<?php
// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\mysql\Banner */

$this->title = Yii::t('app', '新增');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '广告图'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([ 
	// 'action'=>[''],
	'method'=>'post',
	'options' => ['enctype' => 'multipart/form-data'],
])?>
<?=$form->field($model,'info')->label('标题')->textInput()?>

<?=$form->field($model,'file')->label('首页Banner')->widget('manks\FileInput',[])?>

<?=$form->field($model,'sort')->label('排序')->input('number')?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '创 建'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>