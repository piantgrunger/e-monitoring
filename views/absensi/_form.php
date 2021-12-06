<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;

use yii\helpers\ArrayHelper;

$dataMurid=ArrayHelper::map(\app\models\Murid::find()->all(), 'id_murid', 'nama_murid');

/* @var $this yii\web\View */
/* @var $model app\models\Absensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'tgl_absensi')->widget(DateControl::className(), [
        'type'=>DateControl::FORMAT_DATE,
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]) ?>

    

    <?= $form->field($model, 'id_murid')->widget(Select2::className(), [
        'data' => $dataMurid,
        'options' => [
            'placeholder' => 'Pilih Murid'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    

    <?= $form->field($model, 'status_kehadiran')->dropdownList([
        'Hadir' => 'Hadir',
        'Sakit' => 'Sakit',
        'Izin' => 'Izin',
        'Alpa' => 'Alpa',
    ], ['prompt' => 'Pilih Status Kehadiran']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
