<?php
use yii\helpers\Html;
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

</div>