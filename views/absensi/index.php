<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'],
            'tgl_absensi',
            'murid.nisn',
            'murid.nama_murid',
            'status_kehadiran',

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'], $this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

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
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.'Absensi'. '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a('Absensi Baru', ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>
