<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'],
            'murid.nama_murid',
            'hasil_raport:raw',
            [
                'label' => 'File Raport',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('<i class="fa fa-download"></i>', ['/uploads/' . $model->file_raport], ['class' => 'btn btn-primary btn-sm' , 'target' => '_blank' , 'data-pjax' => '0']);
                }
            ],

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'], $this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\RaportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Raport';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raport-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,

        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,

        'panel' => [
            'type' => GridView::TYPE_INFO,
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.'Raport'. '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a('Raport Baru', ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>
