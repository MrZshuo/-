<?php
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '流量统计';
?>
<div class="site-index">

    <div class="row">
        <div class="col-xs-3">
            <div class="info-box bg-green ">
                <div class="">今日访问量</div>
                <div class="text-center" style="font-size: 30px;"><?php echo $count->day?></div>
            </div>
        </div>     
        <div class="col-xs-3">
            <div class="info-box bg-yellow ">
                <div class="">本周访问量</div>
                <div class="text-center" style="font-size: 30px;"><?php echo $count->week?></div>
            </div>
        </div>     
        <div class="col-xs-3">
            <div class="info-box bg-purple ">
                <div class="">本月访问量</div>
                <div class="text-center" style="font-size: 30px;"><?php echo $count->month?></div>
            </div>
        </div>     
        <div class="col-xs-3">
            <div class="info-box bg-blue ">
                <div class="">总问量</div>
                <div class="text-center" style="font-size: 30px;"><?php echo $count->total?></div>
            </div>
        </div>    
    </div>
    <div class="body-content">
        <div><h3>最新询盘</h3></div>
<?php Pjax::begin(); ?><?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn','header'=>'序号'],
                'email',
                [
                    'label' => '姓名',
                    'value' => function($model)
                    {
                        return $model->firstname.' '.$model->lastname;
                    }
                ],
                [
                    'attribute' => 'content',
                    'label' => '标题',
                    'value' => function($model)
                    {
                        return mb_strlen($model->content,'utf-8') > 30 ? mb_substr($model->content, 0, 30,'utf-8').'...' : $model->content;
                    }
                ],
                'telephone',
                'create_at',
                [
                    'attribute' => 'status',
                    'label' => '状态',
                    'value' => function($model)
                    {
                        if($model->status == 0) return '未查看';
                        else if($model->status == 1) return '已查看';
                    },
                    // 'filter' => ''
                    // 'options'=>[
                    //     'class' => ['bg-green'],
                    // ],
                ],
                ['class' => 'yii\grid\ActionColumn','header'=> '操作','template'=>'{view}{delete}'],
            ],
        ])?>
<?php Pjax::end(); ?>
    </div>
</div>
