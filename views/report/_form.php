<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_murid')->widget(Select2::className(), [
        'data' => (ArrayHelper::map(app\models\Murid::find()->all(), 'id_murid', 'nama_murid')),
        'options' => ['placeholder' => 'Pilih Murid'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    

    <?= $form->field($model, 'tgl_report')->widget(DateControl::className(), [
        'type'=>DateControl::FORMAT_DATE,
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    
    ]) ?>

    <?= $form->field($model, 'hasil_report')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'id',
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic subscript superscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
