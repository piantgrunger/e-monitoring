<?php

use app\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

$user = ArrayHelper::map(User::find()
->select(['id', 'username' => "COALESCE(nama_guru, nama_murid)"])
->leftJoin('murid', "murid.id_murid = user.auth_key and jenis_user ='murid'")
->leftJoin('guru', "guru.id_guru = user.auth_key and jenis_user = 'guru'")
->where("jenis_user = 'guru' or jenis_user = 'murid'")
->asArray()

->all(), 'id', 'username');


/* @var $this yii\web\View */
/* @var $model app\models\Pesan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_penerima')->widget(Select2::className(), [
        'data' => $user,
        'options' => ['placeholder' => 'Pilih Penerima'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'pesan')->textarea(['rows' => 6, 'style'  =>"height:150px"         ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
