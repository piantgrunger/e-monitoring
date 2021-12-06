<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use  kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Murid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="murid-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'nama_murid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_walimurid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6 ,'style' => 'height:120px' ]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true])  ?>

<?= $form->field($model, 'jenis_kelamin')->dropdownList([
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
], ['prompt' => 'Pilih Jenis Kelamin']) ?>


    <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::className(), [
        'type'=>DateControl::FORMAT_DATE,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    
    ]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
