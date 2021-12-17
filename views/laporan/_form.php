<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'laporan')->textarea(['rows' => 6 ,'style' => 'height:120px' ]) ?>

    <?= $form->field($model, 'file_laporan')->fileInput() ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
