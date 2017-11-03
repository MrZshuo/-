<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = '询盘详情';
?>

<div class="customer-view">
	
	<?=DetailView::widget([
		'model' => $model,
		'attributes' => [
			'firstname',
			'lastname',
			'email',
			'city',
			'province',
			'country',
			'postcode',
			'address',
			'telephone',
			'fax',
			'theme',
			'content',

		],

	])?>

    <div>
        <?=Html::a(Yii::t('app','返回'),Url::to('index'),['class'=>'btn primary'])?>
    </div>

</div>