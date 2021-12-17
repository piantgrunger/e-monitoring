<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKelas */

$this->title = 'Update Jenis Kelas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Jenis Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-kelas-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
