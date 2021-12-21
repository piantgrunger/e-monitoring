<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datecontrol\DateControl;


use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Absensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'tgl_report')->widget(DateControl::className(), [
        'type'=>DateControl::FORMAT_DATE,
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]

    ]) ?>

    
<div class="card-body">

<table id="table-shift" class="table table-bordered table-hover kv-grid-table kv-table-wrap">
    <thead>
        <tr>

         <th>NISN</th>
            <th width='40%'>Nama</th>
            <th>Laporan</th>
         
          
        </tr>
    </thead>

    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $absensiDetails,
        'model' => \app\models\ReportDetail::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]);
    ?>

    <tfoot>

    </tfoot>

</table>
</div>
</div>

</div>


    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
