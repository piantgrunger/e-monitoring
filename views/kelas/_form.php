<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */
/* @var $form yii\widgets\ActiveForm */;

?>

<div class="kelas-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_murid')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Murid::find()->all(), 'id_murid', 'nama_murid'),
        'options' => [
            'placeholder' => 'Pilih Murid',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>


    <?= $form->field($model, 'id_guru')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Guru::find()->all(), 'id_guru', 'nama_guru'),
        'options' => [
            'placeholder' => 'Pilih Guru',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>




<?= $form->field($model, 'id_jenis_kelas')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\JenisKelas::find()->all(), 'id', 'nama_kelas'),
        'options' => [
            'placeholder' => 'Pilih Jenis Kelas',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
