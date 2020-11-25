<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("
$(document).on('click','.check_email_js',function(){
let data_id = $(this).attr('data-id');
$.get('/email/check?id='+data_id, function(){
   $('.check_email_js[data-id=\"'+data_id+'\"]').removeClass( \"pointer check_email_js glyphicon-minus\" ).addClass( \"glyphicon-ok\" );
});
})
");
?>
<div class="email-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'email:email',
            'phone',
            'fio:ntext',
            'text:ntext',
            'hospital.hospital',
            [
                'label' => 'Статус перевірки',
                'format' => 'raw',
                'value' => function($data){
                    return $data->checked?
                        '<span class="glyphicon check_email glyphicon-ok text-center" data-id="'.$data->id.'"></span>':
                        '<span class="glyphicon pointer check_email check_email_js glyphicon-minus text-center" data-id="'.$data->id.'"></span>';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
