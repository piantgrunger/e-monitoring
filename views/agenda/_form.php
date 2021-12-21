<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datecontrol\DateControl;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
/* @var $form yii\widgets\ActiveForm */;

?>

<div class="agenda-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'tanggal')->widget(DateControl::className(), [
        'type'=>DateControl::FORMAT_DATE,
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]) ?>
    

    <?= $form->field($model, 'agenda')->widget(TinyMce::className(), [
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


    <?= $form->field($model, 'file')->fileInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
