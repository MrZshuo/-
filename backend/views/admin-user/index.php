<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminUserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '管理员');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '添加管理员'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'序号'],

            'username',
            'email:email',
            'created_at',
            'updated_at',
            [
                'label' => '角色',
                'value' => function($model)
                {
                    $res = \backend\models\Assignment::getUserRole($model->id);
                    return $res['item_name'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>'操作','template'=>'{update} {delete}  {reset-password}',
                'buttons' =>[
                    'reset-password' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => Yii::t('app','密码重置'),
                            'aria-label' => Yii::t('app','密码重置'),
                        ];
                        return Html::a('<i class="fa fa-key" aria-hidden="true"></i>',$url,$options);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
