<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'],
            'nisn',
            'nama_murid',
            'nama_walimurid',
            'alamat:ntext',
            'no_hp',
            // 'jenis_kelamin',
            // 'tanggal_lahir',
            // 'tempat_lahir',
            // 'username',
            // 'password',

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'], $this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\MuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Murid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-index">

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
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.'Murid'. '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a('Murid Baru', ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>
